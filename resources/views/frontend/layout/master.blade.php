<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BMKG</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('img/logo-bmkg.png')}}" rel="icon">
  <link href="{{url('frontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{url('frontend/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{url('frontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('frontend/assets/css/main.css')}}" rel="stylesheet">
  <link href="{{url('frontend/assets/css/stamar.css')}}" rel="stylesheet">
  <link href="{{url('css/custom.css')}}" rel="stylesheet">

  


  <!-- =======================================================
  * Template Name: Impact - v1.1.1
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  @include('frontend.layout.header')
  {{-- @include('frontend.layout.hero') --}}
 

  <main id="main">

    @yield('content')

  </main><!-- End #main -->

  @include('frontend.layout.footer')

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{url('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('frontend/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{url('frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{url('frontend/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{url('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{url('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>

  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{url('frontend/assets/js/main.js')}}"></script>
  <script src="{{url('frontend/assets/js/headjam.js')}}"></script>
  
  @yield('custom-script')

</body>

</html>