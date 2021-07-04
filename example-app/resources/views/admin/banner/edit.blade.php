@extends('layouts.dashboard')

@section('title')
Banner
@endsection


@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ url('admin/banner') }}">Banner</a></li>
      <li class="breadcrumb-item active" aria-current="page">Banner Edit</li>
    </ol>
  </nav>
@endsection

@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    ADD Banner
                </div> 
                <div class="card-body">
                    <form action="{{ route('banner.update',$banners->id) }}" method="POST" enctype="multipart/form-data">
                       @csrf
                        @method('put')
                        <div class="form-group">
                          <label>Banner Title</label>
                          <input type="text" name="banner_title" class="form-control" value="{{ $banners->banner_title }}">
                          @error('banner_title')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label>Banner Sub Title</label>
                            <input type="text" name="banner_sub_title" class="form-control" value="{{ $banners->banner_sub_title }}" >
                            @error('banner_sub_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Banner Btn</label>
                            <input type="text" name="banner_btn" class="form-control" value="{{ $banners->banner_btn }}">
                            @error('banner_btn')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Validaty Till</label>
                            <input type="text" name="banner_btn2" class="form-control" class="form-control" value="{{ $banners->banner_btn2 }}">
                            @error('banner_btn2')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Update Banner</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection