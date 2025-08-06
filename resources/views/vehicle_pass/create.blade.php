@extends('layout')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>Create Vehicle Pass</h1>
        <a href="{{ url('/vehicle-passes') }}" class="btn btn-primary">
            <i class="fa-solid fa-left-long"></i>
            Back
        </a>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ url('/vehicle-passes') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="vehicle_id" class="form-label">Select Vehicle</label>
                    <select name="vehicle_id" id="vehicle_id" class="form-select" required>
                        <option value="">Select Vehicle</option>
                        @foreach ($vehicles as $vehicle)
                            <option {{ $vehicle->id == $vehicleId ? 'selected' : '' }} value="{{ $vehicle->id }}">{{ $vehicle->vehicle_make }}, {{ $vehicle->vehicle_model }} ({{ $vehicle->plate_no }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="control_no" class="form-label">Control Number</label>
                    <input type="text" name="control_no" id="control_no" required class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="school_year" class="form-label">School Year</label>
                    <input type="text" name="school_year" id="school_year" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="expiry_date" class="form-label">Expiry Date</label>
                    <input type="date" name="expiry_date" id="expiry_date" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Create Vehicle Pass</button>
            </form>
        </div>
    </div>

@endsection
