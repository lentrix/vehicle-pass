@extends('layout')

@section('content')

    <h2>Dashboard</h2>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa-solid fa-people-group" style="font-size: 100pt"></i>
                    <div style="font-size: 72pt;">{{$owners}}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa-solid fa-car" style="font-size: 100pt"></i>
                    <div style="font-size: 72pt;">{{$vehicles}}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa-solid fa-passport" style="font-size: 100pt"></i>
                    <div style="font-size: 72pt;">{{$passes}}</div>
                </div>
            </div>
        </div>


    </div>

@endsection
