@extends('frontend.layout.fulldisplay')

@section('custom-head')
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <!-- <link rel="stylesheet" href="https://stamarkendari.info/public/css/amar-leaflet.css" crossorigin="" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-pulse-icon@0.1.0/src/L.Icon.Pulse.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="https://warning2.bmkg.go.id/img/logo-bmkg.png" type="image/x-icon">
    <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" integrity="sha512-gc3xjCmIy673V6MyOAZhIW93xhM9ei1I+gLbmFjUHIjocENRsLX/QUE1htk5q1XV2D/iie/VQ8DXI6Vu8bexvQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
    <!-- Compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
    <meta http-equiv="refresh" content="1800">

    <title>Display Integrasi Stamar Kendari</title>
    <style type="text/css">
        body {
            padding: 0px;
            margin: 0px;

        }


        #map {
            position: absolute;
            top: 0px;
            bottom: 0px;
            width: 100%;
            height: 99%;
        }

        table {
            border-spacing: 0px;
            height: auto;
            width: auto;
        }

        th {
            max-width: 1000px;
            min-width: 250px;
            word-wrap: break-word;
        }

        td {
            word-wrap: break-word;
            width: 100%;
        }

        #cred_text {
            /* position: absolute; */
            opacity: 0.8;
            font: 12px/14px Arial, Helvetica, sans-serif;
            /* background: white;
            background: rgba(255,255,255,0.8); */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            padding: 4px;
            background: #eee;
            color: #222;
        }

        .cmax_text {
            /* position: absolute; */
            opacity: 0.8;
            font: 12px/14px Arial, Helvetica, sans-serif;
            /* background: white;
            background: rgba(255,255,255,0.8); */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            color: #222;
            padding: 4px;
            background: whitesmoke;
        }

        .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            max-width: 500px;
        }

        .info h4,
        h6 {
            margin: 0 0 5px;
            color: #222;
            /* text-align: center; */
        }

        .block {
            display: inline-block;
            vertical-align: top;
            max-width: 680px;
            /* background-color: lightgrey; */
            text-align: left;
        }

        #watermark {
            position: fixed;
            bottom: 10px;
            /* right:-5px; */
            left: 50%;
            transform: translate(-50%, 0%);
            opacity: 0.7;
            z-index: 960525;
            color: white;
            font-size: 12px;
            font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
            border-radius: 20px;
            /* background: #73AD21; */
            background: #222;
            padding: 2px;
        }

        .legend {
            max-width: 130px;
            width: 50%;
            opacity: 0.8;
        }

        @media only screen and (max-width: 600px) {
            .info {
                padding: 1px 2px;
                font: 9px/11px Arial, Helvetica, sans-serif;
                background: white;
                background: rgba(255, 255, 255, 0.8);
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
                border-radius: 5px;
                max-width: 200px;
                opacity: 0.9;
            }

            .info h4,
            h5,
            h6 {
                margin: 0 0 5px;
                color: #222;
                font-size: 10px;
                /* text-align: center; */
            }

            .img {
                max-width: 40%;
            }

            .legend {
                max-width: 90px;
            }

            .cmax_text {
                /* position: absolute; */
                opacity: 0.8;
                font: 8px/10px Arial, Helvetica, sans-serif;
                /* background: white;
                background: rgba(255,255,255,0.8); */
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
                border-radius: 20px;
                color: #222;
                padding: 1px;
                background: whitesmoke;
            }

            #watermark {
                font-size: 10px;
            }
        }
    </style>
@endsection

@section('content')
{{-- <div class="container"> --}}
    <div id="map"></div>

