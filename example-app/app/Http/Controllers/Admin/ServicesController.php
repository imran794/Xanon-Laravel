<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use carbon\carbon;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.service.index',[
            'servicess' => Services::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'services_icon'  => 'required',
            'services_title'  => 'required',
            'services_description'  => 'required',
        ]);

        Services::insert([
            'services_icon'       => $request->services_icon,
            'services_title'   => $request->services_title,
            'services_description' => $request->services_description,
            'created_at'        => carbon::now()
        ]);

          $notification=array(
            'message'=>'Services Add successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
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
         return view('admin.service.edit',[
            'servicess' => Services::findOrFail($id)
        ]);
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
         $request->validate([
            'services_icon'  => 'required',
            'services_title'  => 'required',
            'services_description'  => 'required',
        ]);

        Services::findOrFail($id)->update([
            'services_icon'       => $request->services_icon,
            'services_title'   => $request->services_title,
            'services_description' => $request->services_description,
            'updated_at'        => carbon::now()
        ]);

          $notification=array(
            'message'=>'Services Add successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('services.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Services::findOrFail($id)->delete();
         $notification=array(
            'message'=>'Services Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        Services::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'Services Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function active($id)
    {
        Services::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'Services Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
