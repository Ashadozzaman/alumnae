@extends('layouts.admin.master')
@section('title','User Update') 
@section('custome-css')
@endsection
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">User Update</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Welcome to Admin Section</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="user-title row">
                    <h4 class="col-md-10">User Update</h4>
                    <a href="{{route('users.index')}}" class="btn btn-primary btn-sm col-md-2"><i class="fa fa-arrow-left"></i> User List</a>
                </div>
                <br>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card">
                        <div class="card-header">
                            <label>Required Information</label>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
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
                            <div class="col-md-6">
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
                                <p class="text-success notice">Email or Phone Number must be needed (ইমেল বা ফোন নম্বর অবশ্যই প্রয়োজন)</p>
                            </div>
                            <div class="col-md-6">
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
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="useremail">Password<sup><b>*</b></sup></label>
                                    
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"   autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="useremail">Confirm Password<sup><b>*</b></sup></label>
                                    
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"   autocomplete="new-password">
                                </div>

                            </div>
                            <div class="col-md-6">
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
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="useremail">Current Address</label>
                                     <input type="text" class="form-control" name="current_address" value="{{ old('current_address',$user->current_address) }}"  >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="useremail">Profile Image</label>
                                    <input type="file" class="form-control" name="image"  >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="useremail">Designation</label>
                                    <input type="text" class="form-control" name="designation" value="{{ old('designation',$user->designation) }}"  >
                                </div>
                            </div>
                            <div class="col-md-6">
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
        <!-- end card -->
    </div>
</div>
<!-- end row -->
@endsection
@section('custome-js')

@endsection