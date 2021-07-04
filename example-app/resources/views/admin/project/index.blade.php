@extends('layouts.dashboard')

@section('title')
Project
@endsection

@section('Project')
active
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add Banner</li>
    </ol>
  </nav>
@endsection


@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">List Banner</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-25p">Project Image</th>
                            <th class="wd-25p">Project Icon</th>
                            <th class="wd-25p">Project Title</th>
                            <th class="wd-25p">Project Sub Title</th>
                            <th class="wd-25p">status</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($projects as $item)
                          <tr>
                            
                            <td>{{ $item->project_image }}</td>
                            <td>{{ $item->project_icon }}</td>
                            <td>{{ $item->project_title }}</td>
                            <td>{{ $item->project_sub_title }}</td>
                            <td>
                              @if ($item->status == 1)
                               <span class="badge badge-pill badge-success">Active</span>
                               @else
                                 <span class="badge badge-pill badge-danger">Deactive</span>
                              @endif
                          </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('project.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form action="{{ route('project.destroy',$item->id) }}" method="POST">
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
                    ADD Banner
                </div> 
                <div class="card-body">
                    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label>Project Image</label>
                          <input type="file" name="project_image" class="form-control dropify">
                          @error('project_image')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Project Gallery Image</label>
                          <input type="file" name="project_gallery_image" class="form-control dropify">
                          @error('project_gallery_image')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label>Project Icon</label>
                            <input type="text" name="project_icon" class="form-control" placeholder="Project Icon">
                            @error('project_icon')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Project Title</label>
                            <input type="text" name="project_title" class="form-control" placeholder="Project Title">
                            @error('project_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Project Sub Title</label>
                            <input type="text" name="project_sub_title" class="form-control" class="form-control" placeholder="Project Sub Title">
                            @error('project_sub_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                      
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Add Project</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection