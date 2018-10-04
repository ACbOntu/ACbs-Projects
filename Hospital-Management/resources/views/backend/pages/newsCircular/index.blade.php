@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Notices</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Notice</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  @include('backend.partials.message')

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> <span class="ml-2">Notices Of Hospital</span>
        <a class="btn btn-success btn-sm float-right" href="{{ route('admin.news.create') }}">Add Notice</a>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="admin-data-table" class="table table-bordered table-hover display">
            <thead>
              <tr>
                <th>title</th>
                <th>Notice Type</th>
                <th>Status</th>
                <th>Branch</th>
                <th>File</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              @if(count($notices) > 0)
                @foreach($notices as $news)
                  <tr>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->type == 1 ? 'Circular' : 'Notice / News' }}</td>
                    <td>{{ $news->status== 1 ? 'Published' : 'Not Published' }}</td>
                    <td>{{ $news->branch->name }}</td>
                    <td>
                      <a href="{{ asset('public/images/newsCirculars/'.$news->file) }}" target="_blank"><img src="{{ asset('public/images/newsCirculars/default.jpeg') }}" style="width: 50px; height: 50px;" alt=""></a>
                    </td>
                    <td>
                      @if($news->status == 1)
                        <a href="{{ route('admin.news.hide', $news->id) }}" class="btn btn-warning btn-sm" title="Hide This Notice">Hide</a>
                      @else
                        <a href="{{ route('admin.news.publish', $news->id) }}" class="btn btn-success btn-sm" title="Publish This Notice">Publish</a>
                      @endif
                      <a class="btn btn-primary btn-sm" href="{{ route('admin.news.edit', $news->id) }}" title="Edit Branch"><i class="fa fa-fw fa-edit"></i>Edit</a>

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $news->id }}" title="Delete Branch"><i class="fa fa-fw fa-trash"></i>Delete</button>
                      <!-- Delete Modal-->
                      <div class="modal fade" id="deleteModal{{ $news->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this news/circular ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Please confirm if you want to delete</div>
                            <div class="modal-footer">
                              <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                              <form class="" action="{{ route('admin.news.delete', $news->id) }}" method="post">
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
