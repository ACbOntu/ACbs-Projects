@extends('frontend.layouts.master')
@section('title')
Appointment
@endsection
@section('content')
  <div class="container-fluid mt-4 mb-4">
    <div class="col-md-8 offset-md-2">
      <h3>{{ $doctor->first_name.' '.$doctor->last_name }}</h3> <br>
      <form class="" action="{{ route('submitAppoinment') }}" method="post">
        @include('frontend.partials.message')
        @csrf
        <input type="hidden" name="id" value="{{ $doctor->id }}">
        <input type="hidden" name="branch_id" value="{{ $doctor->branch_id }}">
        <div class="form-group">
          <label for="">Appintment Date</label>
          <input type="date" class="form-control" name="appointment_date" placeholder="Appointment date" required>
        </div>
        <div class="form-group">
          <label for="">Symptom</label>
          <textarea name="symptom" class="form-control" rows="8" cols="80" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </div>

@endsection
