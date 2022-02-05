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
        	<h6> <b>Passing Year: {{$value['passing_year']}}</b></h6>
          <hr>
        	@foreach($value['users_year_wise'] as $key1 => $value1)
	          <div class="col-lg-2 text-center">
	            <div class="member_profile">
	              <div class="pic">
                  <img src="{{asset('/')}}images/user/{{($value1['image'])?$value1['image']:'avatar-1.jpg'}}" class="img-fluid" alt="">
                </div>
	              <div class="details" >
	                <strong>{{$value1['full_name']}}</strong><br>
                  <!-- <span>{{$value1['phone_number']}}</span> -->
	                <span>{{$value1['email']}}</span>
	              </div>
	            </div>
	          </div>
	         @endforeach
        </div>
        @endforeach

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->
  <style type="text/css">
    .member_profile{
      box-shadow: 0px 2px 15px rgb(85 98 112 / 8%);
      padding: 13px;
      border-radius: 5px;
      background: ##fbf1f1;
      margin-bottom: 5px;
    }
    .member_profile .details{
      font-size: 12px;
    }
  </style>
@endsection