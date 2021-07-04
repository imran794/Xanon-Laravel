@extends('layouts.dashboard')

@section('title')
Client
@endsection

@section('client')
active
@endsection


@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Client</a></li>
      <li class="breadcrumb-item active" aria-current="page">Client Edit</li>
    </ol>
  </nav>
@endsection

@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  Edit Client
                </div> 
                <div class="card-body">
                    <form action="{{ route('client.update',$clients->id) }}" method="POST" enctype="multipart/form-data">
                       @csrf
                        @method('put')
                      <div class="form-group">
                          <label>Client Image</label>
                          <input type="file" name="client_image" class="form-control dropify" placeholder="Client Image">
                          @error('client_image')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label>Clinet Description</label>
                            <textarea name="client_des" class="form-control" placeholder="client Description"> {{ $clients->client_des }} </textarea>
                            @error('client_des')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Client Title</label>
                            <input type="text" name="client_title" class="form-control" value="{{ $clients->client_title }}">
                            @error('client_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Client Sub Title</label>
                            <input type="text" name="client_sub_title" class="form-control" class="form-control" value=" {{ $clients->client_sub_title }} ">
                            @error('client_sub_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Update Client</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection