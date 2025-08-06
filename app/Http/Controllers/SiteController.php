<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Vehicle;
use App\Models\VehiclePass;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function index() {
        if(auth()->guest()) {
            return view('login');
        }else {
            $owners = Owner::count();
            $vehicles = Vehicle::count();
            $passes = VehiclePass::count();

            return view('dashboard',compact('vehicles','owners','passes'));
        }
    }

    public function loginForm() {
        if(!auth()->guest()) return redirect('/');
        return view('login');
    }

    public function login(Request $request) {
        $creds = $request->validate([
            'name' => 'string|required',
            'password' => 'string|required'
        ]);

        $login = auth()->attempt($creds);

        if($login) {
            $owners = Owner::count();
            $vehicles = Vehicle::count();
            $passes = VehiclePass::count();

            return view('dashboard',compact('vehicles','owners','passes'));
        }else {
            return redirect()->back()->withErrors([
                'login' => 'Invalid credentials provided.'
            ]);
        }
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