{{-- </div> --}}

    <div id="watermark"><a href="{{ url('/') }}" style="color: #eee">ke Website Stamar KDI</a></div>

    <?php
    $cmax = file_get_contents('http://36.91.152.163:5000/radar/1');
    $cmax_data = json_decode($cmax, true);

    $arrContextOptions = array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
        ),
    );

    // $json = file_get_contents('https://stamarkendari.info/public/json/vessels/vessels.php?f=pvessels');
    $json = file_get_contents('https://test-a.bmkg.go.id/stamarkendari/public/json/vessels/vessels.php?f=pvessels', false,  stream_context_create($arrContextOptions));
    $json_data = json_decode($json);
    $fish = file_get_contents('https://peta-maritim.bmkg.go.id/public_api/pdpi.json');
    $fishdata = json_decode($fish, true);
    $vessels = $json_data;
    $fishinawis = file_get_contents('https://maritim.bmkg.go.id/inawis/modules/webservice/rest/?method=getMapData&server=1&formatdata=mapdata&pin=6952d4944fe80cd0d9736efcfa12a59a&service=WFS&version=1.0.0&request=GetFeature&typeName=APP:fishing_zone_v2&cql_filter=YXdhbCUyMCUzRSUyMCcxMC4xOS4yMiclMjBBTkQlMjAlMjBhd2FsJTIwJTIwJTNDJTIwJzEwLjI3LjIyJyUyME9SJTIwYWtoaXIlMjAlM0UlMjAnMTAuMTkuMjInJTIwQU5EJTIwJTIwYWtoaXIlMjAlMjAlM0MlMjAnMTAuMjcuMjIn&outputFormat=application/json');
    $fishinawisdata = json_decode($fishinawis, true);

    // echo print_r($fishinawisdata['features'][0]['geometry']['coordinates'][1]);

    $kodeCuaca = [
        '0' =>  'Cerah',
        '100' =>  'Cerah',
        '1' =>  'Cerah Berawan',
        '101' =>  'Cerah Berawan',
        '2' =>  'Cerah Berawan',
        '102' =>  'Cerah Berawan',
        '3' =>  'Berawan',
        '103' =>  'Berawan',
        '4' =>  'Berawan Tebal',
        '104' =>  'Berawan Tebal',
        '5' => 'Udara Kabur',
        '10' => 'Asap',
        '45' => 'Kabut',
        '60' => 'Hujan Ringan',
        '61' => 'Hujan Ringan',
        '63' => 'Hujan Lebat',
        '80' => 'Hujan Lokal',
        '95' => 'Hujan Petir',
        '97' => 'Hujan Petir'
    ];
    // $weatherInfo = $kodeCuaca[$weather];
    // $img = 'https://www.bmkg.go.id/asset/img/weather_icon/ID/' . strtolower($weatherInfo) . '-am.png';
    // echo $vessels['latitude'] . ',' . $vessels['longitude'];
    ?>

@endsection

@section('custom-script')

