@extends('layouts.dashboard')

@section('title')
Update Cti
@endsection

@section('Cti')
active
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ url('admin.cit') }}"> Add Cti</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update Cti</li>
    </ol>
  </nav>
@endsection


@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    ADD Cti
                </div> 
                <div class="card-body">
                    <form action="{{ route('cti.update',$ctis->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                          <label>Cti Image</label>
                          <input type="file" name="cti_image" class="form-control dropify">
                          @error('cti_image')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Cti Video Link</label>
                          <input type="text" name="cti_link" class="form-control" value="{{ $ctis->cti_link }}">
                          @error('cti_link')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label>Cti Sub Title</label>
                            <input type="text" name="cti_title" class="form-control" value="{{ $ctis->cti_title }}">
                            @error('cti_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                          <div class="form-group">
                            <label>Cti Description</label>
                            <textarea name="cti_des" class="form-control" placeholder="Cti Title">{{ $ctis->cti_des }}</textarea>
                            @error('cti_des')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Cti Btn</label>
                            <input type="text" name="cti_btn" class="form-control" value="{{ $ctis->cti_btn }}">
                            @error('cti_btn')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                      
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Update Cti</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection