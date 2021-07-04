<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timeline;
use Carbon\carbon;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.timeline.index',[
            'timelines'     => Timeline::latest()->get()
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
            'time_date'           => 'required|numeric',
            'time_title'          => 'required',
            'time_description'      => 'required',
        ]);

        Timeline::insert([
            'time_date'           => $request->time_date,
            'time_title'          => $request->time_title,
            'time_description'    => $request->time_description,
            'created_at'          => carbon::now()
        ]);

          $notification=array(
            'message'=>'Timeline Add successfully',
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
        return view('admin.timeline.edit',[
            'timelines'     => Timeline::findOrFail($id)
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
            'time_date'           => 'required|numeric',
            'time_title'          => 'required',
            'time_description'      => 'required',
        ]);

        Timeline::findOrFail($id)->update([
            'time_date'           => $request->time_date,
            'time_title'          => $request->time_title,
            'time_description'    => $request->time_description,
            'updated_at'          => carbon::now()
        ]);

          $notification=array(
            'message'=>'Timeline Update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('timeline.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Timeline::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Timeline Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        Timeline::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'Timeline Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function active($id)
    {
        Timeline::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'Timeline Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
