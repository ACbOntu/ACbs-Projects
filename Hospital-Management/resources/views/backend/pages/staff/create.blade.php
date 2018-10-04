@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Satffs</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.staff.index') }}">Staff</a></li>
          <li class="breadcrumb-item active">Add Staff</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  @include('backend.partials.message')

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> <span class="ml-2">Details Of Staff</span>
      </div>

      <div class="card-body">
        <form class="" action="{{ route('admin.staff.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Name of the staff" required>
            </div>
            <div class="col-md-6 form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Email of the staff">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone number of the staff" required>
            </div>
            <div class="col-md-6 form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="Address of the staff" required>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="department_id">Department</label>
              <select class="form-control" name="department_id" id="department_id" required>
                <option value="">Select Department</option>
                @foreach ($departments as $department)
                  <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label for="branch_id">Branch</label>
              <select class="form-control" name="branch_id" id="branch_id" required>
                <option value="">Select Branch</option>
                @foreach ($branches as $branch)
                  <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="col-md-6 form-group">
              <label for="status">Existing Staff</label>
              <input type="checkbox" class="form-control" name="status" id="status" value="1" checked>
            </div>
          </div>

          <button type="submit" class="btn btn-success" name="button">Save Staff</button>
        </form>
      </div><!-- end card-->
    </div>
  </div>

  @endsection
