@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Notices</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">Notice</a></li>
          <li class="breadcrumb-item active">Edit Notice</li>
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
        <form class="" action="{{ route('admin.news.update', $notice->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title" value="{{ $notice->title }}" required>
            </div>
            <div class="col-md-6 form-group">
              <label for="type">Title</label>
              <select class="form-control" name="type" id="type" required>
                <option value="0" {{ $notice->type == 0 ? 'selected' : '' }}>News / Notice</option>
                <option value="1" {{ $notice->type == 1 ? 'selected' : '' }}>Circular</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-5 form-group">
              <label for="branch_id">Branch</label>
              <select class="form-control" name="branch_id" id="branch_id">
                @foreach ($branches as $branch)
                  <option value="{{ $branch->id }}" {{ ($branch->id == $notice->branch_id) ? 'selected' : '' }}>{{ $branch->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4 form-group">
              <label for="file">File @if($notice->file) <a href="{{ asset('public/images/newsCirculars/'.$notice->file) }}" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-download"></i>File Exist</a> @endif</label>
              <input type="file" class="form-control" name="file" id="file">
            </div>
            <div class="col-md-3 form-group">
              Published
              <input type="checkbox" class="form-control" name="status" id="status" value="1" {{ ($notice->status == 1) ? 'checked' : '' }}>
            </div>
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" rows="8" cols="70">
              {{ $notice->description }}
            </textarea>
          </div>

          <button type="submit" class="btn btn-success" name="button">Save Notice</button>
        </form>
      </div><!-- end card-->
    </div>
  </div>

  @endsection
