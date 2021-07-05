@extends('layouts.dashboard')

@section('title')
Cti
@endsection

@section('Cti')
active
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add Cti</li>
    </ol>
  </nav>
@endsection


@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">List Cti</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-25p">Cti Image</th>
                            <th class="wd-25p">Cti Video Link</th>
                            <th class="wd-25p">Cti Title</th>
                            <th class="wd-25p">Cti Description</th>
                            <th class="wd-25p">Cti Btn</th>
                            <th class="wd-25p">status</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($ctis as $item)
                          <tr>
                            
                            <td>{{ $item->cti_image }}</td>
                            <td>{{ Str::limit($item->cti_link, 10) }}</td>
                            <td>{{ $item->cti_title }}</td>
                            <td>{{ Str::limit($item->cti_des, 20) }}</td>
                            <td>{{ $item->cti_btn }}</td>
                            <td>
                              @if ($item->status == 1)
                               <span class="badge badge-pill badge-success">Active</span>
                               @else
                                 <span class="badge badge-pill badge-danger">Deactive</span>
                              @endif
                          </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('cti.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form action="{{ route('cti.destroy',$item->id) }}" method="POST">
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
                    ADD Cti
                </div> 
                <div class="card-body">
                    <form action="{{ route('cti.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label>Cti Image</label>
                          <input type="file" name="cti_image" class="form-control dropify">
                          @error('cti_image')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Cti Video Link</label>
                          <input type="text" name="cti_link" class="form-control" placeholder="Cti Video Link">
                          @error('cti_link')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label>Cti Sub Title</label>
                            <input type="text" name="cti_title" class="form-control" placeholder="Cti Title">
                            @error('cti_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                          <div class="form-group">
                            <label>Cti Description</label>
                            <textarea name="cti_des" class="form-control" placeholder="Cti Title"></textarea>
                            @error('cti_des')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Cti Btn</label>
                            <input type="text" name="cti_btn" class="form-control" placeholder="Cti Btn">
                            @error('cti_btn')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                      
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Add Cti</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection