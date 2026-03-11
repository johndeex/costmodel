<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function show_login(){
        return view('auth.login');
    }

    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required| email',
            'password' => 'string|required'
        ]);

        //checking users aunthentication


        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect()->route('home.show');
        }

        throw ValidationException::withMessages([
            'credentials' => 'incorrect email or password!'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}
