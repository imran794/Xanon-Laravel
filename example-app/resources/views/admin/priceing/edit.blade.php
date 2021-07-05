@extends('layouts.dashboard')

@section('title')
Priceing
@endsection

@section('Priceing')
active
@endsection


@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add priceing</li>
    </ol>
  </nav>
@endsection


@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    ADD priceing
                </div> 
                <div class="card-body">
                    <form action="{{ route('priceing.update', $priceings->id) }}" method="POST">
                        @csrf
                          @method('put')
                         <div class="form-group">
                            <label>Priceing Sub Title</label>
                            <input type="text" name="price_sub_title" class="form-control" value="{{ $priceings->price_sub_title }}">
                            @error('price_sub_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 

                        <div class="form-group">
                          <label>Priceing Title</label>
                          <input type="text" name="price_title" class="form-control" value="{{ $priceings->price_title }}">
                          @error('price_title')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Priceing List1</label>
                          <input type="text" name="price_list1" class="form-control" value="{{ $priceings->price_list1 }}">
                          @error('price_list1')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Priceing List2</label>
                          <input type="text" name="price_list2" class="form-control" value="{{ $priceings->price_list2 }}">
                          @error('price_list2')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Priceing List3</label>
                          <input type="text" name="price_list3" class="form-control" value="{{ $priceings->price_list3 }}">
                          @error('price_list3')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>    
                        <div class="form-group">
                          <label>priceing List4</label>
                          <input type="text" name="price_list4" class="form-control" value="{{ $priceings->price_list4 }}">
                          @error('price_list4')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>    <div class="form-group">
                          <label>priceing List5</label>
                          <input type="text" name="price_list5" class="form-control" value="{{ $priceings->price_list5 }}">
                          @error('price_list5')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>   
                       
                          <div class="form-group">
                            <label>Priceing Btn</label>
                            <input type="text" name="price_btn" class="form-control" value="{{ $priceings->price_btn }}">
                            @error('price_btn')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Add Priceing</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection