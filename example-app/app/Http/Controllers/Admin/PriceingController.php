<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Priceing;
use Carbon\carbon;

class PriceingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.priceing.index',[
            'priceings'     => Priceing::latest()->get()
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
            'price_sub_title'  => 'required',
            'price_title'  => 'required',
            'price_list1'  => 'required',
            'price_list2'  => 'required',
            'price_list3'  => 'required',
            'price_list4'  => 'required',
            'price_list5'  => 'required',
            'price_btn'  => 'required',
        ]);

        Priceing::insert([
            'price_sub_title'      => $request->price_sub_title,
            'price_title'          => $request->price_title,
            'price_list1'          => $request->price_list1,
            'price_list2'          => $request->price_list2,
            'price_list3'          => $request->price_list3,
            'price_list4'          => $request->price_list4,
            'price_list5'          => $request->price_list5,
            'price_btn'            => $request->price_btn,
            'created_at'           => carbon::now()
        ]);

          $notification=array(
            'message'=>'Priceing Add successfully',
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
        return view('admin.priceing.edit',[
            'priceings'     => Priceing::findOrFail($id)
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
            'price_sub_title'  => 'required',
            'price_title'  => 'required',
            'price_list1'  => 'required',
            'price_list2'  => 'required',
            'price_list3'  => 'required',
            'price_list4'  => 'required',
            'price_list5'  => 'required',
            'price_btn'  => 'required',
        ]);

        Priceing::findOrFail($id)->update([
            'price_sub_title'      => $request->price_sub_title,
            'price_title'          => $request->price_title,
            'price_list1'          => $request->price_list1,
            'price_list2'          => $request->price_list2,
            'price_list3'          => $request->price_list3,
            'price_list4'          => $request->price_list4,
            'price_list5'          => $request->price_list5,
            'price_btn'            => $request->price_btn,
            'updated_at'           => carbon::now()
        ]);

          $notification=array(
            'message'=>'Priceing Update Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('priceing.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Priceing::findOrFail($id)->delete();
          $notification=array(
            'message'=>'Priceing Delete Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

     public function inactive($id)
    {
        Priceing::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'Priceing Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function active($id)
    {
        Priceing::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'Priceing Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
