@extends('frontend.layouts.master')
@section('title')
Circulars
@endsection
@section('content')

<center><h2 style="color: #000000;">All Latest Circular 
</h2></center>
@foreach($circulars as $circular)
<div class="container-fluid" style="margin: 20px;">
<h3 style="color: 000000;">{{$circular->title}}</h3>
<h6>{{ $circular->created_at->toFormattedDateString() }}</h6>
<hr>
	<center><img src="{{asset('public/images/newsCirculars/'.$circular->file)}}" style="height: 500px; width: 500px;"></center>
	<hr>
	<p style="margin-left: 20px; margin-right: 20px;">{{$circular->description}}</p>
	<hr>
</div>
@endforeach
@endsection