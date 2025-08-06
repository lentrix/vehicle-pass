<?php

use App\Http\Controllers\OwnerController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehiclePassController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('login');

Route::post('/login', [SiteController::class, 'login']);

Route::middleware('auth')->group(function() {
    Route::resource('vehicles', VehicleController::class);
    Route::resource('owners', OwnerController::class);
    Route::resource('vehicle-passes', VehiclePassController::class);

    Route::get('/logout', [SiteController::class, 'logout']);
});

