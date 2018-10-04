@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">About</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">About</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
      @include('backend.partials.message')
      <div class="card-header">
        <i class="fa fa-table"></i> <span class="ml-2">About Hospital</span>
        <button class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#addModal">Add Info</button>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="admin-data-table" class="table table-bordered table-hover display">
            <thead>
              <tr>
                <th>Branch</th>
                <th>Helpline</th>
                <th>Emergency</th>
                <th>Ambulance</th>
                <th>Email</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              @if(count($abouts) > 0)
                @foreach($abouts as $about)
                  <tr>
                    <td>{{ $about->branch->name }}</td>
                    <td>{{ $about->helpline }}</td>
                    <td>{{ $about->emergency }}</td>
                    <td>{{ $about->ambulance_no }}</td>
                    <td>{{ $about->email }}</td>
                    <td>
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $about->id }}" title="Edit About"><i class="fa fa-fw fa-edit"></i>Edit</button>
                      <!-- Add Modal -->
                      <div class="modal fade bd-example-modal-lg" id="editModal{{ $about->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">About Information</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('admin.about.update', $about->id) }}" method="post">
                                @csrf
                                <div class="form-row">
                                  <div class="col-md-6 form-group">
                                    <label for="branch_id">Branch</label>
                                    <select class="form-control" name="branch_id" id="branch_id">
                                      @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}" {{ ($branch->id == $about->branch_id) ? 'selected' : '' }}>{{ $branch->name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-md-6 form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $about->email }}" required>
                                  </div>
                                </div>

                                <div class="form-row">
                                  <div class="col-md-4 form-group">
                                    <label for="helpline">Helpline</label>
                                    <input type="text" name="helpline" id="helpline" class="form-control" value="{{ $about->helpline }}" required>
                                  </div>
                                  <div class="col-md-4 form-group">
                                    <label for="emergency">Emergency</label>
                                    <input type="text" name="emergency" id="emergency" class="form-control" placeholder="Emergency phone number" value="{{ $about->emergency }}" required>
                                  </div>
                                  <div class="col-md-4 form-group">
                                    <label for="ambulance_no">Ambulance</label>
                                    <input type="text" name="ambulance_no" id="ambulance_no" class="form-control" placeholder="Ambulance phone number" value="{{ $about->ambulance_no }}" required>
                                  </div>
                                </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Edit Information</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $about->id }}" title="Delete About"><i class="fa fa-fw fa-trash"></i>Delete</button>
                      <!-- Delete Modal-->
                      <div class="modal fade" id="deleteModal{{ $about->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this information ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Please confirm if you want to delete</div>
                            <div class="modal-footer">
                              <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                              <form class="" action="{{ route('admin.about.delete', $about->id) }}" method="post">
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
          <h5 class="modal-title">About Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.about.store') }}" method="post">
            @csrf
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="branch_id">Branch</label>
                <select class="form-control" name="branch_id" id="branch_id">
                  <option value="">Select Branch</option>
                  @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email of the hospital" required>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-4 form-group">
                <label for="helpline">Helpline</label>
                <input type="text" name="helpline" id="helpline" class="form-control" placeholder="Helpline phone number" required>
              </div>
              <div class="col-md-4 form-group">
                <label for="emergency">Emergency</label>
                <input type="text" name="emergency" id="emergency" class="form-control" placeholder="Emergency phone number" required>
              </div>
              <div class="col-md-4 form-group">
                <label for="ambulance_no">Ambulance</label>
                <input type="text" name="ambulance_no" id="ambulance_no" class="form-control" placeholder="Ambulance phone number" required>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Information</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endsection
