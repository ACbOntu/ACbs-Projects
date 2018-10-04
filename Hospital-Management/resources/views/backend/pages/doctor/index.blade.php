@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Doctors</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Doctor</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  @include('backend.partials.message')
  
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> <span class="ml-2">Doctors Of Hospital</span>
        <a class="btn btn-success btn-sm float-right" href="{{ route('admin.doctor.create') }}">Add Doctor</a>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="admin-data-table" class="table table-bordered table-hover display">
            <thead>
              <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Branch</th>
                <th>Chamber</th>
                <th>Status</th>
                <th>Image</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              @if(count($doctors) > 0)
                @foreach($doctors as $doctor)
                  <tr>
                    <td>{{ $doctor->first_name.' '.$doctor->last_name }}</td>
                    <td>{{ $doctor->phone }}</td>
                    <td>{{ $doctor->department->department_name }}</td>
                    <td>{{ $doctor->branch->name }}</td>
                    <td>{{  $doctor->chamber }}</td>
                    <td>{{ $doctor->status== 1 ? 'Present' : 'Not Present' }}</td>
                    <td>
                      <a href="{{ asset('public/images/doctors/'.$doctor->image) }}" target="_blank"><img src="{{ asset('public/images/doctors/'.$doctor->image) }}" style="width: 50px; height: 50px;" alt=""></a>
                    </td>
                    <td>
                      <a class="btn btn-primary btn-sm" href="{{ route('admin.doctor.edit', $doctor->id) }}" title="Edit Staff"><i class="fa fa-fw fa-edit"></i>Edit</a>

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $doctor->id }}" title="Delete Staff"><i class="fa fa-fw fa-trash"></i>Delete</button>
                      <!-- Delete Modal-->
                      <div class="modal fade" id="deleteModal{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this doctor ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Please confirm if you want to delete</div>
                            <div class="modal-footer">
                              <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                              <form class="" action="{{ route('admin.doctor.delete', $doctor->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Confirm</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div><!-- end card-->
    </div>
  </div>

@endsection
