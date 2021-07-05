@extends('layouts.dashboard')

@section('title')
Update Blog
@endsection


@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ url('admin/blog') }}">Blog</a></li>
      <li class="breadcrumb-item active" aria-current="page">Blog Edit</li>
    </ol>
  </nav>
@endsection

@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    ADD blog
                </div> 
                <div class="card-body">
                    <form action="{{ route('blog.update',$blogs->id) }}" method="POST" enctype="multipart/form-data">
                       @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Blog Sub Title</label>
                            <input type="file" name="blog_image" class="form-control dropify">
                            @error('blog_image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 

                        <div class="form-group">
                          <label>Blog Title</label>
                          <input type="text" name="blog_title" class="form-control"  value="{{ $blogs->blog_title }}">
                          @error('blog_title')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Blog Description</label>
                          <textarea name="blog_description" class="form-control"> {{ $blogs->blog_description }} </textarea>
                          @error('blog_description')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Blog Btn</label>
                          <input type="text" name="blog_btn" class="form-control" value="{{ $blogs->blog_btn }}">
                          @error('blog_btn')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Update blog</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection