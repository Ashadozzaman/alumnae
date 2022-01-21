@extends('layouts.front.master')
@section('title','Contact Page') 
@section('content')
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Alumnae</h2>
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li>Alumnae</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team ">
      <div class="container">

        @foreach($users_array as $key => $value)
        <div class="row">
        	<h4> Passing Year: {{$value['passing_year']}}</h4>
        	@foreach($value['users_year_wise'] as $key1 => $value1)
	          <div class="col-lg-6">
	            <div class="member d-flex align-items-start">
	              <div class="pic"><img src="{{asset('/')}}images/user/{{($value1['image'])?$value1['image']:'avatar-1.jpg'}}" class="img-fluid" alt=""></div>
	              <div class="member-info">
	                <h4>{{$value1['full_name']}}</h4>
	                <span>{{$value1['phone_number']}}</span>
	                <p>{{$value1['bio']}}</p>
	                <div class="social">
	                  <a href=""><i class="ri-twitter-fill"></i></a>
	                  <a href=""><i class="ri-facebook-fill"></i></a>
	                  <a href=""><i class="ri-instagram-fill"></i></a>
	                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
	                </div>
	              </div>
	            </div>
	          </div>
	         @endforeach
        </div>
        @endforeach

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->
@endsection