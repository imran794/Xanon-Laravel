@extends('layouts.dashboard')

@section('title')
Update Services
@endsection

@section('About')
active
@endsection


@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ url('services.index') }}">Services</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update Services</li>
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
                    <form action="{{ route('services.update',$servicess->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                          <label>Services Title</label>
                          <input type="text" name="services_icon" class="form-control" value="{{ $servicess->services_icon }}">
                          @error('services_icon')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>  
                        <div class="form-group">
                          <label>Services Title</label>
                          <input type="text" name="services_title" class="form-control" value="{{ $servicess->services_title }}">
                          @error('services_title')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                          <div class="form-group">
                            <label>Services Description</label>
                            <textarea name="services_description" class="form-control"> {{ $servicess->services_description }} </textarea>
                            @error('services_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                        
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Update Services</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection