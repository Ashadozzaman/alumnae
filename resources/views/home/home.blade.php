@extends('layouts.front.master')
@section('title','Home Page') 
@section('content')
  <!-- ======= Hero Section ======= -->
  @include('home.slider')
  <!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="row content">
          <div class="col-lg-6">
            <!-- <h2>Eum ipsam laborum deleniti velitena</h2>
            <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee trave</h3> -->
            <img width="96%" src="{{asset('/')}}assets/front/img/slide/50yearbanner.jpg">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              It was a very special day for the whole school. It was the 50th anniversary of our school, it's been half a century of the foundation of the school. So it’s the celebration time. Everyone was very much excited. Many preparations were started even a year ago like preparation of banners, stage renovation painting the school and many more.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Chief guest arrived, cut the cake and the events started.</li>
              <li><i class="ri-check-double-line"></i> On the day of the event, everything was getting prepared, there was a dinner also on that same night.</li>
              <li><i class="ri-check-double-line"></i>Then the cultural events started and all the students excitedly performed the program. </li>
            </ul>
            <p class="fst-italic">
              All the programs were well executed and performed. Then everyone proceeded to the dining hall and the dinner was very delicious. Then the guests return back to their homes and this is how the school celebrated the golden jubilee function.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row">

        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Services Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">
        <div class="row">

          <div class="col-lg-6">
            <div class="testimonial-item">
                <img class="testimonial-img" src="{{asset('/')}}assets/front/img/testimonials/demo.png">
              <h3>Saul Goodman</h3>
              <h4>Headmaster</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                The principal announced two-three months beyond the event. Teachers and students started preparation for the program.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="testimonial-item">
                <img class="testimonial-img" src="{{asset('/')}}assets/front/img/testimonials/demo.png">
              <h3>Saul Goodman</h3>
              <h4>Assistant Headmaster</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                The principal announced two-three months beyond the event. Teachers and students started preparation for the program.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="testimonial-item">
                <img class="testimonial-img" src="{{asset('/')}}assets/front/img/testimonials/demo-female.jpg">
              <h3>Saul Goodman</h3>
              <h4>Successfull Alumni Speeches</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                The principal announced two-three months beyond the event. Teachers and students started preparation for the program.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="testimonial-item">
                <img class="testimonial-img" src="{{asset('/')}}assets/front/img/testimonials/demo.png">
              <h3>Saul Goodman</h3>
              <h4>Successfull Alumni Speeches</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                The principal announced two-three months beyond the event. Teachers and students started preparation for the program.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->
@endsection