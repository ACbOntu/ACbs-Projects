@extends('frontend.layouts.master')

@section('title')
Department
@endsection
@section('content')


<div class=" table-bordered" style="margin: 100px;">


	<div class="col-md-8 offset-md-2">
        <h2 style="color: #FF0000"><u>Department Information</u></h2>
       @foreach($departments as $department)
          <div class="card">
            <div class="card-body">
             <h3>Department Name : {{$department->department_name}}</h3>
				<h3>Branch Place : {{$department->branch->place}}, {{$department->branch->name}}</h3>
				<h3>Department Location : {{$department->location}}</h3>
        <h3>Available Docotors :
       @foreach(App\Models\Doctor::where('department_id',$department->id)->get() as $doctor)
         <div class="badge badge-success" onclick="location.href='{!! route('singleDoctor', $doctor->username) !!}'"> {{$doctor->first_name}} {{$doctor->last_name}}</div>
      @endforeach
				<hr>
            </div>
          </div><br>
        @endforeach
      </div>
	
</div>


@endsection