<!-- top bar navigation -->
<div class="headerbar">

  <!-- LOGO -->
  <div class="headerbar-left">
    <a href=""><h2>Hospital</h2></a>
  </div>

  <nav class="navbar-custom">

    <ul class="list-inline float-right mb-0">

      <li class="list-inline-item dropdown notif">
        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
          <i class="fa fa-fw fa-envelope-o"></i><span class="notif-bullet"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
          <!-- item-->
          <div class="dropdown-item noti-title">
            <h5><small><span class="label label-danger pull-xs-right">{{ \App\Models\Contact::count() }}</span>Contact Messages</small></h5>
          </div>

          <!-- item-->
          @foreach (\App\Models\Contact::contacts() as $contact)
            <a href="{{route('admin.messages',$contact->id)}}" class="dropdown-item notify-item">
              <p class="notify-details ml-0">
                <b>{{ $contact->name }}</b>
                <small class="text-muted">{{ $contact->created_at->toFormattedDateString() }}</small>
              </p>
            </a>
          @endforeach

          <!-- All-->
          <a href="{{ route('admin.contact.index') }}" class="dropdown-item notify-item notify-all">
            View All
          </a>

        </div>
      </li>

      <li class="list-inline-item dropdown notif">
        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
          {{ Auth::guard('admin')->user()->name }} <i class="fa fa-arrow-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

          <!-- item-->
          <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            <i class="fa fa-power-off"></i> <span>Logout</span>
          </a>
          <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>

    </ul>

    <ul class="list-inline menu-left mb-0">
      <li class="float-left">
        <button class="button-menu-mobile open-left">
          <i class="fa fa-fw fa-bars"></i>
        </button>
      </li>
    </ul>

  </nav>

</div>
<!-- End Navigation -->