<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet-pulse-icon@0.1.0/src/L.Icon.Pulse.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet-rotatedmarker@0.2.0/leaflet.rotatedMarker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js" integrity="sha512-cyAbuGborsD25bhT/uz++wPqrh5cqPh1ULJz4NSpN9ktWcA6Hnh9g+CWKeNx2R0fgQt+ybRXdabSBgYXkQTTmA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>
    <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-realtime/2.2.0/leaflet-realtime.min.js" integrity="sha512-lLUl/IVVjrkzQWAtFwvpmy5OJcWxwX9PyDslgi7RO6Uz6a/nrz+C6bxKkR34DT/7yeUr0JC8JyrFEjBGAgo+bA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://rowanwins.github.io/leaflet-easyPrint/dist/bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js" integrity="sha512-ozq8xQKq6urvuU6jNgkfqAmT7jKN2XumbrX1JiB3TnF7tI48DPI4Gy1GXKD/V3EExgAs1V+pRO7vwtS1LHg0Gw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Own Hosted JS -->
    <script src="https://stamarkendari.info/public/js/wp_json.js"></script>
    <script src="https://stamarkendari.info/public/js/pelabuhan.js"></script>


    <script>
        /////////Map layer group//////////
        var layerDark = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
            // maxZoom: 18,
            attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
        });

        var OpenSM = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> Contributors',
            // maxZoom: 18,
        });

        var layerEsri = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ, TomTom, Intermap, iPC, USGS, FAO, NPS, NRCAN, GeoBase, Kadaster NL, Ordnance Survey, Esri Japan, METI, Esri China (Hong Kong), and the GIS User Community',
            // maxZoom: 16
        });

        var layerCartoDB = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
            subdomains: 'abcd',
            // maxZoom: 18
        });


        //bound untuk indonesia
        var baratdaya = L.latLng(-13.510354, 87.275391);
        var timurlaut = L.latLng(9.60075, 145.986328);

        //bound untuk sultra saja
        // var baratdaya = L.latLng(-6.920974, 116.828613);
        //     timurlaut = L.latLng(-0.34021, 128.776611);

        var bounds = L.latLngBounds(baratdaya, timurlaut);

        var map = L.map('map', {
            center: [-3.970093, 122.589569],
            zoom: 8,
            minZoom: 6,
            maxZoom: 13,
            maxBounds: bounds,
            layers: [layerCartoDB],
            zoomControl: false
        });

        map.locate({
            setview: true
        });

        map.createPane('radar');
        map.createPane('labels');
        map.getPane('radar').style.zIndex = 500;
        map.getPane('labels').style.zIndex = 650;
        map.getPane('radar').style.pointerEvents = 'none';
        map.getPane('labels').style.pointerEvents = 'none';

        var CartoDB_PositronOnlyLabels = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}{r}.png', {
            attribution: 'by: afdaapala',
            subdomains: 'abcd',
            // maxZoom: 20
            pane: 'labels'
        }).addTo(map);

        var pulsingIcon = L.icon.pulse({
            iconSize: [10, 10],
            color: 'red'
        });

        var iconFish = L.icon({
            iconUrl: 'https://stamarkendari.info/public/img/fish.png',
            iconSize: [16, 16]
        });

        var iconBMKG = L.icon({
            iconUrl: 'https://warning2.bmkg.go.id/img/logo-bmkg.png',
            iconSize: [17, 22]
        });

        var editLayer = new L.geoJson().addTo(map);

        map.on(L.Draw.Event.CREATED, function(event) {
            var layer = event.layer;
            editLayer.addLayer(layer);
        });

        var drawControl = new L.Control.Draw({
            position: 'topright',
            draw: {
                polygon: false,
                circle: false,
                polyline: false,
                rectangle: false,
                circlemarker: false,
                marker: {
                    icon: pulsingIcon,
                    draggable: true
                }
            },
            edit: {
                featureGroup: editLayer,
                remove: true
            }
        });

        var baseMaps = {
            "Ocean (ESRI)": layerEsri,
            // "Alidade Dark Map" : layerDark,
            "White (CartoDB)": layerCartoDB,
            "Default (OSM)": OpenSM
        }

        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;

            map.addLayer(layer);

            if (type === 'marker') {
                layer.bindPopup('Koordinat : ' + layer.getLatLng()).openPopup();
            }
        });

        L.control.zoom({
            position: 'topright'
        }).addTo(map);

        map.addControl(new L.Control.Fullscreen({
            position: 'topright'
        }));

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
                        fillOpacity: 0.8
                    });
                    map.fitBounds(e.target.getBounds());
                    infoGel.update(f.properties.WP_1);
                    layerclicked = layer;
                }
            });
        }

        var infoGel = L.control({
            position: 'bottomright'
        });
        infoGel.onAdd = function(map) {
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
                fillOpacity: 0.5
            };
        }

        var maritimLayer = L.featureGroup();
        maritimLayer.addTo(map);
        maritimLayer.bringToBack();

        // var geojsonLayer = new L.GeoJSON.AJAX(["https://stamarkendari.info/public/json/update/wp.php?f=wilayah_perairan"], {
        var geojsonLayer = new L.GeoJSON.AJAX(["https://test-a.bmkg.go.id/stamarkendari/public/json/update/wp.php?f=wilayah_perairan"], {
            // var geojsonLayer = new L.GeoJSON.AJAX(["https://stamarkendari.info/public/json/update/wilayah_perairan.json"], {
            style: style,
            onEachFeature: eachLayer
        }).addTo(maritimLayer);

        var vesselsIcon = L.icon({
            iconUrl: 'https://stamarkendari.info/public/img/shipicon.png',
            iconSize: [20, 20]
        })

        // var imageUrl = 'https://stamarkendari.info/public/img/cmax/<?php echo $cmax_data['cmax'] ?>';
        var imageUrl = 'https://test-a.bmkg.go.id/stamarkendari/public/img/cmax/<?php echo $cmax_data['cmax'] ?>';
        var imageBounds = [
            [-4.054906043750641 + 2.2, 122.4515682429822 - 2.2],
            [-4.054906043750641 - 2.2, 122.4515682429822 + 2.2]
        ];
        var radarOverlay = L.imageOverlay(imageUrl, imageBounds, {
            opacity: 0.8,
            pane: 'radar'
        });

        var gifUrl = 'https://test-a.bmkg.go.id/stamarkendari/public/img/cmax_gif/cmax_3hours.gif';
        var gifBounds = [
            [-4.054906043750641 + 2.2, 122.4515682429822 - 2.2],
            [-4.054906043750641 - 2.2, 122.4515682429822 + 2.2]
        ];

        var radarAnimation = L.imageOverlay(gifUrl, imageBounds, {
            opacity: 0.8,
            pane: 'radar'
        })

        var radarMarker = L.marker([-4.05657, 122.449665], {
            icon: iconBMKG,
            riseOnHover: true,
            title: "Radar Cuaca Kendari"
        }).bindPopup("Radar Cuaca Kendari");

        var satelitUrl = 'https://inderaja.bmkg.go.id/IMAGE/HIMA/H08_EH_Indonesia.png?id=<?php echo rand(100000, 999999); ?>';
        var satelitbounds = [
            [0.7893 + 19.53, 113.9213 - 23.9],
            [0.7893 - 20.95, 113.9213 + 36.11]
        ];

        // var satelitGifUrl = 'http://satelit.bmkg.go.id/IMAGE/ANIMASI/H08_EH_Indonesia_m18.gif?id=<?php echo rand(100000, 999999); ?>';
        // var satelitgifbounds = [
        //     [0.7893 + 19.53, 113.9213 - 23.9],
        //     [0.7893 - 20.95, 113.9213 + 36.11]
        // ];

        var satelitOverlay = L.imageOverlay(satelitUrl, satelitbounds, {
            opacity: 0.5,
            pane: 'radar'
        });

        // var satelitGifOverlay = L.imageOverlay(satelitGifUrl, satelitgifbounds, {
        //     opacity: 0.5,
        //     pane: 'radar'
        // });

        var usrLoc = L.control.locate({
            position: 'bottomright',
            strings: {
                title: 'Tunjukan Lokasi Saya'
            },
            flyTo: true,
            initialZoomLevel: 13
        });

        var fishGroup = L.featureGroup();

        <?php foreach ($fishinawisdata['features'] as $ikan) { ?>
            var currentFish = L.marker([<?php echo $ikan['geometry']['coordinates'][1] . "," . $ikan['geometry']['coordinates'][0]; ?>], {
                    icon: iconFish,
                    riseOnHover: true,
                    title: "<?php echo $ikan['geometry']['coordinates'][1] . "," . $ikan['geometry']['coordinates'][0] ?>"
                })
                .addTo(fishGroup)
                .bindPopup("<?php echo $ikan['geometry']['coordinates'][1] . "," . $ikan['geometry']['coordinates'][0] ?>");
        <?php } ?>

        var vesselGroup = L.featureGroup();
        vesselGroup.addTo(map);

        var portsIcon = L.icon({
            iconUrl: 'https://stamarkendari.info/public/img/anchor-solid.svg',
            iconSize: [30, 30]
        })
        var portGroup = L.featureGroup()
        // portGroup.addTo(map);

        <?php foreach ($vessels as $vessel) { ?>
            var currentVessel = L.marker([<?php echo $vessel->latitude . "," . $vessel->longitude; ?>], {
                icon: vesselsIcon,
                riseOnHover: true,
                title: "<?php echo $vessel->name; ?>",
                rotationAngle: "<?php echo $vessel->course; ?>"
            }).addTo(vesselGroup).bindPopup("<?php echo "<table style='width: 100%; font-size:100%'>" . "<thead><tr align='center'><th colspan='3' align='center'><b>" . "<i class='fa fa-ship' aria-hidden='true'> </i>" . " " . $vessel->name . "</b></th></tr></thead>" . "<tbody>" . "<tr><td>Koordinat</td><td>:</td><td>" . $vessel->latitude . ", " . $vessel->longitude . "</td></tr>" . "<tr><td>Kecepatan</td><td>:</td><td>" . $vessel->speed . " knot" . "</td><tr>" . "<tr><td>MMSI</td><td>:</td><td>" . $vessel->mmsi . "</td></tr>" . "<tr><td>Course</td><td>:</td><td>" . $vessel->course . "</td></tr>" . "<tr><td>Time Received</td><td>:</td><td>" . $vessel->servertime . "</td><tr>" . "</tbody>" . "</table>"; ?>")
        <?php } ?>

        // var vURL = 'https://pertaminaport.com/sl_ppi_dashboard/last_positions';


        for (const [key, value] of Object.entries(cupel_json_code)) {
            var cupelurl = cupelUrl(key)
            var cupel = $.ajax({
                url: cupelurl,
                async: false,
            }).responseJSON;
            var cupelMarker = L.marker([cupel['latitude'], cupel['longitude']], {
                    icon: portsIcon,
                    riseOnHover: true,
                    title: cupel['name']
                })
                .addTo(portGroup)
                .bindPopup("Pelabuhan " + cupel['name']);
        }

        function cupelUrl(pid) {
            var url = cupel_json_code[pid]
            // console.log(url)
            return url
        }

        <?php $radartext = $cmax_data['cmax'];
        $cmax_data_text = substr($radartext, 0, -29); ?>

        L.Control.textbox = L.Control.extend({
            onAdd: function(map) {
                var text = L.DomUtil.create('div', 'cmax_text');
                text.innerHTML = "Radar Data : <?php echo $cmax_data_text ?>";
                return text;
            },
            onRemove: function(map) {
                //
            }
        });

        L.control.textbox = function(opts) {
            return new L.Control.textbox(opts);
        };
        L.control.textbox({
            position: 'bottomleft'
        }).addTo(map);

        L.Control.botRtext = L.Control.extend({
            onAdd: function(map) {
                var text = L.DomUtil.create('div');
                text.id = "cred_text";
                text.innerHTML = "Vessels Data : <a href='https://pertaminaport.com/vrpm-map'>VRPM Pertamina Port</a>";
                return text;
            },
            onRemove: function(map) {
                //
            }
        });

        L.control.botRtext = function(opts) {
            return new L.Control.botRtext(opts);
        };
        var vesseltext = L.control.botRtext({
            position: 'bottomright'
        }).addTo(map);

        L.Control.Gambar = L.Control.extend({
            onAdd: function(map) {
                var img = L.DomUtil.create('img', 'legend');
                img.src = 'https://stamarkendari.info/public/img/reflektivitas-awan-white.png';
                // img.style.width = '50%';
                // img.style.maxWidth = '130px';
                // img.style.maxHeight = 'auto';
                // img.style.opacity = '0.8';
                return img;
            },
            onRemove: function(map) {}
        });
        L.control.gambar = function(opts) {
            return new L.Control.Gambar(opts);
        };
        var radarLegend = L.control.gambar({
            position: 'bottomleft'
        }).addTo(map);

        L.Control.cumarLegend = L.Control.extend({
            onAdd: function(map) {
                var img = L.DomUtil.create('img');
                img.src = 'https://stamarkendari.info/public/img/catGelombang.png';
                img.style.width = '50%';
                img.style.maxWidth = '130px';
                img.style.maxHeight = 'auto';
                img.style.opacity = '0.95';
                return img;
            },
            onRemove: function(map) {}
        });
        L.control.cumarlegend = function(opts) {
            return new L.Control.cumarLegend(opts);
        };

        var radarGroup = L.layerGroup([radarOverlay, radarMarker]);
        radarGroup.addTo(map);

        var radarAnim = L.layerGroup([radarAnimation, radarMarker])


        var layersGroup = {
            "Perairan": geojsonLayer,
            "Ports": portGroup,
            "Vessels": vesselGroup,
            "Radar": radarGroup,
            "Radar 3 Hours": radarAnim,
            "Satelit": satelitOverlay,
            // "Satelit 3 Hours": satelitGifOverlay,
            "Fishing Ground": fishGroup
        }

        var layerControl = L.control.layers(baseMaps, layersGroup).addTo(map);
        drawControl.addTo(map);

        var scale = L.control.scale({
            position: 'bottomright'
        });
        scale.addTo(map);

        usrLoc.addTo(map);

        infoGel.addTo(map);

        L.LogoControl = L.Control.extend({
            options: {
                position: 'topleft'
                //control position - allowed: 'topleft', 'topright', 'bottomleft', 'bottomright'
            },
            onAdd: function(map) {
                var container = L.DomUtil.create('div');
                var button = L.DomUtil.create('a', '', container);
                button.innerHTML = '<img width="80%" style="max-width:700px" class="logo-control-img" src="{{ url('img/kdi-display-kendari-ptm.png') }}">';
                L.DomEvent.disableClickPropagation(button);
                container.title = "Logo BMKG - Pertamina";
                return container;
            },
        });

        new L.LogoControl().addTo(map);

        currentVessel.on("mouseover", function(event) {
            event.target.openPopup();
        });

        map.on("overlayadd", function(event) {
            if (event.name === 'Radar') {
                radarLegend.addTo(map);
                radarAnim.remove();
            }
            if (event.name === 'Perairan') {
                infoGel.addTo(map);
            }
            if (event.name === 'Vessels') {
                vesseltext.addTo(map);
            }
            if (event.name === 'Radar 3 Hours') {
                radarOverlay.remove();
            }
            if (event.name === 'Satelit 3 Hours') {
                satelitOverlay.remove();
            }
        });

        map.on("overlayremove", function(event) {
            if (event.name === 'Radar') {
                radarLegend.remove();
            }
            if (event.name === 'Perairan') {
                infoGel.remove();
            }
            if (event.name === 'Vessels') {
                vesseltext.remove();
            }
            if (event.name === 'Radar 3 Hours') {
                radarOverlay.addTo(map);
            }
            if (event.name === 'Satelit 3 Hours') {
                satelitOverlay.addTo(map);
            }
        });
    </script>

@endsection