<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: #66ff99 ;">
  <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('public/images/logo.jpg') }}" style="width: 100px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          For Patient 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('branch',1) }}">BMI</a>
          <a class="dropdown-item" href=""></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>





      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Branches
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @foreach(App\Models\Branch::all() as $branch)
          <a class="dropdown-item" href="{{ route('branch',$branch->id) }}">{{$branch->name}}</a>
          @endforeach
          
         
        </div>
      </li>




       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Departments
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @foreach(App\Models\Department::distinct()->get(['department_name']) as $dept)
          <a class="dropdown-item" href="{{ route('department',$dept->department_name) }}">{{$dept->department_name}}</a>
          @endforeach
          <a class="dropdown-item" href=""></a>
         
        </div>
      </li>

 
     {{--  <li class="nav-item">
        <a class="nav-link disabled" href="{{ route('department') }}">Department</a>
      </li> --}}
       <li class="nav-item">
        <a class="nav-link disabled" href="{{route('findConsultantForm')}}">Find a Consultant</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="{{route('circular')}}">Circular</a>
      </li>
       @if(Auth::guard('patient')->check())
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{Auth::guard('patient')->user()->username}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="">View my profile</a>
          <a class="dropdown-item" href="#">My appointments</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('patient.logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Log out</a>
                     <form id="logout-form" action="{{ route('patient.logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
        </div>
      </li>

      @else
       <li class="nav-item">
        <a class="nav-link disabled" href="{{ route('patient.login') }}">Log in</a>
      </li>

       <li class="nav-item">
        <a class="nav-link disabled" href="{{ route('patient.registration') }}">Registration</a>
      </li>
       @endif
    </ul>
   
  </div>
</nav>