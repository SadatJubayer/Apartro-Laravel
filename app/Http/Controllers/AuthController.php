<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }
    public function registerView()
    {
        return view('auth.register');
    }


    public function login(Request $request)
    {
        // Login form validation
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:5'
        ]);

        // Register here
        // return view('auth.register');
    }


    public function register(AuthRequest $request)
    {
        return view('auth.register');
    }
}