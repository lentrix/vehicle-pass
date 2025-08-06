@extends('layout')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>Vehicle Records</h1>
        <a href="{{url('/vehicles/create')}}" class="btn btn-primary">
            <i class="fa-solid fa-square-plus"></i>
            Create Vehicle
        </a>
    </div>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th class="d-none d-md-table-cell">ID</th>
                <th>Vehicle</th>
                <th>Plate No</th>
                <th class="d-none d-md-table-cell">Registered</th>
                <th class="d-none d-md-table-cell">Owner</th>
                <th>
                    <i class="fa-solid fa-gear"></i>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
                <tr>
                    <td class="d-none d-md-table-cell">{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->vehicle_make }} {{ $vehicle->vehicle_model }}</td>
                    <td>{{ $vehicle->plate_no }}</td>
                    <td class="d-none d-md-table-cell">{{ $vehicle->registration_date->format('F d, Y') }}</td>
                    <td class="d-none d-md-table-cell">{{ $vehicle->owner->full_name }}</td>
                    <td>
                        <a href="{{url('/vehicles/' . $vehicle->id)}}" class="btn btn-sm btn-info">
                            <i class="fa-solid fa-up-right-from-square"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
