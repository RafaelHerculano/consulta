<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $doctors=\App\Doctor::all();
        return view('doctor/index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('doctor/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctors = new \App\Doctor;
        $doctors->id = $request->get('id');  
        $doctors->name = $request->get('name');
        $doctors->email = $request->get('email');
        $doctors->save();

        return redirect('doctors')->with('success', 'Information has been added');
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
        $doctor = \App\Doctor::find($id);
        return view('doctor/edit',compact('doctor','id'));
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
        $doctor= \App\Doctor::find($id);
        $doctor->name=$request->get('name');
        $doctor->email=$request->get('email');
        $doctor->save();
        return redirect('doctors')->with('success', 'Information has been edited');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = \App\Doctor::find($id);
        $doctor->delete();
        return redirect('doctors')->with('success','Information has been  deleted');
    }
}
