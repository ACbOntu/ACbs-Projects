@extends('frontend.layouts.master')

@section('title')
Department
@endsection
@section('content')


<div class=" table-bordered" style="margin: 100px;">


	<div class="col-md-8 offset-md-2">
        <h2 style="color: #FF0000"><u>Branch Information</u></h2>
       
          <div class="card">
            <div class="card-body">
             <h3>Branch Name : {{$branch->name}}</h3>
				<h3>Branch Place : {{$branch->place}}, {{$branch->name}}</h3>
				<h3>
          Available Departments = 
        </h3> @foreach($depts as $dept)
          <a class="btn btn-success" data-toggle="collapse" href="#{{$dept->department_name}}" role="button" aria-expanded="false" aria-controls="collapseExample">
    {{$dept->department_name}}
  </a>

<div class="collapse" id="{{$dept->department_name}}">
  <div class="card card-body">
  @foreach( App\Models\Doctor::where('branch_id',$branch->id)->where('department_id',$dept->id)->get() as $doctor)

  <a href="{{ route('singleDoctor', $doctor->username) }}" class="btn btn-primary">{{ $doctor->first_name.' '.$doctor->last_name }}</a> <hr>
  @endforeach
  </div>
</div>

 @endforeach
<hr>
            </div>
          </div><br>
        
      </div>


	
</div>


@endsection