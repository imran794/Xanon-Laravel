@extends('layouts.dashboard')

@section('title')
About
@endsection

@section('About')
active
@endsection


@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add About</li>
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
                    <form action="{{ route('about.update',$abouts->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                          <label>About Title</label>
                          <input type="text" name="about_title" class="form-control" value="{{ $abouts->about_title }}">
                          @error('about_title')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label>About Sub Title</label>
                            <input type="text" name="about_sub_title" class="form-control" value="{{ $abouts->about_sub_title }}">
                            @error('about_sub_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                          <div class="form-group">
                            <label>About Description</label>
                            <textarea name="about_description" class="form-control">{{ $abouts->about_description }}</textarea>
                            @error('about_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                          <div class="form-group">
                            <label>About Description</label>
                            <textarea name="about_des_1" class="form-control">{{ $abouts->about_des_1  }}</textarea>
                            @error('about_des_1')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                           <div class="form-group">
                            <label>About Description2</label>
                            <textarea name="about_des_2" class="form-control">{{  $abouts->about_des_1  }}</textarea>
                            @error('about_des_2')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> <div class="form-group">
                            <label>About Description3</label>
                            <textarea name="about_des_3" class="form-control">{{ $abouts->about_des_3 }}</textarea>
                            @error('about_des_3')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                          <div class="form-group">
                            <label>About Description4</label>
                            <textarea name="about_des_4" class="form-control"> {{ $abouts->about_des_4 }} </textarea>
                            @error('about_des_4')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                           <div class="form-group">
                            <label>About Description5</label>
                            <textarea name="about_des_5" class="form-control"> {{ $abouts->about_des_5 }} </textarea>
                            @error('about_des_5')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                          <div class="form-group">
                            <label>About Description6</label>
                            <textarea name="about_des_6" class="form-control"> {{ $abouts->about_des_6 }}  </textarea>
                            @error('about_des_6')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>About Image</label>
                            <input type="file" name="about_image" class="form-control dropify" placeholder="About Image">
                            @error('about_image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Update About</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection