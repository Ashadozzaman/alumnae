@extends('layouts.front.master')
@section('title','Contact Page') 
@section('content')
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Profile</h2>
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li>Profile</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team ">
      <div class="container">
        <div class="row">
	          <div class="col-md-3 mb-3 text-center" style="font-family: bootstrap-icons;font-weight: bold;">
              <img src="{{asset('/')}}images/user/{{(auth()->user()->image)?auth()->user()->image:'avatar-1.jpg'}}" class="img-fluid w-100" alt="">
              <label>Name: {{$user->full_name}}({{$user->passing_year}})</label><br>
              <label>Phone Number:{{$user->phone_number}}</label>
	          </div>
            <div class="col-md-9">
              <form action="{{route('profile.details.update',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card">
                    <div class="card-header">
                        <label>Required Information</label>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="useremail">Full Name<sup><b>*</b></sup></label>
                                <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name',$user->full_name) }}" required autocomplete="full_name" autofocus>

                                @error('full_name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="useremail">Username<sup><b>*</b></sup></label>
                                
                                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name',$user->user_name) }}" required autocomplete="user_name" autofocus>
                                @error('user_name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-12">
                            <p class="text-danger notice">Email or Phone Number must be needed (ইমেল বা ফোন নম্বর অবশ্যই প্রয়োজন)</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="useremail">Email</label>
                                
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="useremail">Phone Number</label>
                                
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number',$user->phone_number) }}" required autocomplete="phone_number" autofocus>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="useremail">Passing Year<sup><b>*</b></sup></label>
                                <select class="form-control" name="passing_year" id="passing_year">
                                    <option value="">Select Year</option>
                                    @foreach($years as $year)
                                        @if($year->year === $user->passing_year)
                                        <option value="{{$year->year}}" selected="selected">{{$year->year}}</option>
                                        @else
                                        <option value="{{$year->year}}" >{{$year->year}}</option>
                                        @endif
                                    @endforeach

                                </select>
                                @error('passing_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="useremail">Permanent Address <sup><b>*</b></sup></label>
                                 <input type="text" class="form-control @error('permanent_address') is-invalid @enderror" name="permanent_address" id="permanent_address" value="{{ old('permanent_address',$user->permanent_address) }}"  >
                                @error('permanent_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header">
                      <label>Additional Information</label>
                  </div>
                  <div class="card-body">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="useremail">Current Address</label>
                                 <input type="text" class="form-control" name="current_address" value="{{ old('current_address',$user->current_address) }}"  >
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="useremail">Profile Image</label>
                                <input type="file" class="form-control" name="image"  >
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="useremail">Designation</label>
                                <input type="text" class="form-control" name="designation" value="{{ old('designation',$user->designation) }}"  >
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="useremail">Bio</label>
                                <textarea class="form-control" name="bio" rows="1">{{ old('bio',$user->bio) }}</textarea>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
              </form>
            </div>
        </div>
      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->
  <style type="text/css">
    .notice{
      font-size: 12px;
      font-weight: bold;
    }
  </style>
@endsection