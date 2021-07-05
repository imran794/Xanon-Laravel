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
      <li class="breadcrumb-item active" aria-current="page">Add Contact Address</li>
    </ol>
  </nav>
@endsection


@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">Add Contact Address</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-25p">Icon</th>
                            <th class="wd-25p">Title</th>
                            <th class="wd-25p">Sub Title</th>
                            <th class="wd-25p">status</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($singlecontacts as $item)
                          <tr>
                            
                            <td>{{ $item->single_icon }}</td>
                            <td>{{ $item->single_title }}</td>
                            <td>{{ $item->single_sub_title }}</td>
                            <td>
                              @if ($item->status == 1)
                               <span class="badge badge-pill badge-success">Active</span>
                               @else
                                 <span class="badge badge-pill badge-danger">Deactive</span>
                              @endif
                          </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('singlecontact.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form action="{{ route('singlecontact.destroy',$item->id) }}" method="POST">
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
                    ADD Contact Address
                </div> 
                <div class="card-body">
                    <form action="{{ route('singlecontact.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Single Icon</label>
                          <input type="text" name="single_icon" class="form-control" placeholder="Single Icon">
                          @error('single_icon')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label>Single Title</label>
                              <input type="text" name="single_title" class="form-control" placeholder="Single Title">
                         
                            @error('single_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Single Sub Title</label>
                            <input type="text" name="single_sub_title" class="form-control" placeholder="Single Sub Title">
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