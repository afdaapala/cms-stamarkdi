@extends('frontend.layout.master')

@section('content')
    <section id="berita" class="berita  bg-light text-dark">
            <div class="container">
                 <!-- ======= Berita  Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
  
          <div class="row g-5">
  
            <div class="col-lg-8">
  
              <article class="blog-details">
  
                <div class="post-img">
                  <img src="{{url('/storage/'.$post->cover)}}" alt="" class="img-fluid">
                </div>
  
                <h2 class="title">{{$post->title}}</h2>
  
                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">{{$post->user->name}}</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">{{$post->created_at}}</time></a></li>
                   
                  </ul>
                </div><!-- End meta top -->
  
                <div class="content ">
                    {{$post->desc}}
                 
                </div><!-- End post content -->
  
             
  
              </article><!-- End blog post -->
  
          
  
            
  
            </div>
  
            <div class="col-lg-4">
  
              <div class="sidebar">
  
               
  
               
  
                <div class="sidebar-item recent-posts">
                  <h3 class="sidebar-title">Recent Posts</h3>
  
                  <div class="mt-3">
                    @foreach ($recentPost as $p)
                    <div class="post-item mt-3">
                      <img src="{{url('/storage/'.$p->cover)}}" alt="">
                      <div>
                        <h4><a href="{{url('/berita/'.$p->slug)}}">{{$p->title}}</a></h4>
                        <time datetime="2020-01-01">{{$p->created_at}}</time>
                      </div>
                    </div><!-- End recent post item-->
                    @endforeach
                   

                  
                  </div>
  
                </div><!-- End sidebar recent posts-->
  
               
  
              </div><!-- End Berita Sidebar -->
  
            </div>
          </div>
  
        </div>
      </section><!-- End Berita Section -->
            </div>
    </section>
@endsection