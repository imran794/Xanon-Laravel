<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactform;
use Carbon\carbon;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    // public function contactform(Request $request)
    // {
    //     $request->validate([
    //         'name'      => 'required',
    //         'subject'  => 'required',
    //         'email'  => 'required',
    //         'message'  => 'required',
    //     ]);

    //     Contactform::insert([
    //         'name'                    => $request->name,
    //         'subject'                 => $request->subject,
    //         'email'                   => $request->email,
    //         'message'                 => $request->message,
    //         'created_at'              => carbon::now()
    //     ]);

    //       $notification=array(
    //         'message'=>'Contact Submit Successfully',
    //         'alert-type'=>'success'
    //     );
    //     return Redirect()->back()->with($notification);
    // }
}
   

     