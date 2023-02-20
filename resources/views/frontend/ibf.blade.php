@extends('frontend.layout.pages')


@section('content')

<section id="berita" class="berita  bg-light text-dark">

    <div class="container">
        <div class="row">   
            <div class="col-4">
            <div class="p-2 text-center text-white content-header" style="background-color:#000;">IBF</div>
                <div class="p-2 img-container">
                    <a data-fancybox class="popup" href="https://web.meteo.bmkg.go.id//media/data/bmkg/ibfnew/28_sultra_24.png">
                        <img class="img-fluid" src="https://web.meteo.bmkg.go.id//media/data/bmkg/ibfnew/28_sultra_00.png" alt="IBF-Sultra">
                    </a>
                </div>
            </div>
            <div class="col-4">
            <div class="p-2 text-center text-white content-header" style="background-color:#000;">IBF - H+1</div>
                <div class="p-2 img-container">
                    <a data-fancybox class="popup" href="https://web.meteo.bmkg.go.id//media/data/bmkg/ibfnew/28_sultra_24.png">
                        <img class="img-fluid" src="https://web.meteo.bmkg.go.id//media/data/bmkg/ibfnew/28_sultra_24.png" alt="IBF-Sultra">
                    </a>
                </div>
            </div>
            <div class="col-4">
            <div class="p-2 text-center text-white content-header" style="background-color:#000;">IBF - H+2</div>
                <div class="p-2 img-container">
                    <a data-fancybox class="popup" href="https://web.meteo.bmkg.go.id//media/data/bmkg/ibfnew/28_sultra_24.png">
                        <img class="img-fluid" src="https://web.meteo.bmkg.go.id//media/data/bmkg/ibfnew/28_sultra_48.png" alt="IBF-Sultra">
                    </a>
                </div>
            </div>
    </div>

@endsection

@section('custom-script')

@endsection