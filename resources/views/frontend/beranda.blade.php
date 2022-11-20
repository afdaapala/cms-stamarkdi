@extends('frontend.layout.master')

@section('content')
    <!-- ======= Prakiraan cuaca dan gempa Section ======= -->
    <section id="gempa-cuaca" class="gempa-cuaca bg-light text-dark">
        <div class="container " data-aos="fade-up">

            <div class="row">
                <div class="col-md-8">
                    <div class="col-header mb-2 border-bottom border-success">
                        <h5>Prakiraan Cuaca</h5>
                    </div>
                    <div class="swiper" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="d-flex flex-column text-center p-2 m-2 shadow bg-white rounded bg-malam  ">
                                    <span class="card-lokasi font-weight-bold">Kemayoran</span>
                                    <span class="card-waktu">13:00 WIB</span>
                                    <span class="card-img"><img
                                            src="https://bmkg.go.id/asset/img/weather_icon/ID/hujan%20ringan-am.png"
                                            style="height:60px; width:60px;"></span>
                                    <span class="card-kondisi">Hujan Ringan</span>
                                    <span class="card-suhu">29 °C</span>
                                    <span class="card-rh">80 %</span>
                                </div>
                            </div><!-- End testimonial item -->
                            <div class="swiper-slide">
                                <div class="d-flex flex-column text-center p-2 m-2 shadow bg-white rounded bg-siang  ">
                                    <span class="card-lokasi font-weight-bold">Kemayoran</span>
                                    <span class="card-waktu">15:00 WIB</span>
                                    <span class="card-img"><img
                                            src="https://bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png"
                                            style="height:60px; width:60px;"></span>
                                    <span class="card-kondisi">Berawan</span>
                                    <span class="card-suhu">30 °C</span>
                                    <span class="card-rh">80 %</span>
                                </div>
                            </div><!-- End testimonial item -->
                            <div class="swiper-slide">
                                <div class="d-flex flex-column text-center p-2 m-2 shadow bg-white rounded  ">
                                    <span class="card-lokasi font-weight-bold">Kemayoran</span>
                                    <span class="card-waktu">18:00 WIB</span>
                                    <span class="card-img"><img
                                            src="https://bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png"
                                            style="height:60px; width:60px;"></span>
                                    <span class="card-kondisi">Berawan</span>
                                    <span class="card-suhu">31 °C</span>
                                    <span class="card-rh">80 %</span>
                                </div>
                            </div><!-- End testimonial item -->
                            <div class="swiper-slide">
                                <div class="d-flex flex-column text-center p-2 m-2 shadow bg-white rounded  ">
                                    <span class="card-lokasi font-weight-bold">Kemayoran</span>
                                    <span class="card-waktu">21:00 WIB</span>
                                    <span class="card-img"><img
                                            src="https://bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png"
                                            style="height:60px; width:60px;"></span>
                                    <span class="card-kondisi">Berawan</span>
                                    <span class="card-suhu">31 °C</span>
                                    <span class="card-rh">80 %</span>
                                </div>
                            </div><!-- End testimonial item -->


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
                            <a href="hhttps://ews.bmkg.go.id/tews/data/20221120204922.mmi.jpg" title="Gempabumi Terkini">
                                <img class="img-responsive" src="https://ews.bmkg.go.id/tews/data/20221120204922.mmi.jpg"
                                    alt="" style="max-height:300px; width:100%;">
                            </a>
                            <div class="parameter-gempa  d-flex flex-column  " style="font-size:1em; line-height:2em;">
                                <span class="waktu">20 Nov 2022, 20:49:22 WIB</span>
                                <span class="ic magnitude"><img
                                        src="https://www.bmkg.go.id/asset/img/gempabumi/magnitude.png"
                                        style="height:20px;" /> Magnitude: 5.5</span>
                                <span class="ic kedalaman"><img
                                        src="https://www.bmkg.go.id/asset/img/gempabumi/kedalaman.png"
                                        style="height:20px;" /> Kedalaman: 49 km</span>
                                <span class="ic koordinat"><img
                                        src="https://www.bmkg.go.id/asset/img/gempabumi/koordinat.png"
                                        style="height:20px;" /> Lokasi: 10.57 LS - 123.86 BT</span>
                            </div>


                        </div>
                        <div class="detail-gempa d-flex flex-column" style="font-size:0.8em; line-height:2em;">
                            <span class="ic lokasi"><img src="https://www.bmkg.go.id/asset/img/gempabumi/lokasi.png"
                                    style="height:20px;" /> Pusat gempa berada di laut 51 km Tenggara Kupang</span>
                            <span class="ic dirasakan"><img
                                    src="https://www.bmkg.go.id/asset/img/gempabumi/wilayah-dirasakan.png"
                                    style="height:20px;" /> II - III Kupang, II - III Rote</span>
                            <a class="text-primary" href="https://bmkg.go.id/gempabumi/gempabumi-dirasakan.bmkg">Selengkapnya
                                →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        </div>
    </section><!-- End Testimonials Section -->
@endsection

@section('custom-script')
    <script>
        console.log('TES')



        const swiper = new Swiper('.swiper', {
            loop: false,
            slidesPerView: 4,

            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },

        });
    </script>
@endsection
