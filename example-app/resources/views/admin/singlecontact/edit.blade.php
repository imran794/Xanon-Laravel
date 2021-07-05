@extends('layouts.dashboard')

@section('title')
Add Contact Address
@endsection

@section('Add Contact Address')
active
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ url('admin/singlecontact') }}">Add Contact Address</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add Contact Address Update</li>
    </ol>
  </nav>
@endsection


@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    ADD Contact Address
                </div> 
                <div class="card-body">
                    <form action="{{ route('singlecontact.update',$singlecontacts->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                          <label>Single Icon</label>
                          <input type="text" name="single_icon" class="form-control" value="{{ $singlecontacts->single_icon }}">
                          @error('single_icon')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label>Single Title</label>
                              <input type="text" name="single_title" class="form-control" value="{{ $singlecontacts->single_title }}">
                         
                            @error('single_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Single Sub Title</label>
                            <input type="text" name="single_sub_title" class="form-control" value="{{ $singlecontacts->single_sub_title }}">
                            @error('single_sub_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          
                        
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Add Contact Address</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection