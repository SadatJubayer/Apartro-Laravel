<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class TenantController extends Controller
{
    //
    public function index(Request $request)
    {
        

        return view('tenant.index');
    }
}
