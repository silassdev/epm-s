<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        return match ($user->role) {
            'superadmin' => view('dashboard.superadmin'),
            'manager' => view('dashboard.manager'),
            'accountant' => view('dashboard.accountant'),
            'landlord' => view('dashboard.landlord'),
            'school_admin' => view('dashboard.school_admin'),
            'hostel_warden' => view('dashboard.hostel_warden'),
            'tenant' => view('dashboard.tenant'),
            default => view('dashboard.tenant'), // Fallback to tenant
        };
    }

    /**
     * Show settings form.
     */
    public function settings(Request $request)
    {
        $user = Auth::user();
        $company = $user->company;

        return view('settings.edit', compact('user', 'company'));
    }

    /**
     * Update settings.
     */
    public function settingsUpdate(Request $request)
    {
        $user = Auth::user();
        $company = $user->company;

        $request->validate([
            'business_name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string'],
            'bank_name' => ['nullable', 'string', 'max:100'],
            'account_number' => ['nullable', 'string', 'max:20'],
            'account_name' => ['nullable', 'string', 'max:255'],
        ]);

        if ($company) {
            $company->update([
                'name' => $request->business_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
        }

        // Store bank details in session or user meta for simulation
        session([
            'bank_details' => [
                'bank_name' => $request->bank_name,
                'account_number' => $request->account_number,
                'account_name' => $request->account_name,
            ]
        ]);

        return back()->with('status', 'settings-updated');
    }
}
