<!-- Left Sidebar -->
<div class="left main-sidebar">
  <div class="sidebar-inner leftscroll">
    <div id="sidebar-menu">
      <ul>
        <li class="submenu">
          <a class="{{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}" title="Dashboard"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
        </li>

        <li class="submenu">
          <a class="{{ (Route::is('admin.appointment.uncompleted') || Route::is('admin.appointment.completed')) ? 'active' : '' }}" title="Manage Appointment"><i class="fa fa-fw fa-table"></i> <span> Appointment </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled">
            <li><a href="{{ route('admin.appointment.uncompleted') }}">Uncompleted</a></li>
            <li><a href="{{ route('admin.appointment.completed') }}">Completed</a></li>
          </ul>
        </li>

        <li class="submenu">
          <a class="{{ Route::is('admin.branch.index') ? 'active' : '' }}" href="{{ route('admin.branch.index') }}" title="Manage Branch"><i class="fa fa-fw fa-bars"></i><span> Branch </span> </a>
        </li>

        <li class="submenu">
          <a class="{{ Route::is('admin.department.index') ? 'active' : '' }}" href="{{ route('admin.department.index') }}" title="Manage Department"><i class="fa fa-fw fa-bars"></i><span> Department </span> </a>
        </li>

        <li class="submenu">
          <a class="{{ (Route::is('admin.news.index') || Route::is('admin.news.create') || Route::is('admin.news.edit')) ? 'active' : '' }}" title="Manage Notice"><i class="fa fa-fw fa-table"></i> <span> Notice </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled">
            <li><a href="{{ route('admin.news.index') }}">Manage Notice</a></li>
            <li><a href="{{ route('admin.news.create') }}">Add Notice</a></li>
          </ul>
        </li>

        <li class="submenu">
          <a class="{{ (Route::is('admin.doctor.index') || Route::is('admin.doctor.create') || Route::is('admin.doctor.edit')) ? 'active' : '' }}" title="Manage Doctor"><i class="fa fa-fw fa-table"></i> <span> Doctor </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled">
            <li><a href="{{ route('admin.doctor.index') }}">Manage Doctor</a></li>
            <li><a href="{{ route('admin.doctor.create') }}">Add Doctor</a></li>
          </ul>
        </li>

        <li class="submenu">
          <a class="{{ (Route::is('admin.staff.index') || Route::is('admin.staff.create') || Route::is('admin.staff.edit')) ? 'active' : '' }}" title="Manage Staff"><i class="fa fa-fw fa-table"></i> <span> Staff </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled">
            <li><a href="{{ route('admin.staff.index') }}">Manage Staff</a></li>
            <li><a href="{{ route('admin.staff.create') }}">Add Staff</a></li>
          </ul>
        </li>

        <li class="submenu">
          <a class="{{ Route::is('admin.about.index') ? 'active' : '' }}" href="{{ route('admin.about.index') }}" title="Manage About"><i class="fa fa-fw fa-bars"></i><span> About </span> </a>
        </li>
      </ul>

      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- End Sidebar -->
