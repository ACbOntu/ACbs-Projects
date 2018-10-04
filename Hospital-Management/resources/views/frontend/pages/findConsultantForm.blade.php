@extends('frontend.layouts.master')
@section('title')
Find Consultant
@endsection
@section('content')
  <div class="container-fluid mt-4 mb-4">
    <div class="col-md-6 offset-md-3">
      <form action="{{ route('consultantList') }}" method="post">
        @csrf

        <div class="form-group">
          <label for="branch_id">Branch</label>
          <select class="form-control" name="branch_id" id="branch_id">
            <option value="">Select Branch</option>
            @foreach($branches as $branch)
              <option value="{{ $branch->id }}">{{ $branch->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="department_id">Department</label>
          <select class="form-control" name="department_id" id="department_id">
            <option value="">Select Department</option>
            @foreach($departments as $department)
              <option value="{{ $department->id }}">{{ $department->department_name }}</option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </div>

@endsection
