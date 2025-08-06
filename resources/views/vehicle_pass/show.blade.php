@extends('layout')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>View Vehicle Pass</h1>
        <div class="d-flex gap-2">
            <a href="{{url('/vehicle-passes/' . $vehiclePass->id . '/edit')}}" class="btn btn-info">
                <i class="fa-solid fa-pencil"></i>
                Edit
            </a>
            <a href="{{ url('/vehicle-passes') }}" class="btn btn-primary">
                <i class="fa-solid fa-left-long"></i>
                Back
            </a>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="card-title">Gate Pass Info</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Control No.</th>
                            <td>{{ $vehiclePass->control_no }}</td>
                        </tr>
                        <tr>
                            <th>School Year</th>
                            <td>{{ $vehiclePass->school_year ? $vehiclePass->school_year : 'Perpetual' }}</td>
                        </tr>
                        <tr>
                            <th>Expiry Date</th>
                            <td>{{ $vehiclePass->expiry_date ? $vehiclePass->expiry_date->format('F d, Y') : 'Perpetual' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card shadow mt-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Vehicle Info</h3>
                        <a href="{{ url('/vehicles/' . $vehiclePass->vehicle->id) }}" class="btn btn-secondary">
                            <i class="fa-solid fa-up-right-from-square"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Make</th>
                            <td>{{ $vehiclePass->vehicle->vehicle_make }}</td>
                        </tr>
                        <tr>
                            <th>Model</th>
                            <td>{{ $vehiclePass->vehicle->vehicle_model }}</td>
                        </tr>
                        <tr>
                            <th>Plate No</th>
                            <td>{{ $vehiclePass->vehicle->plate_no }}</td>
                        </tr>
                        <tr>
                            <th>Registration Date</th>
                            <td>{{ $vehiclePass->vehicle->registration_date ? $vehiclePass->vehicle->registration_date->format('F d, Y') : 'N/A' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mt-4 mt-md-0" style="min-height: 100%">
                <div class="card-header">
                    <h3 class="card-title">Owner Info</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td>{{ $vehiclePass->vehicle->owner->full_name }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $vehiclePass->vehicle->owner->address }}</td>
                        </tr>
                        <tr>
                            <th>Contact No.</th>
                            <td>{{ $vehiclePass->vehicle->owner->contact_no }}</td>
                        </tr>
                        <tr>
                            <th>License No.</th>
                            <td>{{ $vehiclePass->vehicle->owner->license_no }}</td>
                        </tr>
                        <tr>
                            <th>Expiry Date</th>
                            <td>{{ $vehiclePass->vehicle->owner->expiry_date ? $vehiclePass->vehicle->owner->expiry_date->format('F d, Y') : 'N/A' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
