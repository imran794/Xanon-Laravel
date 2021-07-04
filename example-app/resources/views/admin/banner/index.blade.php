@extends('layouts.dashboard')

@section('title')
Banner
@endsection

@section('Banner')
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
                            <th class="wd-25p">Banner Title</th>
                            <th class="wd-25p">Banner Sub Title</th>
                            <th class="wd-25p">Banner Btn</th>
                            <th class="wd-25p">Banner Btn2</th>
                            <th class="wd-25p">Banner Image</th>
                            <th class="wd-25p">status</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($banners as $item)
                          <tr>
                            
                            <td>{{ $item->banner_title }}</td>
                            <td>{{ $item->banner_sub_title }}</td>
                            <td>{{ $item->banner_btn }}</td>
                            <td>{{ $item->banner_btn2 }}</td>
                            <td>{{ $item->banner_image }}</td>
                            <td>
                              @if ($item->status == 1)
                               <span class="badge badge-pill badge-success">Active</span>
                               @else
                                 <span class="badge badge-pill badge-danger">Deactive</span>
                              @endif
                          </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('banner.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form action="{{ route('banner.destroy',$item->id) }}" method="POST">
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
                    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label>Banner Title</label>
                          <input type="text" name="banner_title" class="form-control" placeholder="Banner Title">
                          @error('banner_title')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label>Banner Sub Title</label>
                            <input type="text" name="banner_sub_title" class="form-control" placeholder="Banner Sub Title">
                            @error('banner_sub_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Banner Btn</label>
                            <input type="text" name="banner_btn" class="form-control" placeholder="Banner Btn">
                            @error('banner_btn')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Banner Btn2</label>
                            <input type="text" name="banner_btn2" class="form-control" class="form-control" placeholder="Banner Btn2">
                            @error('banner_btn2')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                           <div class="form-group">
                            <label>Banner Image</label>
                            <input type="file" name="banner_image"  class="form-control dropify">
                            @error('banner_image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Add Banner</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection