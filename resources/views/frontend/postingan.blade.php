@extends('frontend.layout.pages')

@section('content')
<section id="postingan" class="postingan bg-light text-dark">
    <div class="container">
        <h1>Berita</h1>

        @foreach ($recentPost as $p)
                    <div class="mb-5 mt-3 row">
                        <div class="col-3">
                            <img src="{{url('/storage/'.$p->cover)}}" alt="" style="max-height: 300px; max-width: 100%">
                        </div>
                        <div class="col">
                            <h2><a href="{{url('/berita/'.$p->slug)}}">{{$p->title}}</a></h2>
                            <h5>Oleh : {{ $p->user->name }}</h5>
                            <time datetime="2020-01-01">{{$p->created_at}}</time>
                            <p class="post-desc">{{ $p->desc }}</p>
                            <h6><a href="{{url('/berita/'.$p->slug)}}">[ ...baca selengkapnya ]</a></h6>
                        </div>
                    </div>
                    <!-- End recent post item-->
        @endforeach

@endsection

@section('custom-script')

@endsection