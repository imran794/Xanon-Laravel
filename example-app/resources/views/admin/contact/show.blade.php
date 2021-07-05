@extends('layouts.dashboard')

@section('title')
All Message
@endsection

@section('Contactform')
active
@endsection


@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Show All User Messages</li>
    </ol>
  </nav>
@endsection


@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    All User Message
                </div> 
                <div class="card-body">
                         <div class="form-group">
                            <label>Nane</label>
                            <input type="text" class="form-control" value="{{ $contacts->name }}">
                       
                          </div> 

                        <div class="form-group">
                          <label>Subject</label>
                          <input type="text"  class="form-control" value="{{ $contacts->subject }}">
                       
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="price_list1" class="form-control" value="{{ $contacts->email }}">
                   
                        </div>
                        <div class="form-group">
                          <label>Message</label>

                          <textarea rows="10" class="form-control"> {{ $contacts->message }} </textarea>
                          @error('price_list2')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                      
                          </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>



@endsection