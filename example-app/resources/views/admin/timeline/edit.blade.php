@extends('layouts.dashboard')

@section('title')
Update timeline
@endsection

@section('About')
active
@endsection


@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('timeline.index') }}">Timeline</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update Timeline</li>
    </ol>
  </nav>
@endsection


@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Update Timeline
                </div> 
                <div class="card-body">
                    <form action="{{ route('timeline.update',$timelines->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                          <label>timeline Title</label>
                          <input type="text" name="time_date" class="form-control" value="{{ $timelines->time_date }}">
                          @error('time_date')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>  
                        <div class="form-group">
                          <label>timeline Title</label>
                          <input type="text" name="time_title" class="form-control" value="{{ $timelines->time_title }}">
                          @error('time_title')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                          <div class="form-group">
                            <label>timeline Description</label>
                            <textarea name="time_description" class="form-control"> {{ $timelines->time_description }} </textarea>
                            @error('time_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                        
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Update timeline</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection