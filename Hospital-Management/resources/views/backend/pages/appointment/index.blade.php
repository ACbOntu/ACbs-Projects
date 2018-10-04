@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Appointment</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Appointment</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
      @include('backend.partials.message')
      <div class="card-header">
        <i class="fa fa-table"></i> <span class="ml-2">Appointments Of Hospital</span>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="admin-data-table" class="table table-bordered table-hover display">
            <thead>
              <tr>
                <th>Patient Name</th>
                <th>Doctor Name</th>
                <th>Appointment Date</th>
                <th>Status</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              @if(count($appointments) > 0)
                @foreach($appointments as $appointment)
                  <tr>
                    <td>{{ $appointment->patient->name }}</td>
                    <td>{{ $appointment->doctor->first_name.' '.$appointment->doctor->last_name }}</td>
                    <td>{{ Carbon\Carbon::parse($appointment->appoint_date)->format('M d Y') }}</td>
                    <td>{{ ($appointment->status == 0) ? 'Not visited' : 'Visited' }}</td>
                    <td>
                      @if($appointment->status == 0)
                        <a href="{{ route('admin.appointment.completeService', $appointment->id) }}" class="btn btn-success btn-success btn-sm">Complete</a>
                      @else
                        <a href="{{ route('admin.appointment.uncompleteService', $appointment->id) }}" class="btn btn-warning btn-warning btn-sm">Uncomplete</a>
                      @endif
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $appointment->id }}" title="Delete Branch"><i class="fa fa-fw fa-trash"></i>Delete</button>
                      <!-- Delete Modal-->
                      <div class="modal fade" id="deleteModal{{ $appointment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this appointment ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Please confirm if you want to delete</div>
                            <div class="modal-footer">
                              <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                              <form class="" action="{{ route('admin.appointment.delete', $appointment->id) }}" method="post">
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
