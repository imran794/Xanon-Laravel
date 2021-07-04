<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Carbon\carbon;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.client.index',[
            'clients'   => Client::latest()->get()
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
            'client_des'           => 'required',
            'client_title'          => 'required',
            'client_sub_title'      => 'required',
        ]);

        Client::insert([
            'client_image'           => 'imran.jpg',
            'client_des'           => $request->client_des,
            'client_title'          => $request->client_title,
            'client_sub_title'    => $request->client_sub_title,
            'created_at'          => carbon::now()
        ]);

          $notification=array(
            'message'=>'Client Add successfully',
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
         return view('admin.client.edit',[
            'clients'   => Client::findOrFail($id)
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
            'client_des'           => 'required',
            'client_title'          => 'required',
            'client_sub_title'      => 'required',
        ]);

        Client::findOrFail($id)->update([
            'client_image'           => 'imran.jpg',
            'client_des'           => $request->client_des,
            'client_title'          => $request->client_title,
            'client_sub_title'    => $request->client_sub_title,
            'created_at'          => carbon::now()
        ]);

          $notification=array(
            'message'=>'Client Add successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('client.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Client::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Client Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        Client::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'Client Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function active($id)
    {
        Client::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'Client Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


}
