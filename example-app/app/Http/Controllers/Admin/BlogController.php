<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Carbon\carbon;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blog.index',[
            'blogs'     => BLog::latest()->get()
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
            'blog_title'        => 'required',
            'blog_description'  => 'required',
            'blog_btn'          => 'required',
        ]);

        Blog::insert([
            'blog_image'            => 'imran.jpg',
            'blog_title'            => $request->blog_title,
            'blog_description'      => $request->blog_description,
            'blog_btn'              => $request->blog_btn,
            'created_at'            => carbon::now()
        ]);

          $notification=array(
            'message'=>'Blog Insert Successfully',
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
          return view('admin.blog.edit',[
            'blogs'     => BLog::findOrFail($id)
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
            'blog_title'        => 'required',
            'blog_description'  => 'required',
            'blog_btn'          => 'required',
        ]);

        Blog::findOrFail($id)->update([
            'blog_image'            => 'imran.jpg',
            'blog_title'            => $request->blog_title,
            'blog_description'      => $request->blog_description,
            'blog_btn'              => $request->blog_btn,
            'created_at'            => carbon::now()
        ]);

          $notification=array(
            'message'=>'Blog update Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('blog.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        Blog::findOrFail($id)->delete();
          $notification=array(
            'message'=>'Blog Delete Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

     public function inactive($id)
    {
        Blog::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'Blog Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function active($id)
    {
        Blog::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'Blog Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
