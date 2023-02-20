@extends('frontend.layout.pages')

@section('content')
<section id="profil" class="profil bg-light text-dark">
    <div class="container my-5">
        <section>
            <img class="center" src="{{ url('/img/stamarkendari.jpg') }}" alt="Foto Depan Kantor Stasiun Meteorologi Maritim Klas II Kendari" style="max-width: 480px;">

            <h2>Tentang Stamar Kendari</h2>
            <p>Stasiun Meteorologi Maritim Kendari didirikan pada Tahun 1998, sejak saat itu stasiun ini melaksanakan tugas pengamatan, pengelolaan data, pelayanan informasi, jasa meteorologi dan pemeliharaan alat meteorologi untuk Provinsi Sulawesi Tenggara dan wilayah perairan dari Luwuk hingga Wakatobi</p>
        </section>
        <section>
            <h2>Layanan</h2>
            <ul class="list-group">
            <li class="list-group-item">Informasi Prakiraan Cuaca</li>
            <li class="list-group-item">Permohonan Pelayanan Data Meteorologi</li>
            <li class="list-group-item">Konsultasi Pelayanan Data & Prakiraan</li>
            </ul >
        </section>
        <section>
            <h2>Kontak Kami</h2>
            <p>Email: stamar.kendari@bmkg.go.id</p>
            <p>Telepon: +62 811-4005-929</p>
            <p>Alamat: Jl. Jend. Sudirman No.158, Kota Kendari, Sulawesi Tenggara 93127</p>
        </section>
    </div>

@endsection

@section('custom-script')

@endsection