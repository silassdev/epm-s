<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnboardingController extends Controller
{
    /**
     * Show the onboarding screen.
     */
    public function show()
    {
        return view('auth.onboarding');
    }

    /**
     * Store onboarding details and activate user dashboard access.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => ['required', 'string', 'in:landlord,tenant,school_admin,hostel_warden'],
            'country' => ['required', 'string', 'max:100'],
            'state' => ['required', 'string', 'max:100'],
            'lga' => ['required', 'string', 'max:100'],
            'town' => ['required', 'string', 'max:100'],
            'street' => ['required', 'string', 'max:255'],
            'next_of_kin' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:M,F'],
            'dob' => ['required', 'date', 'before:today'],
        ]);

        $user = Auth::user();
        
        $user->update([
            'role' => $request->role,
            'country' => $request->country,
            'state' => $request->state,
            'lga' => $request->lga,
            'town' => $request->town,
            'street' => $request->street,
            'next_of_kin' => $request->next_of_kin,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'onboarded' => true,
        ]);

        return redirect()->route('dashboard');
    }
}
