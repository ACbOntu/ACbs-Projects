<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #000 ;">
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
          Patient Info
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('branch') }}">Branch</a>
          <a class="dropdown-item" href=""></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
     
      <li class="nav-item">
        <a class="nav-link disabled" href="{{ route('department') }}">Department</a>
      </li>
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
          <a class="dropdown-item" href="">Home</a>
          <a class="dropdown-item" href="{{ route('branch') }}">Branch</a>
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
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>