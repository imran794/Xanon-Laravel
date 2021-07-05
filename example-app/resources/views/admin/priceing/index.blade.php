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
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">Add priceing</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            
                            <th class="wd-25p">Priceing Sub Title</th>
                            <th class="wd-25p">Priceing Title</th>
                            <th class="wd-25p">Priceing List1</th>
                            <th class="wd-25p">Priceing Btn</th>
                            <th class="wd-25p">status</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($priceings as $item)
                          <tr>
                            
                            <td>{{ $item->price_sub_title }}</td>
                            <td>{{ $item->price_title }}</td>
                            <td>{{ $item->price_list1 }}</td>
                            <td>{{ $item->price_btn }}</td>
                            <td>
                              @if ($item->status == 1)
                               <span class="badge badge-pill badge-success">Active</span>
                               @else
                                 <span class="badge badge-pill badge-danger">Deactive</span>
                              @endif
                          </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('priceing.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form action="{{ route('priceing.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                  <button class="btn btn-sm btn-danger" style="cursor: pointer;"  title="delete data"><i class="fa fa-trash"></i></button>
                                </form>
                           
                                @if ($item->status == 1)
                                 <a href="{{ url('admin/inactive') }}/{{ $item->id }}"  type="button" class="btn btn-danger btn-sm" title="Inactive"><i class="fa fa-arrow-down"></i></a>
                                 @else  
                                  <a href="{{ url('admin/active') }}/{{ $item->id }}"  type="button" class="btn btn-info btn-sm" title="Active"><i class="fa fa-arrow-up"></i></a>
                                   @endif 
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
               </div>
           </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    ADD priceing
                </div> 
                <div class="card-body">
                    <form action="{{ route('priceing.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="form-group">
                            <label>Priceing Sub Title</label>
                            <input type="text" name="price_sub_title" class="form-control" placeholder="priceing Sub Title">
                            @error('price_sub_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 

                        <div class="form-group">
                          <label>Priceing Title</label>
                          <input type="text" name="price_title" class="form-control" placeholder="priceing Title">
                          @error('price_title')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Priceing List1</label>
                          <input type="text" name="price_list1" class="form-control" placeholder="priceing List1">
                          @error('price_list1')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Priceing List2</label>
                          <input type="text" name="price_list2" class="form-control" placeholder="priceing List2">
                          @error('price_list2')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Priceing List3</label>
                          <input type="text" name="price_list3" class="form-control" placeholder="Priceing List3">
                          @error('price_list3')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>    
                        <div class="form-group">
                          <label>priceing List4</label>
                          <input type="text" name="price_list4" class="form-control" placeholder="Price List4">
                          @error('price_list4')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>    <div class="form-group">
                          <label>priceing List5</label>
                          <input type="text" name="price_list5" class="form-control" placeholder="Price List5">
                          @error('price_list5')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>   
                       
                          <div class="form-group">
                            <label>Priceing Btn</label>
                            <input type="text" name="price_btn" class="form-control" placeholder="Priceing Btn">
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