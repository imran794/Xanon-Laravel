<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Singlecontact;
use Carbon\carbon;

class SinglecontactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.singlecontact.index',[
            'singlecontacts'       => Singlecontact::latest()->get()
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
            'single_icon'        => 'required',
            'single_title'       => 'required',
            'single_sub_title'   => 'required',
        ]);

        Singlecontact::insert([
            'single_icon'           => $request->single_icon,
            'single_title'          => $request->single_title,
            'single_sub_title'      => $request->single_sub_title,
            'created_at'            => carbon::now()
        ]);

          $notification=array(
            'message'=>'All Contact Insert Successfully',
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
        return view('admin.singlecontact.edit',[
            'singlecontacts'       => Singlecontact::findOrFail($id)
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
            'single_icon'        => 'required',
            'single_title'       => 'required',
            'single_sub_title'   => 'required',
        ]);

        Singlecontact::findOrFail($id)->update([
            'single_icon'           => $request->single_icon,
            'single_title'          => $request->single_title,
            'single_sub_title'      => $request->single_sub_title,
            'created_at'            => carbon::now()
        ]);

          $notification=array(
            'message'=>'All Contact Update Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('singlecontact.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        Singlecontact::findOrFail($id)->delete();
              $notification=array(
            'message'=>'Singlecontact Delete Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        Singlecontact::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'Singlecontact Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function active($id)
    {
        Singlecontact::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'Singlecontact Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
}

}
