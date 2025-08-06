@extends('layout')

@section('content')

<h2>Create Vehicle Record</h2>
<hr>

<div class="row">

    <div class="col-md-6">
        <form action="{{ url('/vehicles') }}" method="POST">
            @csrf
            <h3>Select Owner</h3>
            <select name="owner_id" id="owner_id" class="form-select">
                <option value="">Select Owner</option>
                @foreach ($owners as $owner)
                    <option value="{{ $owner->id }}">{{ $owner->full_name }}</option>
                @endforeach
            </select>

            <hr>
            <h3>Vehicle Information</h3>

            <div class="mb-3">
                <label for="vehicle_make" class="form-label">Vehicle Make</label>
                <input type="text" name="vehicle_make" id="vehicle_make" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="vehicle_model" class="form-label">Vehicle Model</label>
                <input type="text" name="vehicle_model" id="vehicle_model" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="plate_no" class="form-label">Plate Number</label>
                <input type="text" name="plate_no" id="plate_no" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="registration_date" class="form-label">Registration Date</label>
                <input type="date" name="registration_date" id="registration_date" class="form-control" required>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary">Create Vehicle</button>

        </form>
    </div>

    <div class="col-md-6">
        <div class="alert alert-info">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="fw-bold">Cannot find the owner?</div>
                    Create a new owner here.
                </div>
                <div>
                    @include('vehicles._create-owner-modal')
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
