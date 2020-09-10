<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\User;
use App\Apartment;
use App\Floor;
use App\Unit;
use App\Complain;
use App\Visitor;

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


    public function profile(Request $request)
    {
        $user = User::where('id', $request->session()->get('id'))->first();

        return view('admin.profile')->with('user', $user);
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
    public function createFloor(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $floor = new Floor();
        $floor->name = $request->name;
        $floor->save();

        return redirect('admin/floors');
    }

    public function updateFloor(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
        ]);

        $floor = Floor::find($request->id);
        $floor->name = $request->name;
        $floor->save();
        return redirect('admin/floors');
    }
    public function destroyFloor(Request $request)
    {
        $floor = Floor::find($request->id);

        try {
            $floor->delete();
        } catch (\Throwable $th) {
            return redirect('admin/floors');
        }

        return redirect('admin/floors');
    }

    public function unitIndex()
    {

        $units = DB::table('units')
            ->join('users', 'users.id', '=', 'units.ownerId')
            ->join('floors', 'floors.id', '=', 'units.floorId')
            ->select('units.id', 'units.name as unitName', 'users.username as ownerName', 'users.id as userId', 'floors.id as floorId,', 'floors.name as floorName')
            ->get();

        $owners = User::where('role', 'owner')->get();
        $floors = Floor::get();

        $data = [
            'units' => $units,
            'owners' => $owners,
            'floors' => $floors,
        ];

        error_log($data['owners']);

        return view('admin.units')->with('data', $data);
    }
    public function createUnit(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
        ]);

        $unit = new Unit();
        $unit->name = $request->name;
        $unit->ownerId = $request->ownerId;
        $unit->floorId = $request->floorId;
        $unit->save();

        return redirect('admin/units');
    }
    public function updateUnit(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
        ]);

        $unit = Unit::find($request->id);
        $unit->name = $request->name;
        $unit->save();

        return redirect('admin/units');
    }

    public function destroyUnit(Request $request)
    {
        $Unit = Unit::find($request->id);
        try {
            $Unit->delete();
        } catch (\Throwable $th) {
            return redirect('admin/units');
        }
        return redirect('admin/units');
    }

    public function expenses()
    {

        $expenses = DB::table('expenses')
            ->join('users', 'users.id', '=', 'expenses.userId')
            ->select('expenses.*', 'users.username AS expenseBy')
            ->get();

        return view('admin.expenses')->with('expenses', $expenses);
    }

    public function complainsIndex()
    {

        $complains = DB::table('complains')
            ->join('users', 'users.id', '=', 'complains.userId')
            ->join('units', 'units.id', '=', 'complains.unitId')
            ->select('complains.*', 'users.username AS complainBy', 'units.name AS unitName')
            ->get();

        return view('admin.complains')->with('complains', $complains);
    }

    public function resolveComplain(Request $request)
    {
        $complain = Complain::find($request->id);
        $complain->isResolved = 1;
        $complain->save();

        return redirect('admin/complains');
    }

    public function visitors()
    {

        // $visitor = Visitor::get();

        $visitors = DB::table('visitors')
            ->join('users', 'users.id', '=', 'visitors.userId')
            ->join('units', 'units.id', '=', 'visitors.unitId')
            ->select('visitors.*', 'users.username AS toWhom', 'units.name AS unitName')
            ->get();

        return view('admin.visitors')->with('visitors', $visitors);
    }
}