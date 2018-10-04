@extends('frontend.layouts.master')

@section('content')


<div class="row">
	@foreach($doctors as $doctor)
	<div class="col-md-4 mb-4">
		<div class="card">
			<div class="card-header">
				<div class="card-body" onclick="location.href='{!! route('singleDoctor', $doctor->username) !!}'">
					<h2>{{ $doctor->first_name.' '.$doctor->last_name }}</h2>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>


@endsection