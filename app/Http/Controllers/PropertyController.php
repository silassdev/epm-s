<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::withCount('units')->get();
        return view('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'property_type' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string', 'max:100'],
            'state' => ['required', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
        ]);

        $user = Auth::user();

        Property::create([
            'company_id' => $user->company_id,
            'name' => $request->name,
            'property_type' => $request->property_type,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'description' => $request->description,
            'status' => 'active',
        ]);

        return redirect()->route('properties.index')->with('success', 'Property deployed successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        // Load units with leases and tenants
        $property->load(['units.leases.tenant', 'maintenanceRequests.tenant']);
        
        $units = $property->units;
        $activeTenantsCount = 0;
        $revenueTotal = 0;

        foreach ($units as $unit) {
            $activeLease = $unit->leases->where('status', 'active')->first();
            if ($activeLease) {
                $activeTenantsCount++;
                $revenueTotal += $activeLease->rent_amount;
            }
        }

        return view('properties.show', compact('property', 'units', 'activeTenantsCount', 'revenueTotal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'property_type' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string', 'max:100'],
            'state' => ['required', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'string', 'in:active,inactive,archived'],
        ]);

        $property->update($request->all());

        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property removed successfully.');
    }
}
