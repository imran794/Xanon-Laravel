@extends('layouts.dashboard')

@section('title')
Blog
@endsection

@section('Blog')
active
@endsection


@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
    </ol>
  </nav>
@endsection


@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">Add Blog</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            
                            <th class="wd-25p">Blog Image</th>
                            <th class="wd-25p">Blog Title</th>
                            <th class="wd-25p">Blog Description</th>
                            <th class="wd-25p">Blog Btn</th>
                            <th class="wd-25p">status</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($blogs as $item)
                          <tr>
                            
                            <td>{{ $item->blog_image }}</td>
                            <td>{{ $item->blog_title }}</td>
                            <td>{{ $item->blog_description }}</td>
                            <td>{{ $item->blog_btn }}</td>
                            <td>
                              @if ($item->status == 1)
                               <span class="badge badge-pill badge-success">Active</span>
                               @else
                                 <span class="badge badge-pill badge-danger">Deactive</span>
                              @endif
                          </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('blog.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form action="{{ route('blog.destroy',$item->id) }}" method="POST">
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
                    ADD Blog
                </div> 
                <div class="card-body">
                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="form-group">
                            <label>Blog Sub Title</label>
                            <input type="file" name="blog_image" class="form-control dropify">
                            @error('blog_image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 

                        <div class="form-group">
                          <label>Blog Title</label>
                          <input type="text" name="blog_title" class="form-control" placeholder="Blog Title">
                          @error('blog_title')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Blog Description</label>
                          <textarea name="blog_description" class="form-control" placeholder="Blog Description"></textarea>
                          @error('blog_description')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Blog Btn</label>
                          <input type="text" name="blog_btn" class="form-control" placeholder="Blog Btn">
                          @error('blog_btn')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Add Blog</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection