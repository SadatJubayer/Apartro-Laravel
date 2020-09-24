<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class employeeController extends Controller
{
    public function index(Request $request)
    {      
        return view('employee.index');
    }
}
