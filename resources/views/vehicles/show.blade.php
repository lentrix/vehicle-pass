@extends('layout')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>Vehicle Info</h1>

        <div class="d-flex gap-2">
            <a href="{{ url('/vehicles') }}" class="btn btn-primary">
                <i class="fa-solid fa-left-long"></i>
                Back
            </a>
            <a href="{{ url('/vehicles/' . $vehicle->id . '/edit') }}" class="btn btn-info d-block">
                <i class="fa-solid fa-pencil"></i>
                Edit
            </a>

            @include('vehicles._delete-vehicle-modal',['vehicle'=>$vehicle])
        </div>

    </div>
    <hr>

    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $vehicle->vehicle_make }} {{ $vehicle->vehicle_model }}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ str_pad($vehicle->id, 8, '0', STR_PAD_LEFT) }}</td>
                            </tr>
                            <tr>
                                <th>Plate No.</th>
                                <td>{{ $vehicle->plate_no }}</td>
                            </tr>
                            <tr>
                                <th>Registered</th>
                                <td>{{ $vehicle->registration_date->format('F d, Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="card-title">Owner Info</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $vehicle->owner->full_name }}</td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td>{{ $vehicle->owner->address }}</td>
                            </tr>
                            <tr>
                                <th>Contact No.:</th>
                                <td>{{ $vehicle->owner->contact_no }}</td>
                            </tr>
                            <tr>
                                <th>License No.:</th>
                                <td>{{ $vehicle->owner->license_no }}</td>
                            </tr>
                            <tr>
                                <th>License Expiry</th>
                                <td>{{ $vehicle->owner->expiry_date->format('F d, Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-7 mt-4 mt-md-0">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Vehicle Passes</h3>
                <a href="{{ url('/vehicle-passes/create?vehicle_id=' . $vehicle->id) }}" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                    Add Vehicle Pass
                </a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="bg-primary text-white">Control No.</th>
                        <th class="bg-primary text-white d-none d-md-table-cell">School Year</th>
                        <th class="bg-primary text-white d-none d-md-table-cell">Expiry Date</th>
                        <th class="bg-primary text-white">Status</th>
                        <th class="bg-primary text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vehicle->passes as $pass)
                        <tr>
                            <td>{{ $pass->control_no }}</td>
                            <td class="d-none d-md-table-cell">{{ $pass->school_year }}</td>
                            <td class="d-none d-md-table-cell">{{ $pass->expiry_date?->format('F d, Y') }}</td>
                            <td>
                                @if($pass->expiry_date->isPast())
                                    <span class="badge bg-danger">Expired</span>
                                @else
                                    <span class="badge bg-success">Active</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('/vehicle-passes/' . $pass->id)}}" class="btn btn-sm btn-info">
                                    <i class="fa-solid fa-up-right-from-square"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No passes found for this vehicle.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


    </div>

@endsection
