@extends('layouts.dashboard')

@section('title')
About
@endsection

@section('About')
active
@endsection


@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add About</li>
    </ol>
  </nav>
@endsection


@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">Add About</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-25p">About Title</th>
                            <th class="wd-25p">About Sub Title</th>
                            <th class="wd-25p">About Description</th>
                            <th class="wd-25p">About Image</th>
                            <th class="wd-25p">status</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($abouts as $item)
                          <tr>
                            
                            <td>{{ $item->about_title }}</td>
                            <td>{{ $item->about_sub_title }}</td>
                            <td>{{ Str::limit($item->about_description, 15) }}</td>
                            <td>{{ $item->About_image }}</td>
                            <td>
                              @if ($item->status == 1)
                               <span class="badge badge-pill badge-success">Active</span>
                               @else
                                 <span class="badge badge-pill badge-danger">Deactive</span>
                              @endif
                          </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('about.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form action="{{ route('about.destroy',$item->id) }}" method="POST">
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
                    ADD About
                </div> 
                <div class="card-body">
                    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label>About Title</label>
                          <input type="text" name="about_title" class="form-control" placeholder="About Title">
                          @error('about_title')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label>About Sub Title</label>
                            <input type="text" name="about_sub_title" class="form-control" placeholder="About Sub Title">
                            @error('about_sub_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                          <div class="form-group">
                            <label>About Description</label>
                            <textarea name="about_description" class="form-control" placeholder="About Description"></textarea>
                            @error('about_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                          <div class="form-group">
                            <label>About Description</label>
                            <textarea name="about_des_1" class="form-control" placeholder="About Description1"></textarea>
                            @error('about_des_1')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                           <div class="form-group">
                            <label>About Description2</label>
                            <textarea name="about_des_2" class="form-control" placeholder="About Description2"></textarea>
                            @error('about_des_2')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> <div class="form-group">
                            <label>About Description3</label>
                            <textarea name="about_des_3" class="form-control" placeholder="About Description3"></textarea>
                            @error('about_des_3')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                          <div class="form-group">
                            <label>About Description4</label>
                            <textarea name="about_des_4" class="form-control" placeholder="About Description4"></textarea>
                            @error('about_des_4')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                           <div class="form-group">
                            <label>About Description5</label>
                            <textarea name="about_des_5" class="form-control" placeholder="About Description5"></textarea>
                            @error('about_des_5')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                          <div class="form-group">
                            <label>About Description6</label>
                            <textarea name="about_des_6" class="form-control" placeholder="About Description6"></textarea>
                            @error('about_des_6')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>About Btn</label>
                            <input type="file" name="about_image" class="form-control dropify" placeholder="About Image">
                            @error('about_image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Add About</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection