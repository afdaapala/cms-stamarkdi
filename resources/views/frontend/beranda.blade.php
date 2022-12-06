@extends('frontend.layout.master')

@section('content')
    <!-- ======= Section warning ======= -->
        <section id="warning" class="warning  bg-light text-dark">
            <div class="container" data-aos="fade-right">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <div class="warning-heading font-weight-bold border-bottom border-success ">
                            <h5>{{ $data['dataWarning']->headline }}</h5>
                        </div>
                        <div class="warning-body bg-warning p-3 rounded m-2 " style="font-size:1em">
                            {{ $data['dataWarning']->description }}
                        </div>
                    </div>
                    <div class="col-md-3 card border-warning rounder">
                            <div class="card-header"><h5><i class='fa-solid fa-exclamation-triangle' style="color:#ec971f;"></i> Peringatan Dini Cuaca Sulawesi Tenggara</h5></div>
                            <div class="card-body" style="font-size: 12px;">
                                <img class="img-fluid" src="{{ $data['dataWarning']->infografis }}" alt="gambar peringatan dini"><br>
                        <div class="warningtext">
                            <p class="limittext">
                            {{ $data['peringatanterakhir'] }} "<br>"
                            </p>
                            </div>
                            <p class="text-center">
                            <button type="button" class="tombol btn btn-warning center" data-bs-toggle="modal" data-bs-target="#warningModal">Selengkapnya</button></p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section><!-- End section warning -->
    <!-- ======= Section gempa & cuaca ======= -->
    <section id="gempa-cuaca" class="gempa-cuaca bg-white text-dark">
        <div class="container " data-aos="fade-up">

            <div class="row">
                <div class="col-md-8">
                    <div class="col-header mb-2 border-bottom border-success">
                        <h5>Prakiraan Cuaca</h5>
                    </div>
                    <div class="swiper" id="swiper-cuaca" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper">
                            @foreach ($data['dataCuaca'] as $d)
                                @php
                                    $ampm = (int) date('H', strtotime($d->local_date)) > 4 && (int) date('H', strtotime($d->local_date)) < 18 ? 'am' : 'pm';
                                @endphp
                                <div class="swiper-slide">
                                    <div
                                        class="d-flex flex-column text-center p-2 m-2 shadow bg-white rounded {{ $ampm }}">
                                        <span class="card-lokasi font-weight-bold">{{ $d->kec }}</span>
                                        <span class="card-waktu">
                                            @php
                                                $time = date_create($d->local_date);
                                                echo date_format($time, 'H:i');
                                                
                                            @endphp
                                        </span>
                                        <span class="card-img"><img src="{{ $d->icon }}"
                                                style="height:60px; width:60px;"></span>
                                        <span class="card-kondisi">{{ $d->weather_desc }}</span>
                                        <span class="card-suhu">{{ $d->t }} °C</span>
                                        <span class="card-rh">{{ $d->hu }} %</span>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-header mb-2 border-bottom border-success">
                        <h5>Gempabumi Dirasakan</h5>
                    </div>
                    <div class="content-gempa p-2 bg-white  border rounded">
                        <div class="img-shakemap d-flex flex-row">
                            <a href="hhttps://ews.bmkg.go.id/tews/data/{{ $data['dataGempa']->Infogempa->gempa->Shakemap }}"
                                title="Gempabumi Terkini">
                                <img class="img-responsive"
                                    src="https://ews.bmkg.go.id/tews/data/{{ $data['dataGempa']->Infogempa->gempa->Shakemap }}"
                                    alt="" style="max-height:200px; width:100%;">
                            </a>
                            <div class="parameter-gempa  d-flex flex-column  " style="font-size:1em; line-height:2em;">
                                <span class="waktu">{{ $data['dataGempa']->Infogempa->gempa->Tanggal }},
                                    {{ $data['dataGempa']->Infogempa->gempa->Jam }}</span>
                                <span class="ic magnitude"><img
                                        src="https://www.bmkg.go.id/asset/img/gempabumi/magnitude.png"
                                        style="height:20px;" /> Magnitude:
                                    {{ $data['dataGempa']->Infogempa->gempa->Magnitude }}</span>
                                <span class="ic kedalaman"><img
                                        src="https://www.bmkg.go.id/asset/img/gempabumi/kedalaman.png"
                                        style="height:20px;" /> Kedalaman:
                                    {{ $data['dataGempa']->Infogempa->gempa->Kedalaman }}</span>
                                <span class="ic koordinat"><img
                                        src="https://www.bmkg.go.id/asset/img/gempabumi/koordinat.png"
                                        style="height:20px;" /> Lokasi: {{ $data['dataGempa']->Infogempa->gempa->Lintang }}
                                    - {{ $data['dataGempa']->Infogempa->gempa->Bujur }}</span>
                            </div>
                        </div>
                        <div class="detail-gempa d-flex flex-column" style="font-size:0.8em; line-height:2em;">
                            <span class="ic lokasi"><img src="https://www.bmkg.go.id/asset/img/gempabumi/lokasi.png"
                                    style="height:20px;" /> Pusat gempa berada di laut 51 km Tenggara Kupang</span>
                            <span class="ic dirasakan"><img
                                    src="https://www.bmkg.go.id/asset/img/gempabumi/wilayah-dirasakan.png"
                                    style="height:20px;" /> II - III Kupang, II - III Rote</span>
                            <a class="text-primary"
                                href="https://bmkg.go.id/gempabumi/gempabumi-dirasakan.bmkg">Selengkapnya
                                →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        </div>
    </section><!-- End section gempa & cuaca -->


    <!-- ======= Recent  Posts Section ======= -->
    <section id="recent-posts" class="recent-posts sections-bg text-dark">
        <div class="container" data-aos="fade-left">


            <div class="mb-4 border-bottom border-success">
                <h5>Post Terbaru</h5>
            </div>
            <div class="swiper" id="swiper-berita" data-aos="fade-up">
                <div class="swiper-wrapper">
                    @foreach ($data['post'] as $p)
                        <div class="swiper-slide">
                            <article>

                                <div class="post-img">
                                    <img src="{{ url('/storage/'.$p->cover) }}" alt="" class="img-fluid">
                                </div>

                                <p class="post-category">{{ $p->category->name }}</p>

                                <h2 class="title">
                                    <a href="{{url('/berita/'.$p->slug)}}">{{ $p->title }}</a>
                                </h2>

                                <div class="d-flex align-items-center">
                                    <div class="post-meta">
                                        <p class="post-author">{{ $p->user->name }}</p>
                                        <p class="post-date">
                                            <time datetime="2022-01-01">{{ $p->created_at }}</time>
                                        </p>
                                    </div>
                                </div>

                            </article>
                        </div>
                    @endforeach


                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section><!-- End Recent  Posts Section -->

    <!-- ======= Image Content Section ======= -->
    <section id="image-content" class="image-content sections-bg text-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="col-header border-bottom border-success mb-3">
                        <h5>Citra Satelit</h5>
                    </div>
                    <div class="img-container bg-white p-3">
                        <img class="img-fluid" src="https://inderaja.bmkg.go.id/IMAGE/HIMA/H08_EH_Indonesia.png" alt="Citra Satelit">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-header border-bottom border-success mb-3">
                        <h5>Citra Radar</h5>
                    </div>
                    <div class="img-container bg-white p-3">
                        <img class="img-fluid" src="https://inderaja.bmkg.go.id/Radar/Indonesia_ReflectivityQCComposite.png" alt="Citra Radar">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-header border-bottom border-success mb-3">
                        <h5>Informasi Iklim</h5>
                    </div>
                    <div class="img-container bg-white p-3">
                        <img class="img-fluid" src="https://cdn.bmkg.go.id/DataMKG/CEWS/pch/pch.bulan.1.cond1.png" alt="Informasi Iklim">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-header border-bottom border-success mb-3">
                        <h5>Prakiraan Tinggi Gelombang Tinggi</h5>
                    </div>
                    <div class="img-container bg-white p-3">
                        <img class="img-fluid" src="https://cdn.bmkg.go.id/DataMKG/MEWS/maritim/gelombang_maritim.png" alt="Prakiraan Gelombang Tinggi">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-header border-bottom border-success mb-3">
                        <h5>Potensi Kebakaran Hutan</h5>
                    </div>
                    <div class="img-container bg-white p-3">
                        <img class="img-fluid" src="https://cdn.bmkg.go.id/DataMKG/MEWS/spartan/36_indonesia_ffmc_01.png" alt="Potensi Kebakaran Hutan">
                    </div>
                </div>
            </div>
        </div>
        

    </section>

    {{-- MODAL --}}
    <div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="warningModal">Peringatan Dini Cuaca Sulawesi Tenggara</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row"><img class="img-fluid" src="{{ $data['dataWarning']->infografis }}" alt="">
                    <i>{{ $data['peringatanterakhir'] }}</i><br></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
        </div>
    </div>
    <!-- End Image Content Section -->

@endsection

@section('custom-script')
    <script>
        // console.log('TES')
        const swiper = new Swiper('#swiper-cuaca', {
            loop: false,
            slidesPerView: 4,
            autoplay: {
                delay: 2000,
            },
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
        const swiperBerita = new Swiper('#swiper-berita', {
            loop: false,
            slidesPerView: 3,
            spaceBetween: 20,
            autoplay: {
                delay: 2000,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

    </script>
@endsection
