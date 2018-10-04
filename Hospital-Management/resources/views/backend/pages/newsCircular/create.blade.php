@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Notices</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">Notice</a></li>
          <li class="breadcrumb-item active">Add Notice</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  @include('backend.partials.message')

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> <span class="ml-2">Details Of Notice</span>
      </div>

      <div class="card-body">
        <form class="" action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="Notice Title" required>
            </div>
            <div class="col-md-6 form-group">
              <label for="type">Title</label>
              <select class="form-control" name="type" id="type" required>
                <option value="">Select Type</option>
                <option value="0">News / Notice</option>
                <option value="1">Circular</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-5 form-group">
              <label for="branch_id">Branch</label>
              <select class="form-control" name="branch_id" id="branch_id">
                <option value="">Select Branch</option>
                @foreach ($branches as $branch)
                  <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4 form-group">
              <label for="file">File</label>
              <input type="file" class="form-control" name="file" id="file">
            </div>
            <div class="col-md-3 form-group">
              Published
              <input type="checkbox" class="form-control" name="status" id="status" value="1" checked>
            </div>
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" rows="8" cols="70"></textarea>
          </div>

          <button type="submit" class="btn btn-success" name="button">Save Notice</button>
        </form>
      </div><!-- end card-->
    </div>
  </div>

  @endsection
