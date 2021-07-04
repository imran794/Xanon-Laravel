@extends('layouts.dashboard')

@section('title')
Update project
@endsection

@section('project')
active
@endsection


@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ url('project.index') }}">project</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update project</li>
    </ol>
  </nav>
@endsection


@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    ADD About
                </div> 
                <div class="card-body">
                    <form action="{{ route('project.update',$projects->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                          <label>Project Image</label>
                          <input type="file" name="project_image" class="form-control dropify">
                          @error('project_image')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Project Gallery Image</label>
                          <input type="file" name="project_gallery_image" class="form-control dropify">
                          @error('project_gallery_image')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>project Title</label>
                          <input type="text" name="project_icon" class="form-control" value="{{ $projects->project_icon }}">
                          @error('project_icon')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>  
                        <div class="form-group">
                          <label>project Title</label>
                          <input type="text" name="project_title" class="form-control" value="{{ $projects->project_title }}">
                          @error('project_title')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                            <div class="form-group">
                            <label>Project Sub Title</label>
                            <input type="text" name="project_sub_title" class="form-control" class="form-control" value="{{ $projects->project_sub_title }}">
                            @error('project_sub_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                        
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Update project</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection