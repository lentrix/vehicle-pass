@extends('layout')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>Edit Vehicle Pass</h1>
        <a href="{{ url('/vehicle-passes') }}" class="btn btn-primary">
            <i class="fa-solid fa-left-long"></i>
            Back
        </a>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ url('/vehicle-passes/' . $vehiclePass->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="vehicle_id" class="form-label">Select Vehicle</label>
                    <select name="vehicle_id" id="vehicle_id" class="form-select" required>
                        <option value="">Select Vehicle</option>
                        @foreach ($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}" {{ $vehiclePass->vehicle_id == $vehicle->id ? 'selected' : '' }}>
                                {{ $vehicle->vehicle_make }}, {{ $vehicle->vehicle_model }} ({{ $vehicle->plate_no }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="control_no" class="form-label">Control Number</label>
                    <input type="text" name="control_no" id="control_no" value="{{ old('control_no', $vehiclePass->control_no) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="school_year" class="form-label">School Year</label>
                    <input type="text" name="school_year" id="school_year" value="{{ old('school_year', $vehiclePass->school_year) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="expiry_date" class="form-label">Expiry Date</label>
                    <input type="date" name="expiry_date" id="expiry_date" value="{{ old('expiry_date', $vehiclePass->expiry_date?->format('Y-m-d')) }}" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update Vehicle Pass</button>
            </form>
        </div>
    </div>

@endsection
