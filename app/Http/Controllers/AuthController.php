<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class AuthController extends Controller
{

    public function loginForm()
    {
        return view('auth/login');
    }




    public function login(Request $request)
    {
        $credential = $request->validate([
            "email" => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();

            return redirect()->intended('master.blade.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records'
        ])->onlyInput('email');
    }
}
