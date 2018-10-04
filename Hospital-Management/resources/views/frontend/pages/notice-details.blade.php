@extends('frontend.layouts.master')
@section('title')
{{$notice->slug}}
@endsection

@section('content')

<div class="container-fluid">

	<h2>{{$notice->title}}</h2>
	<hr>
	<center><img src="{{asset('public/images/newsCirculars/'.$notice->file)}}" style="height: 500px; width: 1000px;"></center>
	<hr>
	<p style="margin-left: 20px; margin-right: 20px;">{{$notice->description}}</p>
	
</div>
@endsection


