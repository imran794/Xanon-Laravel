<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Carbon\carbon;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.team.index',[
            'teams'     => Team::latest()->get()
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
            'team_title'      => 'required',
            'team_sub_title'  => 'required',
        ]);

        Team::insert([
            'team_image'              => 'imran.jpg',
            'team_title'              => $request->team_title,
            'team_sub_title'          => $request->team_sub_title,
            'team_facebook'           => $request->team_facebook,
            'team_facebook_link'      => $request->team_facebook_link,
            'team_twitter'            => $request->team_twitter,
            'team_twitter_link'       => $request->team_twitter_link,
            'team_youtube'            => $request->team_youtube,
            'team_youtube_link'       => $request->team_youtube_link,
            'team_linkedin'           => $request->team_linkedin,
            'team_linkedin_link'      => $request->team_linkedin_link,
            'created_at'              => carbon::now()
        ]);

          $notification=array(
            'message'=>'Team Add Successfully',
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
         return view('admin.team.edit',[
            'teams'     => Team::findOrFail($id)
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
            'team_title'      => 'required',
            'team_sub_title'  => 'required',
        ]);

        Team::findOrFail($id)->update([
            'team_image'              => 'imran.jpg',
            'team_title'              => $request->team_title,
            'team_sub_title'          => $request->team_sub_title,
            'team_facebook'           => $request->team_facebook,
            'team_facebook_link'      => $request->team_facebook_link,
            'team_twitter'            => $request->team_twitter,
            'team_twitter_link'       => $request->team_twitter_link,
            'team_youtube'            => $request->team_youtube,
            'team_youtube_link'       => $request->team_youtube_link,
            'team_linkedin'           => $request->team_linkedin,
            'team_linkedin_link'      => $request->team_linkedin_link,
            'updated_at'              => carbon::now()
        ]);

          $notification=array(
            'message'=>'Team Delete Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        Team::findOrFail($id)->delete();
              $notification=array(
            'message'=>'Team Delete Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        Team::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'Team Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function active($id)
    {
        Team::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'Team Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
