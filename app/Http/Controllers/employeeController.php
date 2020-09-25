<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\User;
use App\Complain;
use App\Visitor;
use App\Expense;
// use DB;

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

    public function updateProfile(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user = User::where('id', $request->session()->get('id'))->first();

        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->gender = $request->gender;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'user-' . $request->session()->get('username') . '.' .  $file->getClientOriginalExtension();
            if ($file->move('uploads', $fileName)) {
                $user->image = $fileName;
                $user->save();
            } else {
                return redirect('employee/profile');
            }
        }
        $user->save();

        return redirect('employee/profile');
    }
    // public function visitors()
    // {

    //     $visitor = Visitor::get();

    //     $visitors = DB::table('visitors')
    //         ->join('users', 'users.id', '=', 'visitors.userId')
    //         ->join('units', 'units.id', '=', 'visitors.unitId')
    //         ->select('visitors.*', 'users.username AS toWhom', 'units.name AS unitName')
            
    //         ->get();

    //     return view('employee.visitors')->with('visitors', $visitors);
    // }
    public function visitors()
    {
        $visitors = Visitor::all();
        return view('employee.visitors')->with('visitors', $visitors);
    }
    public function addVisitors(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $visitor = new Visitor();
        $visitor->name = $request->name;
        $visitor->phone= $request->phone;
        $visitor->address= $request->address;
        $visitor->save();

        return redirect('employee/visitors');
    }
    // public function expenses()
    // {

    //     $expenses = DB::table('expenses')
    //         ->join('users', 'users.id', '=', 'expenses.userId')
    //         ->select('expenses.*', 'users.username AS expenseBy')
    //         ->get();

    //     return view('employee.expenses')->with('expenses', $expenses);
    // }
    public function expenses()
    {
        $expenses = Expense::all();
        return view('employee.expenses')->with('expenses', $expenses);
    }
    public function addExpenses(Request $request)
    {
        $request->validate([
            'cost' => 'required',
        ]);

        $expense = new Expense();
        $expense->description = $request->description;
        $expense->cost = $request->cost;
        $expense->save();

        return redirect('employee/expenses');
    }
    public function complainsIndex()
    {

        $complains = DB::table('complains')
            ->join('users', 'users.id', '=', 'complains.userId')
            ->join('units', 'units.id', '=', 'complains.unitId')
            ->select('complains.*', 'users.username AS complainBy', 'units.name AS unitName')
            ->get();

        return view('employee.complains')->with('complains', $complains);
    }
    public function resolveComplain(Request $request)
    {
        $complain = Complain::find($request->id);
        $complain->isResolved = 1;
        $complain->save();

        return redirect('employee/complains');
    }
    public function users()
    {
        $users = User::where('role','owner')->orwhere('role','tenant') ->get();
       
        return view('employee.users')->with('users', $users);
    }
    
}
