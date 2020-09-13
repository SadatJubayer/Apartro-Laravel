<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AuthRequest;

use App\User;
use Symfony\Component\VarDumper\Caster\RedisCaster;

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
            $request->session()->put('id', $data[0]->id);

            if ($data[0]->role == "admin") {
                $request->session()->put('role', "admin");
                return redirect('admin');
            } else if ($data[0]->role == "owner") {
                $request->session()->put('role', "owner");
                return redirect()->route('ownerDashboard');
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

        if (User::where('username', $request->username)->first()) {
            return view('auth.register')->withErrors('Username already taken!');
        } else {

            $user = new User();
            $user->username = $request->username;
            $user->password = $request->password;
            $user->role = $request->role;
            $user->isActive = false;
            $user->save();

            return view('auth.register')->with('success', true);
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login')->withErrors('You have logged out');
    }
}