<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Unit;
use App\Tanent;
use Brian2694\Toastr\Facades\Toastr;

class TanentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        
       $ownerUnits= Tanent::where('ownerId',$request->session()->get('id'))->get();
        
       return view('Backend.pages.tanents.manage',compact('ownerUnits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $units=Unit::where('ownerId', $request->session()->get('id'))->get();
        return view('Backend.pages.tanents.create',compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $tanent = new Tanent();
       $tanent->userId=$request->userId;
       $tanent->rantedUnit=$request->rantedUnit;
       $tanent->rent=$request->rent;
       $tanent->nid=$request->nid;
       $tanent->phone=$request->phone;
       $tanent->address=$request->address;
       $tanent->ownerId='2';
       $tanent->save();
       Toastr::success('Tanent Information Created');
       return redirect()->route('manageTanent');

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
    public function edit(Tanent $tanent,Request $request)
    {
        $units=Unit::where('ownerId', $request->session()->get('id'))->get();
        return view('Backend.pages.tanents.edit',compact('tanent','units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Tanent $tanent,Request $request)
    {
        $tanent->userId=$request->userId;
       $tanent->rantedUnit=$request->rantedUnit;
       $tanent->rent=$request->rent;
       $tanent->nid=$request->nid;
       $tanent->phone=$request->phone;
       $tanent->address=$request->address;
       $tanent->save();
        Toastr::success('Protfolio Updated');
        return redirect()->route('manageTanent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanent $tanent)
    {
        
        $tanent->delete();
        Toastr::error(' Deleted Successfully');
        return redirect()->route('manageTanent');
    }
}
