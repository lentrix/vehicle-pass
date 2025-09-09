<?php

use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [APIController::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [APIController::class, 'logout']);

    Route::get('/vehicle-scan/{code}',[APIController::class, 'vehicleScan']);
});

