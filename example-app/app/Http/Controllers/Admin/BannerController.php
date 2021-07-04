<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Carbon\carbon;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.banner.index',[
            'banners'   => Banner::latest()->get()
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
            'banner_title'  => 'required',
            'banner_sub_title'  => 'required',
            'banner_btn'  => 'required',
            'banner_btn2'  => 'required',
        ]);

        Banner::insert([
            'banner_title'      => $request->banner_title,
            'banner_sub_title'  => $request->banner_sub_title,
            'banner_btn'        => $request->banner_btn,
            'banner_btn2'       => $request->banner_btn2,
            'banner_image'      => 'imran.jpg',
            'created_at'        => carbon::now()
        ]);

          $notification=array(
            'message'=>'Banner Add successfully',
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
        return view('admin.banner.edit',[
            'banners'   => Banner::findOrFail($id)
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
            'banner_title'  => 'required',
            'banner_sub_title'  => 'required',
            'banner_btn'  => 'required',
            'banner_btn2'  => 'required',
        ]);

        Banner::findOrFail($id)->update([
            'banner_title'      => $request->banner_title,
            'banner_sub_title'  => $request->banner_sub_title,
            'banner_btn'        => $request->banner_btn,
            'banner_btn2'       => $request->banner_btn2,
            'banner_image'      => 'imran.jpg',
            'updated_at'        => carbon::now()
        ]);

          $notification=array(
            'message'=>'Banner Update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('banner.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::findOrFail($id)->delete();
              $notification=array(
            'message'=>'Banner Delete Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        Banner::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'Banner Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function active($id)
    {
        Banner::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'Banner Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
