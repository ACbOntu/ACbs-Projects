@extends('frontend.layouts.master')
@section('title')
Query
@endsection

@section('content')
<hr>
<center><h2 style="color: #000000;"> Submit your query
</h2></center>
<hr>






<div class="col-md-6 offset-md-3">
		@include('frontend.partials.message')
		<form role="form" action="{{route('patient.query.submit')}}" method="post">
			    				@csrf

			    			
                 
			    			<div class="">
			    				<div class="form-group">
			    				<label for="name" style="color: #000000;">Your Name </label>
			    				<input type="text" name="name" id="name" class="form-control input-md" placeholder="Full Name" @if(Auth::guard('patient')->check()) value="{{ Auth::guard('patient')->user()->name }}" @endif>
			    				</div>
			    			</div>

			    			<div class="form-group">
			    				<label for="email" style="color: #000000;">Your Email </label>
			    				<input type="email" name="email" id="email" class="form-control input-md" placeholder="Email" @if(Auth::guard('patient')->check()) value="{{ Auth::guard('patient')->user()->email }}" @endif>
			    		</div>
			    			

			    			<div class="form-group">
								<label for="phone" style="color: #000000;">Your Mobile </label>
			    				<input type="text" name="phone" maxlength="11" id="phone" class="form-control input-md" placeholder="phone" @if(Auth::guard('patient')->check()) value="{{ Auth::guard('patient')->user()->phone }}" @endif>
			    			</div>


			    			<div class="form-group">
								<label for="message" style="color: #000000;">Your query </label>
			    				<textarea type="text" name="message" rows="10" id="message" class="form-control input-md" placeholder="Your query"></textarea>
			    			</div>

			    			<input type="submit" value="Submit" class="btn btn-info btn-block">

			    			<hr><hr>

			    			









	</form>
	</center>

</div>
@endsection