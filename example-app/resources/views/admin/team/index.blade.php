@extends('layouts.dashboard')

@section('title')
Team
@endsection

@section('Team')
active
@endsection


@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add Team</li>
    </ol>
  </nav>
@endsection


@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">Add Team</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            
                            <th class="wd-18p">Team Image</th>
                            <th class="wd-18p">Team Title</th>
                            <th class="wd-18p">Team Sub Title</th>
                            <th class="wd-18p">status</th>
                            <th class="wd-18p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($teams as $item)
                          <tr>
                            
                            <td>{{ $item->team_image }}</td>
                            <td>{{ $item->team_title }}</td>
                            <td>{{ $item->team_sub_title }}</td>
                            <td>
                              @if ($item->status == 1)
                               <span class="badge badge-pill badge-success">Active</span>
                               @else
                                 <span class="badge badge-pill badge-danger">Deactive</span>
                              @endif
                          </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('team.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form action="{{ route('team.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                  <button class="btn btn-sm btn-danger" style="cursor: pointer;"  title="delete data"><i class="fa fa-trash"></i></button>
                                </form>
                           
                                @if ($item->status == 1)
                                 <a href="{{ url('admin/inactive') }}/{{ $item->id }}"  type="button" class="btn btn-danger btn-sm" title="Inactive"><i class="fa fa-arrow-down"></i></a>
                                 @else  
                                  <a href="{{ url('admin/active') }}/{{ $item->id }}"  type="button" class="btn btn-info btn-sm" title="Active"><i class="fa fa-arrow-up"></i></a>
                                   @endif 
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
               </div>
           </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    ADD Team
                </div> 
                <div class="card-body">
                    <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="form-group">
                            <label>Team Image</label>
                            <input type="file" name="team_image" class="form-control dropify" placeholder="Team Image">
                            @error('team_image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                            <div class="form-group">
                            <label>Team Title</label>
                            <input type="text" name="team_title" class="form-control" placeholder="Team Title">
                            @error('team_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 

                        <div class="form-group">
                          <label>Team Sub Title</label>
                          <input type="text" name="team_sub_title" class="form-control" placeholder="Team Sub Title">
                          @error('team_sub_title')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Team Facebook Icon</label>
                          <input type="text" name="team_facebook" class="form-control" placeholder="Team Facebook Icon">
                          @error('team_facebook')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                         <div class="form-group">
                          <label>Team Facebook Link</label>
                          <input type="text" name="team_facebook_link" class="form-control" placeholder="Team Facebook Link">
                          @error('team_facebook_link')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Team Twitter Icon</label>
                          <input type="text" name="team_twitter" class="form-control" placeholder="Team Twitter Icon">
                          @error('team_twitter')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Team Title</label>
                          <input type="text" name="team_twitter_link" class="form-control" placeholder="Team Twitter Link">
                          @error('team_twitter_link')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div> 
                        <div class="form-group">
                          <label>Team Youtube Icon</label>
                          <input type="text" name="team_youtube" class="form-control" placeholder="Team Youtube Icon">
                          @error('team_youtube')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div> <div class="form-group">
                          <label>Team Youtube Link</label>
                          <input type="text" name="team_youtube_link" class="form-control" placeholder="Team Youtube Link">
                          @error('team_youtube_link')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div> <div class="form-group">
                          <label>Team linkedin Icon</label>
                          <input type="text" name="team_linkedin" class="form-control" placeholder="Team linkedin Icon">
                          @error('team_linkedin')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div> <div class="form-group">
                          <label>Team linkedin Link</label>
                          <input type="text" name="team_linkedin_link" class="form-control" placeholder="Team linkedin Link">
                          @error('team_linkedin_link')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Add Team</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection