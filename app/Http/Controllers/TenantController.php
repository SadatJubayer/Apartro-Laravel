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
use App\Bills;

class TenantController extends Controller
{
    //
    public function index(Request $request)
    {
        

        return view('tenant.index');
    }

    public function usersIndex()
    {
        $users = User::all();
        return view('tenant.users')->with('users', $users);
    }

    public function bills(Request $request)
    {


            $Bills = bills::all();
            return view('tenant.bills', compact('Bills'));
        
            
    }
  
    public function notice(Request $request)
    {


           // $Apartment = apartment::all();
           $Apartment = apartment::where('adminId', '1') ->get();
            return view('tenant.notices', compact('Apartment'));
        
            
    }



    public function visitors()
    {

        // $visitor = Visitor::get();

        $visitors = DB::table('visitors')
            ->join('users', 'users.id', '=', 'visitors.userId')
            ->join('units', 'units.id', '=', 'visitors.unitId')
            ->select('visitors.*', 'users.username AS toWhom', 'units.name AS unitName')
            ->get();

        return view('tenant.visitors')->with('visitors', $visitors);
    }
    

    public function expenses()
    {

        $expenses = DB::table('expenses')
            ->join('users', 'users.id', '=', 'expenses.userId')
            ->select('expenses.*', 'users.username AS expenseBy')
            ->get();

        return view('tenant.expenses')->with('expenses', $expenses);
    }



    public function complainsIndex()
    {

        $complains = DB::table('complains')

            ->join('users', 'users.id', '=', 'complains.userId')
            ->join('units', 'units.id', '=', 'complains.unitId')
            ->select('complains.*', 'users.username AS complainBy', 'units.name AS unitName')
            ->get();



           return view('tenant.complains')->with('complains', $complains);



        //$complains = complains::where('userId', '3') ->get();
        //return view('tenant.complains', compact('complains'));
    }

}
