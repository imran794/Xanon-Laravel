@extends('layouts.dashboard')

@section('title')
Services
@endsection

@section('Services')
active
@endsection


@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add Services</li>
    </ol>
  </nav>
@endsection


@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">Add Services</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-25p">Services Icom</th>
                            <th class="wd-25p">Services Title</th>
                            <th class="wd-25p">Services Description</th>
                            <th class="wd-25p">status</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($servicess as $item)
                          <tr>
                            
                            <td>{{ $item->services_icon }}</td>
                            <td>{{ $item->services_title }}</td>
                            <td>{{ Str::limit($item->services_description, 15) }}</td>
                            <td>
                              @if ($item->status == 1)
                               <span class="badge badge-pill badge-success">Active</span>
                               @else
                                 <span class="badge badge-pill badge-danger">Deactive</span>
                              @endif
                          </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('services.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form action="{{ route('services.destroy',$item->id) }}" method="POST">
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
                    ADD Services
                </div> 
                <div class="card-body">
                    <form action="{{ route('services.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Services Title</label>
                          <input type="text" name="services_icon" class="form-control" placeholder="Services Icon">
                          @error('services_icon')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>  
                        <div class="form-group">
                          <label>Services Title</label>
                          <input type="text" name="services_title" class="form-control" placeholder="Services Title">
                          @error('services_title')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                          <div class="form-group">
                            <label>Services Description</label>
                            <textarea name="services_description" class="form-control" placeholder="Services Description"></textarea>
                            @error('services_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 

                      
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Add Services</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection