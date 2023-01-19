<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BMKG - Stasiun Meteorologi Maritim Kendari</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('img/logo-bmkg.png')}}" rel="icon">
  <link href="{{url('frontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  {{-- cdn --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet.min.css" integrity="sha512-KJRB1wUfcipHY35z9dEE+Jqd+pGCuQ2JMZmQPAjwPjXuzz9oL1pZm2cd79vyUgHQxvb9sFQ6f05DIz0IqcG1Jw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-pulse-icon@0.1.0/src/L.Icon.Pulse.css" />


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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

  {{-- <div id="preloader"></div> --}}

  {{-- cdn --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet.min.js" integrity="sha512-Io0KK/1GsMMQ8Vpa7kIJjgvOcDSwIqYuigJEYxrrObhsV4j+VTOQvxImACNJT5r9O4n+u9/58h7WjSnT5eC4hA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/leaflet-pulse-icon@0.1.0/src/L.Icon.Pulse.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="{{url('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('frontend/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{url('frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{url('frontend/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{url('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{url('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>

  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Template Main JS File -->
  <script src="{{url('frontend/assets/js/main.js')}}"></script>
  <script src="{{url('frontend/assets/js/headjam.js')}}"></script>

  <script src="https://stamarkendari.info/public/js/wp_json.js"></script>
  
  @yield('custom-script')

</body>

</html>