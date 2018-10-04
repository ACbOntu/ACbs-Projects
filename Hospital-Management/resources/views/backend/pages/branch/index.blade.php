@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Branches</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Branch</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  @include('backend.partials.message')
  
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> <span class="ml-2">Branches Of Hospital</span>
        <button class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#addModal">Add Branch</button>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="admin-data-table" class="table table-bordered table-hover display">
            <thead>
              <tr>
                <th>Name</th>
                <th>City</th>
                <th>Place</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              @if(count($branches) > 0)
                @foreach($branches as $branch)
                  <tr>
                    <td>{{ $branch->name }}</td>
                    <td>{{ $branch->city }}</td>
                    <td>{{ $branch->place }}</td>
                    <td>
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $branch->id }}" title="Edit Branch"><i class="fa fa-fw fa-edit"></i>Edit</button>
                      <!-- Add Modal -->
                      <div class="modal fade bd-example-modal-lg" id="editModal{{ $branch->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Branch</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('admin.branch.update', $branch->id) }}" method="post">
                                @csrf
                                <div class="form-row">
                                  <div class="col-md-12 form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $branch->name }}" required>
                                  </div>
                                </div>

                                <div class="form-row">
                                  <div class="col-md-6 form-group">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" class="form-control" value="{{ $branch->city }}" required>
                                  </div>
                                  <div class="col-md-6 form-group">
                                    <label for="place">Place</label>
                                    <input type="text" name="place" id="place" class="form-control" value="{{ $branch->place }}" required>
                                  </div>
                                </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Edit Branch</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $branch->id }}" title="Delete Branch"><i class="fa fa-fw fa-trash"></i>Delete</button>
                      <!-- Delete Modal-->
                      <div class="modal fade" id="deleteModal{{ $branch->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this Branch ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Please confirm if you want to delete</div>
                            <div class="modal-footer">
                              <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                              <form class="" action="{{ route('admin.branch.delete', $branch->id) }}" method="post">
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

  <!-- Add Modal -->
  <div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Branch</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.branch.store') }}" method="post">
            @csrf
            <div class="form-row">
              <div class="col-md-12 form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Branch Name" required>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="City of the Branch" required>
              </div>
              <div class="col-md-6 form-group">
                <label for="place">Place</label>
                <input type="text" name="place" id="place" class="form-control" placeholder="Place of the Branch" required>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Branch</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endsection
