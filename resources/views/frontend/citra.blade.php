@extends('frontend.layout.pages')

<?php 
$year = date('Y');
$month = date('m');
$day = date('d');
$yesterday = date('d',strtotime("-1 days"));
$date = date('Ymd');
?>

@section('content')

<section id="berita" class="berita  bg-light text-dark">

    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="p-2 text-center text-white content-header border rounded" style="background-color:#e78e19;">Citra Radar Kendari</div>
                    <div class="p-2 img-container">
                        <a data-fancybox class="popup" href="https://inderaja.bmkg.go.id/Radar/KEND_SingleLayerCRefQC.png">
                            <img class="img-fluid border border-dark rounded" src="https://inderaja.bmkg.go.id/Radar/KEND_SingleLayerCRefQC.png" alt="peta-tinggi-gelombang">
                        </a>
                </div>
            </div>
            <div class="col-4">
                <div class="p-2 text-center text-white content-header border rounded" style="background-color:#9e0b92; font-size: 14px;">Citra Satelit Himawari-8 IR (3 Jam)</div>
                <div class="p-2 img-container">
                    <a data-fancybox class="popup" href="http://satelit.bmkg.go.id/IMAGE/ANIMASI/H08_EH_Sultra_m18.gif">
                        <img class="img-fluid border border-dark rounded" src="http://satelit.bmkg.go.id/IMAGE/ANIMASI/H08_EH_Sultra_m18.gif" alt="Himawari 8 EH">
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="p-2 text-center text-white content-header border rounded" style="background-color:#12acdb;">Tinggi Gelombang Signifikan (3 Hari Kedepan)</div>
                    <div class="p-2 img-container">
                        <a data-fancybox class="popup" href="https://peta-maritim.bmkg.go.id/render-static/w3g/<?php echo $year; ?>/<?php echo $month;?>/<?php echo $year . $month . $yesterday;?>12/kendari/swh.gif">
                            <img class="img-fluid border border-dark rounded" src="https://peta-maritim.bmkg.go.id/render-static/w3g/<?php echo $year; ?>/<?php echo $month;?>/<?php echo $year . $month . $yesterday;?>12/kendari/swh.gif" alt="Perairan Sultra"  width="500" />
                        </a>
                    </div>
                </div>
        </div>
        <div class="row">
                <div class="col-4">
                    <div class="p-2 text-center text-white content-header border rounded" style="background-color:#ff4500;">Prakiraan Tinggi Gelombang</div>
                    <div class="p-2 img-container">
                        <a data-fancybox class="popup" href="https://cdn.bmkg.go.id/DataMKG/MEWS/maritim/gelombang_maritim.png?<?php echo time();?>">
                            <img class="img-fluid border border-dark rounded" src="https://cdn.bmkg.go.id/DataMKG/MEWS/maritim/gelombang_maritim.png?<?php echo time();?>" alt="peta-tinggi-gelombang">
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="p-2 text-center text-white content-header border rounded" style="background-color:#006994;">Prakiraan Angin</div>
                    <div class="p-2 img-container">
                        <a data-fancybox class="popup" href="https://cdn.bmkg.go.id/DataMKG/MEWS/angin/streamline_d1.jpg">
                            <img class="img-fluid border border-dark rounded" src="https://cdn.bmkg.go.id/DataMKG/MEWS/angin/streamline_d1.jpg" alt="peta-tinggi-gelombang">
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="p-2 text-center text-white content-header border rounded" style="background-color:#40AB42;">Prakiraan Iklim</div>
                    <div class="p-2 img-container">
                        <a data-fancybox class="popup" href="https://cdn.bmkg.go.id/DataMKG/CEWS/pch/pch.bulan.1.cond1.png">
                            <img class="img-fluid border border-dark rounded" src="https://cdn.bmkg.go.id/DataMKG/CEWS/pch/pch.bulan.1.cond1.png" alt="peta-tinggi-gelombang">
                        </a>
                    </div>
                </div>
        </div>

        <div class="row">   
                <div class="col-4">
                <div class="p-2 text-center text-white content-header border border-dark rounded" style="background-color:#000;">Tinggi Gelombang Signifikan</div>
                    <div class="p-2 img-container">
                        <a data-fancybox class="popup" href="https://peta-maritim.bmkg.go.id/render-static/w3g/<?php echo $year; ?>/<?php echo $month;?>/<?php echo $year . $month . $yesterday;?>12/kendari/swh_<?php echo $date;?>00.png">
                            <img class="img-fluid border border-dark rounded" src="https://peta-maritim.bmkg.go.id/render-static/w3g/<?php echo $year; ?>/<?php echo $month;?>/<?php echo $year . $month . $yesterday;?>12/kendari/swh_<?php echo $date;?>00.png" alt="Perairan Sultra"  width="500" />
                        </a>
                    </div>
                </div>
                <div class="col-4">
                <div class="p-2 text-center text-white content-header border border-dark rounded" style="background-color:#000; font-size: 14px;">Citra Satelit Himawari-8 IR Enhanced</div>
                    <div class="p-2 img-container">
                        <a data-fancybox class="popup" href="https://inderaja.bmkg.go.id/IMAGE/HIMA/H08_EH_Sultra.png">
                            <img class="img-fluid border border-dark rounded" src="https://inderaja.bmkg.go.id/IMAGE/HIMA/H08_EH_Sultra.png" alt="peta-tinggi-gelombang">
                        </a>
                    </div>
                </div>
                <div class="col-4">
                <div class="p-2 text-center text-white content-header border border-dark rounded" style="background-color:#000;">GSMAP</div>
                    <div class="p-2 img-container">
                        <a data-fancybox class="popup" href="https://inderaja.bmkg.go.id/IMAGE/GSMAP/GSMaP_Precipitation_24hr.png?<?php echo time(); ?>">
                        <img class="img-fluid border border-dark rounded" src="https://inderaja.bmkg.go.id/IMAGE/GSMAP/GSMaP_Precipitation_24hr.png?<?php echo time(); ?>" alt="GSMaP"  width="500" />
                        </a>
                    </div>
                </div>
        </div>

@endsection

@section('custom-script')

@endsection