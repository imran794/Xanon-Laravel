<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cti;
use carbon\carbon;

class CtiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cti.index',[
            'ctis'  => Cti::latest()->get()
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
            'cti_link'           => 'required',
            'cti_title'          => 'required',
            'cti_des'            => 'required',
            'cti_btn'            => 'required',
        ]);

        Cti::insert([
            'cti_image'         => 'imran.jpg',
            'cti_link'         =>  $request->cti_link,
            'cti_title'         => $request->cti_title,
            'cti_des'           => $request->cti_des,
            'cti_btn'           => $request->cti_btn,
            'status'           => 1,
            'created_at'        => carbon::now()
        ]);

          $notification=array(
            'message'=>'Cti Add successfully',
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
         return view('admin.cti.edit',[
            'ctis'  => Cti::findOrFail($id)
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
            'cti_link'           => 'required',
            'cti_title'          => 'required',
            'cti_des'            => 'required',
            'cti_btn'            => 'required',
        ]);

        Cti::findOrFail($id)->update([
            'cti_image'         => 'imran.jpg',
            'cti_link'          =>  $request->cti_link,
            'cti_title'         => $request->cti_title,
            'cti_des'           => $request->cti_des,
            'cti_btn'           => $request->cti_btn,
            'status'            => 1,
            'updated_at'        => carbon::now()
        ]);

          $notification=array(
            'message'=>'Cti Add successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('cti.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        Cti::findOrFail($id)->delete();
          $notification=array(
            'message'=>'Cti Delete Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

     public function inactive($id)
    {
        Cti::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'Cti Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function active($id)
    {
        Cti::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'Cti Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
