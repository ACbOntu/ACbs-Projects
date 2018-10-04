<!DOCTYPE html>
<html>
<head>
  <title>@yield('title')</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/css/admin/login_registration.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}">

  @yield('stylesheets')

</head>
<body style="background: #99e6ff;">

  @include('frontend.partials.nav')

  @section('content')
  @show

  @include('frontend.partials.footer')

  <script type="text/javascript" src="{{ asset('public/bootstrap/js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('public/bootstrap/js/bootstrap.min.js') }}"></script>

  @yield('scripts')

</body>
</html>
