<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Property;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::whereHas('property')
            ->with(['property', 'leases.tenant'])
            ->get();
        return view('units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $properties = Property::all();
        return view('units.create', compact('properties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'property_id' => ['required', 'exists:properties,id'],
            'unit_number' => ['required', 'string', 'max:50'],
            'floor' => ['nullable', 'string', 'max:50'],
            'bedrooms' => ['required', 'integer', 'min:0'],
            'bathrooms' => ['required', 'integer', 'min:0'],
            'rent_amount' => ['required', 'numeric', 'min:0'],
            'service_charge' => ['required', 'numeric', 'min:0'],
            'occupancy_status' => ['required', 'string', 'in:vacant,occupied,reserved'],
            // Bedspace support parameters
            'has_bedspaces' => ['nullable', 'boolean'],
            'total_bedspaces' => ['nullable', 'integer', 'min:1'],
            'shared_kitchen' => ['nullable', 'boolean'],
            'shared_bathroom' => ['nullable', 'boolean'],
        ]);

        // Simulating Bedspace Support inside the unit columns/data or store in session/details
        $unitData = $request->only([
            'property_id', 'unit_number', 'floor', 'bedrooms', 'bathrooms', 'rent_amount', 'service_charge', 'occupancy_status'
        ]);

        $unit = Unit::create($unitData);

        // Store bedspace support configurations in session/cache for display since they are mock configurations
        if ($request->has_bedspaces) {
            session([
                'unit_bedspaces_' . $unit->id => [
                    'total_bedspaces' => $request->total_bedspaces ?? 1,
                    'shared_kitchen' => (bool)$request->shared_kitchen,
                    'shared_bathroom' => (bool)$request->shared_bathroom,
                ]
            ]);
        }

        return redirect()->route('units.index')->with('success', 'Unit configured and deployed successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        $properties = Property::all();
        $bedspaceConfig = session('unit_bedspaces_' . $unit->id, null);
        return view('units.edit', compact('unit', 'properties', 'bedspaceConfig'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'property_id' => ['required', 'exists:properties,id'],
            'unit_number' => ['required', 'string', 'max:50'],
            'floor' => ['nullable', 'string', 'max:50'],
            'bedrooms' => ['required', 'integer', 'min:0'],
            'bathrooms' => ['required', 'integer', 'min:0'],
            'rent_amount' => ['required', 'numeric', 'min:0'],
            'service_charge' => ['required', 'numeric', 'min:0'],
            'occupancy_status' => ['required', 'string', 'in:vacant,occupied,reserved'],
            'has_bedspaces' => ['nullable', 'boolean'],
            'total_bedspaces' => ['nullable', 'integer', 'min:1'],
            'shared_kitchen' => ['nullable', 'boolean'],
            'shared_bathroom' => ['nullable', 'boolean'],
        ]);

        $unit->update($request->only([
            'property_id', 'unit_number', 'floor', 'bedrooms', 'bathrooms', 'rent_amount', 'service_charge', 'occupancy_status'
        ]));

        if ($request->has_bedspaces) {
            session([
                'unit_bedspaces_' . $unit->id => [
                    'total_bedspaces' => $request->total_bedspaces ?? 1,
                    'shared_kitchen' => (bool)$request->shared_kitchen,
                    'shared_bathroom' => (bool)$request->shared_bathroom,
                ]
            ]);
        } else {
            session()->forget('unit_bedspaces_' . $unit->id);
        }

        return redirect()->route('units.index')->with('success', 'Unit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        session()->forget('unit_bedspaces_' . $unit->id);
        return redirect()->route('units.index')->with('success', 'Unit removed successfully.');
    }
}
