<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\ServiceProvider;
use PDF;

use Illuminate\Http\Request;
use App\User;
use App\Apartment;
use App\Floor;
use App\Unit;
use App\Complain;
use App\Visitor;
use App\Bills;
use App\Tanents;

class TenantController extends Controller
{
    //
    public function index(Request $request)
    {
        
        return view('tenant.index');
    }

    public function usersIndex()
    {
       // $users = User::all();
        //return view('tenant.users')->with('users', $users);

       
        $Tanents = tanents::all();
        return view('tenant.tenantusers')->with('tanents', $Tanents);
    }

    public function bills(Request $request)
    {


           
           $Bills = bills::where('userId', '3') ->get();
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

    public function addComplain(Request $request){
        $complain = new Complain();
        $complain->userId = $request->userId;
        $complain->unitId = $request->unitId;
        $complain->description = $request->description;
        $complain->isResolved = false;
        $complain->save();


        return redirect('/tenant/complains');
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



    public function profile(Request $request)
    {
        $user = User::where('id', $request->session()->get('id'))->first();

        return view('tenant.profile')->with('user', $user);
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
                return redirect('tenant/profile');
            }
        }
        $user->save();

        return redirect('tenant/profile');
    }



    // public function Complainpost(Request $request)
    // {
        
    //     return view('tenant.compalinsave');
    // }

    public function billReport(Request $request)

     {

         $bills = Bills::orderBy('id','desc')->get();

         $prds = compact('bills');

         return PDF::loadView('tenant.report', $prds)->stream();

     }



    

}
