 <!-- ======= Header ======= -->
 {{-- <section id="topbar" class="topbar mt-0 mb-0 bg-dark d-flex align-items-center">
  <div class="container bg-dark d-flex justify-content-center justify-content-md-between">
    <div class="clock d-flex flex-row-reverse">
     <div class=""></div>
   <div id="DisplayJam" class="clock spacekanan d-none d-lg-block" onload="showTime()"></div>
   <div class="" style="margin-right: 12px;"><a class="clock-a d-none d-lg-block" href="https://jam.bmkg.go.id" target="_blank">STANDAR WAKTU INDONESIA  </a></div>
   </div>  
    </div>
 </section>
  --}}
 <section id="topbar" class="topbar bg-dark d-flex align-items-center">
  
  <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto: info@bmkg.go.id">info@bmkg.go.id</a> | <a href="mailto: stamar.kendari@bmkg.go.id">stamar.kendari@bmkg.go.id</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span><a href="https://wa.me/628114005929?text=Halo,%20saya%20ingin%20menanyakan%20tentang%20info%20cuaca" target="_blank">+62 811-4005-929</a></span></i>
      </div>
      <div class="social-links d-none d-md-flex">
        {{-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a> --}}
        <a href="https://www.facebook.com/bmkgmaritimkendari" class="facebook" target="_blank"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/bmkgmaritimkendari" class="instagram" target="_blank"><i class="bi bi-instagram"></i></a>
        {{-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a> --}}
      </div>
      <div class="clock d-flex flex-row-reverse bg-dark">
        {{-- <div class=""></div> --}}
      <div id="DisplayJam" class="clock d-none d-lg-block bg-dark" onload="showTime()"></div>
      <div class="bg-dark" style="margin-right: 12px;"><a class="clock-a d-none d-lg-block" href="https://jam.bmkg.go.id" target="_blank">STANDAR WAKTU INDONESIA  </a></div>
      </div>
    </div>
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center bg-white  ">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between " >
      <div class="d-flex align-items-left">
        <a href="{{url('/')}}" class="logo align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <img class="img-fluid" src="{{url('img/logo-bmkg.png')}}" alt="Logo BMKG"> 
          <img class="img-fluid" src="{{url('img/logo-sultra.png')}}" alt="Logo BMKG">
        <div class="d-flex flex-column flex-wrap mx-2">
          <strong class="text-dark d-none d-md-block" style="font-size: 20px">BMKG SULAWESI TENGGARA<span></span></strong></a>
        <span class="d-none d-lg-block slogan">Cepat, Tepat, Akurat, Luas, dan Mudah Dipahami</span>
        {{-- <span class="d-none d-lg-block slogan">Stasiun Meteorologi Maritim Kendari</span> --}}

        </div>
          
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li ><a href="{{url('/')}}">Beranda</a></li>
          <li ><a href="{{url('/berita')}}">Berita</a></li>
          <li><a href="https://www.bmkg.go.id/gempabumi-dirasakan.html" target="_blank">Gempabumi & Tsunami</a></li>
          {{-- <li><a href="{{url('/citra')}}">Penginderaan Jauh</a></li> --}}
          <li class="dropdown"><a class="dropdown" href="{{url('/citra')}}">Pengindraan Jauh</a>
            <ul>
              <li><a href="{{url('/ibf')}}">Prakiraan Berbasis Dampak</a></li>
              {{-- <li><a href="#">tes</a></li> --}}
              {{-- <li></li> --}}
            </ul>
          </li>
          <li><a href="{{url('/display')}}">Display</a></li>
          <li><a href="{{url('/profil')}}">Profil</a></li>

        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->