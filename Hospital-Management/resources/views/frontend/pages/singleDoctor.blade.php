@extends('frontend.layouts.master')

@section('content')
  <div class="container-fluid mt-4 mb-4">
    <div class="col-md-8 offset-md-2">
      <h3>{{ $doctor->first_name.' '.$doctor->last_name }}</h3> <br>
      <p style="color: #000000;">{{ $doctor->qualification }}</p>
      <p style="color: #000000;">{{ $doctor->email }}</p>
      <p style="color: #000000;">{{ $doctor->phone }}</p>
      <p style="color: #000000;">{{ $doctor->chamber }}</p>
      <p style="color: #000000;">{{ $doctor->time_schedule }}</p>

      <a href="{{ route('takeAppointment', $doctor->username) }}" class="btn btn-success">Take Appoinment</a>
    </div>
  </div>

@endsection
