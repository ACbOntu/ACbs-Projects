@extends('frontend.layouts.master')

@section('title')
Register
@endsection

@section('content')




<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
       
			 			
	<div class="col-md-6 offset-md-3">
		@include('frontend.partials.message')
		<form role="form" action="{{route('patient.register.submit')}}" method="post" enctype="multipart/form-data">
			    				@csrf

			    				<center><h2>Patient Registration Form</h2></center>

			    			<div class="">
			    				<div class="form-group">
			    				<label for="name" style="color: #000000;">Full Name </label>
			    				<input type="text" name="name" id="name" class="form-control input-md" placeholder="Full Name">
			    				</div>
			    			</div>

			    			<div class="form-group">
			    				<label for="email" style="color: #000000;">Email </label>
			    				<input type="email" name="email" id="email" class="form-control input-md" placeholder="Email">
			    		</div>
			    			

			    			<div class="form-group">
								<label for="email" style="color: #000000;">Mobile </label>
			    				<input type="text" name="phone" maxlength="11" id="mobile" class="form-control input-md" placeholder="Mobile">
			    			</div>


			    			<div class="form-group">
								<label for="email" style="color: #000000;">Occupation </label>
			    				<input type="text" name="occupation" maxlength="11" id="occupation" class="form-control input-md" placeholder="Mobile">
			    			</div>


			    			<div class="form-group">
								<label for="email" style="color: #000000;">Address </label>
			    				<input type="text" name="address"  id="address" class="form-control input-md" placeholder="Mobile">
			    			</div>


			    			 <div class="form-group">
               				<label for="sel1" style="color: #000000;">Blood Group:</label>
 								 <select class="form-control" id="sel1" name="blood_group">
    								<option value="A+">A+</option>
    								<option value="A-">A-</option>
    								<option value="B+">B+</option>
    								<option value="B-">B-</option>
    								<option value="AB+">AB+</option>
    								<option value="AB-">AB-</option>
    								<option value="O+">O+</option>
    								<option value="O-">O-</option>
  												</select>
														</div> 


							<div class="form-group">
								<label for="birthdate" style="color: #000000;">Date of Birth:</label>
			    				<input type="date" name="birthdate" id="birthdate" class="form-control input-md" placeholder="Birthdate">
			    			</div>


			    				<div class="form-group">
								<label for="image" style="color: #000000;">Image </label>
			    				<input type="file" name="image" id="image" class="form-control input-md" placeholder="Mobile">
			    			</div>


			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label for="password" style="color: #000000;">Password</label>
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label for="confirm_password"></label>
			    						<input type="password" name="confirm_password" id="confirm_password" class="form-control input-sm" placeholder="Confirm Password">
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<input type="submit" value="Register" class="btn btn-info btn-block">
			    		
			    		</form>
	</div>
			    	
	    		
    </div>






@endsection