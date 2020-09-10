<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\User;
use App\Apartment;
use App\Floor;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $apartment = Apartment::where('adminId', $request->session()->get('id'))->first();

        $allCounts = DB::select('SELECT COUNT(*) AS count FROM users UNION ALL SELECT COUNT(*) AS floors FROM floors UNION ALL SELECT COUNT(*) AS units FROM units UNION ALL SELECT SUM(cost) FROM expenses UNION ALL SELECT COUNT(*) AS complains FROM complains UNION ALL SELECT COUNT(*) AS visitor FROM visitor');

        $data = [
            'apartment' => $apartment,
            'allCounts' => $allCounts
        ];



        return view('admin.index')->with('data', $data);
    }

    public function usersIndex()
    {
        $users = User::all();
        return view('admin.users')->with('users', $users);
    }
    public function addUser()
    {
        return view('admin.addUser');
    }
    public function createUser(AuthRequest $request)
    {
        if (User::where('username', $request->username)->first()) {
            return view('admin.addUser')->withErrors('Username already taken!');
        } else {
            $user = new User();
            $user->username = $request->username;
            $user->password = $request->password;
            $user->role = $request->role;
            $user->isActive = $request->isActive == 'on' ? true : false;

            $user->save();
            return view('admin.addUser')->with('success', true);
        }
    }
    public function activeUser(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        $user->isActive = true;
        $user->save();

        return redirect('admin/users');
    }

    public function deActiveUser(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        $user->isActive = false;
        $user->save();

        return redirect('admin/users');
    }
    public function updateUser(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        $user->username = $request->username;
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->gender = $request->gender;
        $user->save();

        return redirect('admin/users');
    }

    public function destroyUser(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        try {
            $user->delete();
        } catch (\Throwable $th) {
            return redirect('admin/users');
        }

        return redirect('admin/users');
    }


    public function createApartment(Request $request)
    {
        $apartment = new Apartment();
        $apartment->name = $request->name;
        $apartment->description = $request->description;
        $apartment->notice = $request->notice;
        $apartment->adminId = $request->session()->get('id');
        $apartment->save();
        return redirect('admin');
    }


    public function editApartment(Request $request)
    {
        $apartment = Apartment::where('adminId', $request->session()->get('id'))->first();
        return view('admin.editApartment')->with('apartment', $apartment);
    }
    public function updateApartment(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $apartment = Apartment::where('adminId', $request->session()->get('id'))->first();

        $apartment->name = $request->name;
        $apartment->description = $request->description;
        $apartment->notice = $request->notice;
        $apartment->save();

        return redirect('admin');
    }
    public function floorIndex()
    {
        $floors = Floor::all();
        return view('admin.floors')->with('floors', $floors);
    }
}