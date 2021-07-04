<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Carbon\carbon;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.project.index',[
            'projects'      => Project::latest()->get()
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
            'project_icon'           => 'required',
            'project_title'          => 'required',
            'project_sub_title'      => 'required',
        ]);

        Project::insert([
            'project_image'          => 'imran.jpg',
            'project_gallery_image'  => 'imran.jpg',
            'project_icon'           => $request->project_icon,
            'project_title'          => $request->project_title,
            'project_sub_title'      => $request->project_sub_title,
            'created_at'             => carbon::now()
        ]);

          $notification=array(
            'message'=>'Project Add successfully',
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
          return view('admin.project.edit',[
            'projects'      => Project::findOrFail($id)
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
            'project_icon'           => 'required',
            'project_title'          => 'required',
            'project_sub_title'      => 'required',
        ]);

        Project::findOrFail($id)->update([
            'project_image'          => 'imran.jpg',
            'project_gallery_image'  => 'imran.jpg',
            'project_icon'           => $request->project_icon,
            'project_title'          => $request->project_title,
            'project_sub_title'      => $request->project_sub_title,
            'updated_at'             => carbon::now()
        ]);

          $notification=array(
            'message'=>'Project Update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('project.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::findOrFail($id)->delete();
         $notification=array(
            'message'=>'Project Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function inactive($id)
    {
        Project::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'Project Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function active($id)
    {
        Project::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'Project Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
