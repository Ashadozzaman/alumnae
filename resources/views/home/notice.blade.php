@extends('layouts.front.master')
@section('title','Notice Page') 
@section('content')
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Notices</h2>
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li>Notices</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
            @foreach($notices as $notice)

            <article class="entry">

              <div class="entry-img">
                <img src="{{asset('/')}}/images/notices/{{$notice->notice_image}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">{{$notice->notice_title}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{$notice->published_date}}</time></a>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  {{$notice->notice_description}}
                </p>
                <div class="read-more">
                  <!-- <a href="blog-single.html">Read More</a> -->
                </div>
              </div>

            </article><!-- End blog entry -->
            @endforeach
            <div class="blog-pagination">
              {{$notices->render()}}
            </div>

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->


              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                @foreach($notices as $notice)
                <div class="post-item clearfix">
                  <img src="{{asset('/')}}/images/notices/{{$notice->notice_image}}" alt="">
                  <h4><a href="blog-single.html">{{$notice->notice_title}}</a></h4>
                  <time datetime="2020-01-01">{{$notice->published_date}}</time>
                </div>
                @endforeach
              </div><!-- End sidebar recent posts-->

              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
  <style type="text/css">
    .blog-pagination .hidden{
      display: none;
    }
  </style>
@endsection