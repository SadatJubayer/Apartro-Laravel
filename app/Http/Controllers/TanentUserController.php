<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Visitor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Brian2694\Toastr\Facades\Toastr;

class TanentUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $visitors=Visitor::where('userId', $request->session()->get('id'))->get();
        return view('Backend.pages.visitor.manage',compact('visitors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.pages.tanentUser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanent = new user();
       $tanent->username=$request->username;
       $tanent->password=Hash::make($request->username);
       $tanent->role = 'tenant';
       $tanent->isActive= '1';
       $tanent->email= $request ->email;
       $tanent->gender= $request->gender; 
       
       if ( $request->image ) 
       {
           $image = $request->file('image');
           $img = time() .Str::random(12). '.' . $image->getClientOriginalExtension();
           $location = public_path('images/' . $img);
           Image::make($image)->save($location);
           $tanent->image = $img;
       }
       $tanent->save();
       Toastr::success('Tanent Created');
       return redirect()->route('ownerDashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
