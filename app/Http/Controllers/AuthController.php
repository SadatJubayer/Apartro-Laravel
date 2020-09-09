<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AuthRequest;

use App\User;

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


        $data = User::where('username', $request->username)
            ->where('password', $request->password)
            ->get();

        if (count($data) > 0) {
            $request->session()->put('username', $request->username);

            if ($data[0]->role == "admin") {
                $request->session()->put('role', "admin");
                return redirect('admin');
            } else if ($data[0]->role == "owner") {
                $request->session()->put('role', "owner");
                return redirect('owner');
            } else if ($data[0]->role == "tenant") {
                $request->session()->put('role', "tenant");
                return redirect('tenant');
            } else if ($data[0]->role == "employee") {
                $request->session()->put('role', "employee");
                return redirect('employee');
            }
        } else {
            return view('auth.login')->withErrors('Invalid Credentials');
        }
    }

    public function register(AuthRequest $request)
    {
        return view('auth.register');
    }
}