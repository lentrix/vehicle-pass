<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehiclePass;
use Illuminate\Http\Request;

class VehiclePassController extends Controller
{
    public function index()
    {
        // List all vehicle passes
        $vehiclePasses = VehiclePass::all();
        return view('vehicle_pass.index', compact('vehiclePasses'));
    }

    public function create()
    {
        $vehicleId = request('vehicle_id');

        $vehicles = Vehicle::orderBy('vehicle_make')->orderBy('vehicle_model')->orderBy('plate_no')->get();

        return view('vehicle_pass.create', compact('vehicles','vehicleId'));
    }

    public function store(Request $request)
    {
        // Save a new vehicle pass
        $fields = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'control_no' => 'required|string|max:255',
            'school_year' => 'nullable|string|max:255',
            'expiry_date' => 'nullable|date',
        ]);

        if($this->controlNumberExists($fields['control_no'])) {
            return redirect()->back()->withErrors(['control_no' => 'Control number already used.']);
        }

        $pass = VehiclePass::create($fields);

        return redirect('/vehicle-passes/' . $pass->id)->with('success', 'Vehicle pass created successfully.');
    }

    public function show(VehiclePass $vehiclePass)
    {
        return view('vehicle_pass.show', compact('vehiclePass'));
    }

    public function edit(VehiclePass $vehiclePass)
    {
        $vehicles = Vehicle::orderBy('vehicle_make')->orderBy('vehicle_model')->orderBy('plate_no')->get();
        return view('vehicle_pass.edit', compact('vehiclePass','vehicles'));
    }

    public function update(Request $request, VehiclePass $vehiclePass)
    {
        // Update a specific vehicle pass
        $fields = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'control_no' => 'required|string|max:255',
            'school_year' => 'nullable|string|max:255',
            'expiry_date' => 'nullable|date',
        ]);

        $vehiclePass->update($fields);

        return redirect('/vehicle-passes/' . $vehiclePass->id)->with('success', 'Vehicle pass updated successfully.');
    }

    public function destroy(VehiclePass $vehiclePass)
    {
        $vehiclePass->delete();
        return redirect()->route('vehicle-passes.index')->with('success', 'Vehicle pass deleted successfully.');
    }

    private function controlNumberExists($controlNo)
    {
        // Check if the control number already exists
        return (VehiclePass::where('control_no', $controlNo)->exists());
    }
}
