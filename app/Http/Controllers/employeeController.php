<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Complain;
use App\Visitor;
use DB;

class employeeController extends Controller
{
    public function index()
    {      
        return view('employee.index');
    }
    public function profile(Request $request)
    {
        $user = User::where('id', $request->session()->get('id'))->first();

        return view('employee.profile')->with('user', $user);
    }

    // public function updateProfile(Request $request)
    // {
    //     $request->validate([
    //         'firstName' => 'required',
    //         'lastName' => 'required',
    //         'email' => 'required',
    //         'gender' => 'required',
    //         'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    //     ]);

    //     $user = User::where('id', $request->session()->get('id'))->first();

    //     $user->firstName = $request->firstName;
    //     $user->lastName = $request->lastName;
    //     $user->email = $request->email;
    //     $user->gender = $request->gender;

    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');
    //         $fileName = 'user-' . $request->session()->get('username') . '.' .  $file->getClientOriginalExtension();
    //         if ($file->move('uploads', $fileName)) {
    //             $user->image = $fileName;
    //             $user->save();
    //         } else {
    //             return redirect('employee/profile');
    //         }
    //     }
    //     $user->save();

    //     return redirect('employee/profile');
    // }
    public function visitors()
    {

        // $visitor = Visitor::get();

        $visitors = DB::table('visitors')
            ->join('users', 'users.id', '=', 'visitors.userId')
            ->join('units', 'units.id', '=', 'visitors.unitId')
            ->select('visitors.*', 'users.username AS toWhom', 'units.name AS unitName')
            ->get();

        return view('employee.visitors')->with('visitors', $visitors);
    }
    public function expenses()
    {

        $expenses = DB::table('expenses')
            ->join('users', 'users.id', '=', 'expenses.userId')
            ->select('expenses.*', 'users.username AS expenseBy')
            ->get();

        return view('employee.expenses')->with('expenses', $expenses);
    }
}
