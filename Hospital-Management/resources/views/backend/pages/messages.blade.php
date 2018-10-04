@extends('backend.layouts.master')
@section('content')


<div class="container-fluid" style="margin: 20px;margin-top: 50px;">
	
	<div class="row">
		<center><h3>Sender Name : {{$messages->name}}</h3></center>
	</div>
	<div class="row">
		<center><h3>Sender E-mail : {{$messages->email}}</h3></center>
	</div>
	<div class="row">
		<center><h3>Sender Phone : {{$messages->phone}}</h3></center>
	</div>
	<div class="row">
		<center><h3>Sender message : <hr> {{$messages->message}}</h3></center>
	</div>

</div>
<div>
	<h3>Reply :</h3>
<form action="{{ route('replyMessage') }}" method="post">
	@csrf
	<input type="hidden" name="email" value="{{ $messages->email }}">
	<div class="form-horizontal">
	<textarea column="10" class="form-control" rows="10" name="message"></textarea> <br>
	<input type="submit" class="btn btn-success" value="send reply">
	</div>
</form>
</div>

@endsection
