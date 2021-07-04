@extends('layouts.dashboard')

@section('title')
Timeline
@endsection

@section('Timeline')
active
@endsection


@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add Timeline</li>
    </ol>
  </nav>
@endsection


@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">Add timeline</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-25p">timeline Icom</th>
                            <th class="wd-25p">timeline Title</th>
                            <th class="wd-25p">timeline Description</th>
                            <th class="wd-25p">status</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($timelines as $item)
                          <tr>
                            
                            <td>{{ $item->time_date }}</td>
                            <td>{{ $item->time_title }}</td>
                            <td>{{ Str::limit($item->time_description, 15) }}</td>
                            <td>
                              @if ($item->status == 1)
                               <span class="badge badge-pill badge-success">Active</span>
                               @else
                                 <span class="badge badge-pill badge-danger">Deactive</span>
                              @endif
                          </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('timeline.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form action="{{ route('timeline.destroy',$item->id) }}" method="POST">
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
                    ADD Timeline
                </div> 
                <div class="card-body">
                    <form action="{{ route('timeline.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Timeline Title</label>
                          <input type="text" name="time_date" class="form-control" placeholder="timeline Icon">
                          @error('time_date')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>  
                        <div class="form-group">
                          <label>Timeline Title</label>
                          <input type="text" name="time_title" class="form-control" placeholder="timeline Title">
                          @error('time_title')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                          <div class="form-group">
                            <label>Timeline Description</label>
                            <textarea name="time_description" class="form-control" placeholder="timeline Description"></textarea>
                            @error('time_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 

                      
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Add Timeline</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection