<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Carbon\carbon;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.about.index',[
            'abouts'   => About::latest()->get()
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
            'about_title'  => 'required',
            'about_sub_title'  => 'required',
            'about_description'  => 'required',
            'about_des_1'  => 'required',
            'about_des_2'  => 'required',
            'about_des_3'  => 'required',
            'about_des_4'  => 'required',
            'about_des_5'  => 'required',
            'about_des_6'  => 'required',
        ]);

        About::insert([
            'about_title'       => $request->about_title,
            'about_sub_title'   => $request->about_sub_title,
            'about_description' => $request->about_description,
            'about_des_1'       => $request->about_des_1,
            'about_des_2'       => $request->about_des_2,
            'about_des_3'       => $request->about_des_3,
            'about_des_4'       => $request->about_des_4,
            'about_des_5'       => $request->about_des_5,
            'about_des_6'       => $request->about_des_6,
            'about_image'       => 'image.jpg',
            'created_at'        => carbon::now()
        ]);

          $notification=array(
            'message'=>'About Add successfully',
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
        return view('admin.about.edit',[
            'abouts'   => About::findOrFail($id)
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
            'about_title'  => 'required',
            'about_sub_title'  => 'required',
            'about_description'  => 'required',
            'about_des_1'  => 'required',
            'about_des_2'  => 'required',
            'about_des_3'  => 'required',
            'about_des_4'  => 'required',
            'about_des_5'  => 'required',
            'about_des_6'  => 'required',
        ]);

        About::findOrFail($id)->update([
            'about_title'       => $request->about_title,
            'about_sub_title'   => $request->about_sub_title,
            'about_description' => $request->about_description,
            'about_des_1'       => $request->about_des_1,
            'about_des_2'       => $request->about_des_2,
            'about_des_3'       => $request->about_des_3,
            'about_des_4'       => $request->about_des_4,
            'about_des_5'       => $request->about_des_5,
            'about_des_6'       => $request->about_des_6,
            'about_image'       => 'image.jpg',
            'created_at'        => carbon::now()
        ]);

          $notification=array(
            'message'=>'About update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('about.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        About::findOrFail($id)->delete();
          $notification=array(
            'message'=>'About Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('about.index')->with($notification);
    }

     public function inactive($id)
    {
        About::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'About Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function active($id)
    {
        About::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'About Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
