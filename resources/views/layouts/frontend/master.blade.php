<!DOCTYPE html>

<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>MMLSAY GRIEVANCE RESDRESSAL PORTAL</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="MMLSAY GRIEVANCE RESDRESSAL PORTAL">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="nitishdola">
  <meta name="generator" content="MMLSAY GRIEVANCE RESDRESSAL">
  
  <!-- theme meta -->
  <meta name="theme-name" content="novena" />

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.png" />

  <!-- 
  Essential stylesheets
  =====================================-->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/icofont/icofont.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/slick-carousel/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/slick-carousel/slick/slick-theme.css') }}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  @yield('pageCss')


</head>

<body id="top">

<header>
@include('layouts.frontend.header')
</header>


@yield('content')

<!-- footer Start -->
<footer class="footer section gray-bg">
@include('layouts.frontend.footer')
</footer>

   

    <!-- 
    Essential Scripts
    =====================================-->
    <script src="{{ asset('frontend/plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('frontend/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/slick-carousel/slick/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/shuffle/shuffle.min.js') }}"></script>

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA"></script>
    <script src="plugins/google-map/gmap.js"></script>
    
    <script src="{{ asset('frontend/js/script.js') }}"></script>
    @yield('pageJs')
  </body>
</html>
