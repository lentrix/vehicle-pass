@extends('layout')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>Vehicle Passes</h1>
        <a href="{{ url('/vehicle-passes/create') }}" class="btn btn-primary">
            <i class="fa-solid fa-square-plus"></i>
            Create Vehicle Pass
        </a>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Control No.</th>
                <th>Vehicle Name</th>
                <th>Plate No.</th>
                <th>Owner Name</th>
                <th>Expiry Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiclePasses as $vehiclePass)
                <tr>
                    <td>{{ $vehiclePass->control_no }}</td>
                    <td>{{ $vehiclePass->vehicle->vehicle_make }}, {{ $vehiclePass->vehicle->vehicle_model }}</td>
                    <td>{{ $vehiclePass->vehicle->plate_no }}</td>
                    <td>{{ $vehiclePass->vehicle->owner->full_name }}</td>
                    <td>{{ $vehiclePass->expiry_date ? $vehiclePass->expiry_date->format('F d, Y') : 'Perpetual' }}</td>
                    <td>
                        <a href="{{ url('/vehicle-passes/' . $vehiclePass->id) }}" class="btn btn-sm btn-info">
                            <i class="fa-solid fa-up-right-from-square"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
