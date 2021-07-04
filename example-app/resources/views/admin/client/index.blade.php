@extends('layouts.dashboard')

@section('title')
Client
@endsection

@section('Client')
active
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add Client</li>
    </ol>
  </nav>
@endsection


@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">List Client</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-25p">Client Image</th>
                            <th class="wd-25p">client Description</th>
                            <th class="wd-25p">Client Title</th>
                            <th class="wd-25p">Client Sub Title</th>
                            <th class="wd-25p">status</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($clients as $item)
                          <tr>
                            
                            <td>{{ $item->client_image }}</td>
                            <td>{{ Str::limit($item->client_des, 10) }}</td>
                            <td>{{ $item->client_title }}</td>
                            <td>{{ $item->client_sub_title }}</td>
                            <td>
                              @if ($item->status == 1)
                               <span class="badge badge-pill badge-success">Active</span>
                               @else
                                 <span class="badge badge-pill badge-danger">Deactive</span>
                              @endif
                          </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('client.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form action="{{ route('client.destroy',$item->id) }}" method="POST">
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
                    ADD Client
                </div> 
                <div class="card-body">
                    <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label>Client Image</label>
                          <input type="file" name="client_image" class="form-control dropify" placeholder="Client Image">
                          @error('client_image')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label>Banner Sub Title</label>
                            <textarea name="client_des" class="form-control" placeholder="client Description"></textarea>
                            @error('client_des')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Client Title</label>
                            <input type="text" name="client_title" class="form-control" placeholder="Client Title">
                            @error('client_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Client Sub Title</label>
                            <input type="text" name="client_sub_title" class="form-control" class="form-control" placeholder="Client Sub Title">
                            @error('client_sub_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                        
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Add Client</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection