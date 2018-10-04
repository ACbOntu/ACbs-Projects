@extends('frontend.layouts.master')
@section('title')
index
@endsection
@section('content')
  <div class="col-md-12 offset-md-1">
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-120" src="{{ asset('public/images/a.jpg') }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-120" src="{{ asset('public/images/b.jpg') }}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-120" src="{{ asset('public/images/c.png') }}" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

  </div>
  <br>
  <div class="container" style="margin-left: 200px;">
    <a class="btn btn-success" href="{{ route('findConsultantForm') }}">Find a consultant</a>
    
    <a class="btn btn-success" href="{{route('query')}}">Submit a Query</a>
  </div>

  <div class="container-fluid mt-4 mb-4">
    <div class="row">
      <div class="col-md-5 offset-md-1">
        <h2 style="color: #000000"><b>News </b></h2>
        @foreach ($notices as $notice)
          <div class="card">
            <div class="card-body" onclick="location.href='{!! route('singleNotice', $notice->slug) !!}'">
              <h4>{{ $notice->title }}</h4>
              <h5>{{ $notice->created_at->toFormattedDateString() }}</h5>
            </div>
          </div><br>
        @endforeach
      </div>

      <div class="col-md-5 offset-md-1">
        <h2 style="color: #000000"><b>Circular</b></h2>
        @foreach ($circulars as $circular)
          <div class="card">
            <div class="card-body" onclick="location.href='{!! route('singleCircular', $circular->slug) !!}'">
              <h3>{{ $circular->title }}</h3>
              <h5>{{ $notice->created_at->toFormattedDateString() }}</h5>
            </div>
          </div> <br>
        @endforeach
      </div>
    </div>
  </div>

@endsection
