<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::orderBy('last_name')
            ->with('owner')
            ->get();
        return view('vehicles.index', ['vehicles'=>$vehicles]);
    }

    public function create()
    {
        $owners = Owner::orderBy('last_name')->orderBy('first_name')->get();

        return view('vehicles.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'owner_id' => 'numeric|required',
            'vehicle_make' => 'string|required',
            'vehicle_model' => 'string|required',
            'plate_no' => 'string|required',
            'registration_date' => 'date|required',
        ]);

        $vehicle = Vehicle::create($fields);

        return redirect('/vehicles/' . $vehicle->id)->with('success','A new vehicle has been created.');
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        $owners = Owner::orderBy('last_name')->orderBy('first_name')->get();
        return view('vehicles.edit', compact('vehicle','owners'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $fields = $request->validate([
            'owner_id' => 'numeric|required',
            'vehicle_make' => 'string|required',
            'vehicle_model' => 'string|required',
            'plate_no' => 'string|required',
            'registration_date' => 'date|required',
        ]);

        $vehicle->update($fields);

        return redirect('/vehicles/' . $vehicle->id)->with('success','The vehicle has been updated.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect('/vehicles')->with('success','The vehicle has been deleted.');
    }
}
