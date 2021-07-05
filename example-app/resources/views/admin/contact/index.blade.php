@extends('layouts.dashboard')

@section('title')
Contact
@endsection

@section('Contactform')
active
@endsection


@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add Contact</li>
    </ol>
  </nav>
@endsection


@section('admin-content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
           <div class="card">
               <div class="card-body">Add Contact</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            
                            <th class="wd-25p">Name</th>
                            <th class="wd-25p">Subject</th>
                            <th class="wd-25p">Email</th>
                            <th class="wd-25p">Message</th>
                         
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($contacts as $item)
                          <tr>
                            
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->subject }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ Str::limit($item->message, 20) }}</td>
                            
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('contactform.show',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-eye"></i></a>
                              
                              
                                  <form action="{{ route('contactform.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                  <button class="btn btn-sm btn-danger" style="cursor: pointer;"  title="delete data"><i class="fa fa-trash"></i></button>
                                </form>
                           
                              
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
    </div>
</div>



@endsection