@extends('layout')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
    <form method="POST" action="{{ url('/login') }}" class="p-4 border rounded shadow" style="min-width: 300px; background: #fff;">
        @csrf
        <h2 class="mb-4 text-center">Login</h2>
        <div class="mb-3">
            <label for="name" class="form-label">User Name</label>
            <input type="name" name="name" id="name" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>

@endsection
