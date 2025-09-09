<?php

namespace App\Http\Controllers;

use App\Models\VehiclePass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);

    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout successful',
        ]);
    }

    public function vehicleScan($code) {
        $vehiclePass = VehiclePass::where('control_no', $code)->first();

        if(!$vehiclePass) {
            return response()->json([
                'message' => "not found"
            ]);
        }

        $vehiclePass->load('vehicle.owner');

        return response()->json([
            'message' => 'ok',
            'vehicle_pass' => $vehiclePass
        ]);
    }
}
