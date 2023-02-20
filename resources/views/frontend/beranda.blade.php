@extends('frontend.layout.master')

@section('content')
    <!-- ======= Section warning ======= -->
        <section id="warning" class="warning  bg-light text-dark">
            <div class="container" data-aos="fade-right">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="col-header mb-2 border-bottom border-success">
                            <h5>Prakiraan Cuaca</h5>
    
                        </div>
                        <div class="swiper" id="swiper-cuaca" data-aos="fade-up" data-aos-delay="90">
                            <div class="swiper-wrapper">
                                @foreach ($data['dataCuaca'] as $d)
                                    @php
                                        $ampm = (int) date('H', strtotime($d->local_date)) > 4 && (int) date('H', strtotime($d->local_date)) < 18 ? 'am' : 'pm';
                                    @endphp
                                    <div class="swiper-slide">
                                        <div
                                            class="d-flex flex-column text-center p-1 m-1 shadow bg-white {{ $ampm }}">
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
                    <div class="col-md-4 p-3 card border-warning mt-4">
                            <div class="card-header bg-white"><h6><i class='fa-solid fa-exclamation-triangle' style="color:#ec971f;"></i> Peringatan Dini Cuaca Sulawesi Tenggara</h6></div>
                            {{-- <div class="card-body" style="font-size: 12px;">
                                <img class="img-fluid" src="{{ $data['peringatanimg0'] }}" alt="gambar peringatan dini"><br> --}}
                        <div class="card-body p-2 pl-4">
                            <p class="limittext">
                            {{ $data['peringatanterakhir'] }} <br>
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
                    <div class="warning-heading font-weight-bold border-bottom border-success">
                        <h5>Prakiraan Cuaca Perairan Sulawesi Tenggara</h5>
                    </div>
                    <div class="p-3 rounded" style="font-size:1em">
                        <div class="border border-dark" id="mapmar"></div>
                    </div>
                    
                </div>
                <div class="col-md-4">
                    <div class="col-header mb-4 border-bottom border-success">
                        <h5>Gempabumi Dirasakan</h5>
                    </div>
                    <div class="content-gempa p-3 bg-white  border rounded">
                        <div class="img-shakemap d-flex flex-column">
                            {{-- <a href="https://ews.bmkg.go.id/tews/data/{{ $data['dataGempa']->Infogempa->gempa->Shakemap }}"
                                title="Gempabumi Terkini">
                                <img class="img-responsive"
                                    src="https://ews.bmkg.go.id/tews/data/{{ $data['dataGempa']->Infogempa->gempa->Shakemap }}"
                                    alt="" style="max-height:200px; width:100%;">
                            </a> --}}
                            <div id="map" class="rounded-3"></div>
                            <div class="parameter-gempa  d-flex flex-column " style="font-size:1em; line-height:2em;">
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
                                    style="height:20px;" /> {{ $data['dataGempa']->Infogempa->gempa->Wilayah }}</span>
                            <span class="ic dirasakan"><img
                                    src="https://www.bmkg.go.id/asset/img/gempabumi/wilayah-dirasakan.png"
                                    style="height:20px;" /> {{  $data['dataGempa']->Infogempa->gempa->Dirasakan }}</span>
                            <a class="text-primary"
                                href="https://bmkg.go.id/gempabumi/gempabumi-dirasakan.bmkg">Selengkapnya
                                →</a>
                                <p class="text-center">
                                    <a data-fancybox style="background-color:#40AB42;" class="tombol center btn btn-outline-light" href="https://data.bmkg.go.id/DataMKG/TEWS/{{ $data['xmlm5']->gempa->Shakemap }}" title="Gempa Terkini">
                                    Lihat Peta Guncangan
                                    </a>
                                    </p>
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
                        <a data-fancybox class="popup" href="https://inderaja.bmkg.go.id/IMAGE/HIMA/H08_EH_Indonesia.png?id=<?php echo rand(100000, 999999); ?>">
                            <img class="img-fluid" src="https://inderaja.bmkg.go.id/IMAGE/HIMA/H08_EH_Indonesia.png?id=<?php echo rand(100000, 999999); ?>" alt="Citra Satelit">  
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-header border-bottom border-success mb-3">
                        <h5>Citra Radar</h5>
                    </div>
                    <div class="img-container bg-white p-3">
                        <a data-fancybox class="popup" href="https://inderaja.bmkg.go.id/Radar/Indonesia_ReflectivityQCComposite.png?id=<?php echo rand(100000, 999999); ?>">
                            <img class="img-fluid" src="https://inderaja.bmkg.go.id/Radar/Indonesia_ReflectivityQCComposite.png?id=<?php echo rand(100000, 999999); ?>" alt="Citra Radar">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-header border-bottom border-success mb-3">
                        <h5>Informasi Iklim</h5>
                    </div>
                    <div class="img-container bg-white p-3">
                        <a data-fancybox class="popup" href="https://cdn.bmkg.go.id/DataMKG/CEWS/pch/pch.bulan.1.cond1.png?id=<?php echo rand(100000, 999999); ?>">
                            <img class="img-fluid" src="https://cdn.bmkg.go.id/DataMKG/CEWS/pch/pch.bulan.1.cond1.png?id=<?php echo rand(100000, 999999); ?>" alt="Informasi Iklim">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-header border-bottom border-success mb-3">
                        <h5>Prakiraan Tinggi Gelombang Tinggi</h5>
                    </div>
                    <div class="img-container bg-white p-3">
                        <a data-fancybox class="popup" href="https://cdn.bmkg.go.id/DataMKG/MEWS/maritim/gelombang_maritim.png?id=<?php echo rand(100000, 999999); ?>">
                            <img class="img-fluid" src="https://cdn.bmkg.go.id/DataMKG/MEWS/maritim/gelombang_maritim.png?id=<?php echo rand(100000, 999999); ?>" alt="Prakiraan Gelombang Tinggi">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-header border-bottom border-success mb-3">
                        <h5>Prakiraan Angin</h5>
                    </div>
                    <div class="img-container bg-white p-3">
                        <a data-fancybox class="popup" href="https://cdn.bmkg.go.id/DataMKG/MEWS/angin/streamline_d1.jpg?id=<?php echo rand(100000, 999999); ?>">
                            <img class="img-fluid" src="https://cdn.bmkg.go.id/DataMKG/MEWS/angin/streamline_d1.jpg?id=<?php echo rand(100000, 999999); ?>" alt="Prakiraan Angin">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-header border-bottom border-success mb-3">
                        <h5>Potensi Kebakaran Hutan</h5>
                    </div>
                    <div class="img-container bg-white p-3">
                        <a data-fancybox class="popup" href="https://cdn.bmkg.go.id/DataMKG/MEWS/spartan/36_indonesia_ffmc_01.png?id=<?php echo rand(100000, 999999); ?>">
                            <img class="img-fluid" src="https://cdn.bmkg.go.id/DataMKG/MEWS/spartan/36_indonesia_ffmc_01.png?id=<?php echo rand(100000, 999999); ?>" alt="Potensi Kebakaran Hutan">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        

    </section>
    <div class="banner-layanan-home container">
        <div class="owl-carousel owl-theme">
            <!--<div class="col-md-12">
                <a href="#">
                    <img class="img-responsive" src="../asset/img/banner/bersatu-lawan-terorisme.jpg" alt="Bersatu Lawan Terorisme">
                </a>
            </div>-->
            <div class="col-md-12 item">
                <a href="https://www.wmo.int/" target="_blank">
                    <img class="img-fluid" src="../img/banner/banner-wmo.jpg" alt="WMO">
                </a>
            </div>
            <div class="col-md-12 item">
                <a href="http://epengawasan.bmkg.go.id/wbs/" target="_blank">
                    <img class="img-fluid" src="../img/banner/banner-epengawasan.jpg" alt="E-Pengawasan">
                </a>
            </div>
            <div class="col-md-12 item">
                <a href="https://www.lapor.go.id/" target="_blank">
                    <img class="img-fluid" src="../img/banner/Lapor-UKP4.jpg" alt="LAPOR!">
                </a>
            </div>
            <div class="col-md-12 item">
                <a href="https://www.bmkg.go.id/rb" target="_blank">
                    <img class="img-responsive" src="../img/banner/banner-reformasi-birokrasi.jpg" alt="Reformasi Birokrasi BMKG">
                </a>
            </div>
            <div class="col-md-12 item">
                <a href="https://www.bmkg.go.id/profil/?p=stop-pungli-bmkg" target="_blank">
                    <img class="img-fluid" src="../img/banner/saber-pungli.jpg" alt="Saber Pungli">
                </a>
            </div>
            <div class="col-md-12 item">
                <a href="http://dataonline.bmkg.go.id/home" target="_blank">
                    <img class="img-fluid" src="../img/banner/banner_data_online.jpg" alt="Data Online">
                </a>
            </div>
            <div class="col-md-12 item">
                <a href="http://puslitbang.bmkg.go.id/jmg" target="_blank">
                    <img class="img-fluid" src="../img/banner/banner-journalMG.jpg" alt="Jurnal Meteorologi dan Geofisika">
                </a>
            </div>
            <div class="col-md-12 item">
                <a href="http://inatews.bmkg.go.id/new/query_gmpqc.php" target="_blank">
                    <img class="img-fluid" src="../img/banner/dataGempa.jpg" alt="Data Gempabumi">
                </a>
            </div>
            <div class="col-md-12 item">
                <a href="https://www.bmkg.go.id/geofisika-potensial/kalkulator-magnet-bumi.bmkg" target="_blank">
                    <img class="img-fluid" src="../img/banner/kalkulator-magnet.jpg" alt="Kalkulator Magnet Bumi">
                </a>
            </div>
            <div class="col-md-12 item">
                <a href="#">
                    <img class="img-fluid" src="../img/banner/mottobmkg.jpg" alt="Motto BMKG">
                </a>
            </div>
            <div class="col-md-12 item">
                <a href="https://www.bmkg.go.id/profil/?p=maklumat-pelayanan">
                    <img class="img-fluid" src="../img/banner/maklumatpelayanan.jpg" alt="Maklumat Pelayanan">
                </a>
            </div>
            <div class="col-md-12 item">
                <a href="http://lpse.bmkg.go.id" target="_blank">
                    <img class="img-fluid" src="../img/banner/lpse.jpg" alt="LPSE">
                </a>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="warningModal">Peringatan Dini Cuaca Sulawesi Tenggara</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    {{-- <img class="img-fluid" src="{{ $data['peringatanimg0'] }}" alt=""> --}}
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
        var owl = $('.owl-carousel');
            owl.owlCarousel({
                items:5,
                loop:true,
                margin:10,
                autoplay:true,
                autoplayTimeout:2100,
                autoplayHoverPause:true
            });
    </script>
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

        // gempa map
        var map = L.map('map', {attributionControl: false, zoomControl : false}).setView([{{ $data['dataGempa']->Infogempa->gempa->Coordinates }}], 5);

        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
            }).addTo(map);

        var pulsingIcon = L.icon.pulse({iconSize:[20,20],color:'red'});
        var marker = L.marker([{{ $data['dataGempa']->Infogempa->gempa->Coordinates }}],
        {icon: pulsingIcon}
        ).addTo(map);

        var layerCartoDB = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
            subdomains: 'abcd',
            // maxZoom: 18
        });

        var OpenSM = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> Contributors',
            // maxZoom: 18,
        });


        //bound untuk indonesia
        var baratdaya = L.latLng(-13.510354, 87.275391);
        timurlaut = L.latLng(9.60075, 145.986328);

        //bound untuk sultra saja
        // var baratdaya = L.latLng(-6.920974, 116.828613);
        //     timurlaut = L.latLng(-0.34021, 128.776611);

        var bounds = L.latLngBounds(baratdaya, timurlaut);

        var mapmar = L.map('mapmar', {
            center: [-3.970265, 122.590084],
            zoom: 8,
            minZoom: 6,
            maxZoom: 13,
            maxBounds: bounds,
            layers: [OpenSM],
            zoomControl: false
        });

        var myStyle = {
            "color": "#f00",
            "weight": 1,
            "opacity": 0.65
        };

        function getColor(d) {
            return d == "Tenang" ? '#2794f3' :
                d == "Rendah" ? '#00d240' :
                d == "Sedang" ? '#fef104' :
                d == "Tinggi" ? '#fe8432' :
                d == "Sangat Tinggi" ? '#fe020f' :
                d == "Ekstrem" ? '#ee36d4' :
                '#FFFFFF';
        }

        var layerclicked = null;

        function eachLayer(f, l) {
            var wilper = f.properties.WP_1;
            // console.log(wilper);
            l.on({
                click: function highlightFeature(e) {
                    if (layerclicked !== null) {
                        geojsonLayer.setStyle({
                            weight: 2,
                            opacity: 1,
                            dashArray: '3',
                            fillOpacity: 0.5
                        });
                    }
                    var layer = e.target;
                    layer.setStyle({
                        weight: 5,
                        // color : '#666',
                        dashArray: '5',
                        fillOpacity: 0.6
                    });
                    mapmar.fitBounds(e.target.getBounds());
                    infoGel.update(f.properties.WP_1);
                    layerclicked = layer;
                }
            });
        }

        var infoGel = L.control({
            position: 'bottomright'
        });

        infoGel.onAdd = function(mapmar) {
            this._div = L.DomUtil.create('div', 'info');
            this.update();
            return this._div;
        }

        infoGel.update = function(wilper) {
            var prakicumar = cumar_json_code[wilper];
            var datwilper = $.ajax({
                url: cumar_json_code[wilper],
                async: false
            }).responseJSON;
            // console.log(datwilper);
            this._div.innerHTML = '<div><h6 style="text-align: right; border-bottom: 1px solid #aaa;"> Informasi Cuaca Perairan/Pelayanan</h6>' +
                (datwilper ? '<h6 style="text-align: center; text-transform: uppercase;"><b>' + datwilper.name + '</b></h6><br />' +
                    '<div class="row">' +
                    '<div class="col s4">Cuaca</div>' +
                    '<div class="col s4">Angin</div>' +
                    '<div class="col s4">Gelombang</div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col s4"><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/' + datwilper.data[0]['weather'].toLowerCase() + '-am.png" style="width: 50px"></div>' +
                    '<div class="col s4"><h5>' + datwilper.data[0]['wind_speed_min'] + ' - ' + datwilper.data[0]['wind_speed_max'] + '<sup> kts</sup></h5></div>' +
                    '<div class="col s4"><h5>' + datwilper.data[0]['wave_cat'] + '</h5></div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col s4"><b>' + datwilper.data[0]['weather'] + '</b></div>' +
                    '<div class="col s4"><b>' + datwilper.data[0]['wind_from'] + ' - ' + datwilper.data[0]['wind_to'] + '</b></div>' +
                    '<div class="col s4"><b>' + datwilper.data[0]['wave_desc'] + '</b></div>' +
                    '</div>' +
                    // '<div class="row" style="">' +
                    //     '<div class="block" style="font-size : 12px;">' + datwilper.data[0]['weather_desc'] + '</div>' +
                    // '</div>' +
                    '<div class="row">' +
                    '<div class="col s12">Berlaku : ' + datwilper.data[0]['valid_from'] + '-' + datwilper.data[0]['valid_to'] + '</div>' +
                    '</div>' +
                    '</div>' :
                    'Pilih Wilayah Pelayanan');
        }

        function style(f, datagel) {
            return {
                fillColor: getColor(f.properties.wave_cat),
                weight: 2,
                opacity: 1,
                color: '#00008b',
                dashArray: '3',
                fillOpacity: 0.4
            };
        }

        var geojsonLayer = new L.GeoJSON.AJAX(["https://test-a.bmkg.go.id/stamarkendari/public/json/update/wp.php?f=wilayah_perairan"], {
            style: style,
            onEachFeature: eachLayer
        }).addTo(mapmar);

        L.Control.Gambar = L.Control.extend({
            onAdd: function(mapmar) {
                var img = L.DomUtil.create('img');
                img.src = 'https://stamarkendari.info/public/img/catGelombang.png';
                img.style.width = '100%';
                img.style.maxWidth = '170px';
                img.style.maxHeight = 'auto';
                img.style.opacity = '0.95';
                return img;
            },
            onRemove: function(mapmar) {}
        });
        L.control.gambar = function(opts) {
            return new L.Control.Gambar(opts);
        };

        var catGelombang = L.control.gambar({
            position: 'bottomleft'
        }).addTo(mapmar);

        infoGel.addTo(mapmar);

    </script>
@endsection