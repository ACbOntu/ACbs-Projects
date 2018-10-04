@extends('frontend.layouts.master')
@section('title')
Doctor List
@endsection
@section('title')
Doctor List
@endsection
@section('content')
  <div class="container-fluid mt-4 mb-4">
    <div class="col-md-6 offset-md-3">
      @foreach ($doctors as $doctor)
        <a href="{{ route('singleDoctor', $doctor->username) }}" class="btn btn-primary">{{ $doctor->first_name.' '.$doctor->last_name }}</a>
      @endforeach
    </div>
  </div>

@endsection
