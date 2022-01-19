<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register |  Alumnae Fourm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/admin/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .notice{
            /*background: #c8e3fb;*/
            padding: 2px;
            border-radius: 4px;
            font-weight: 700;
        }
    </style>
</head>

<body>
    <div class="home-btn d-none d-sm-block">
        <a href="{{url('/')}}" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <h5 class="text-white font-size-20">Free Register</h5>
                                <p class="text-white-50 mb-0">Alumnae Register</p>
                                <a href="{{url('/')}}" class="logo logo-admin mt-4">
                                    <img src="{{asset('/')}}assets/admin/images/logo-sm-dark.png" alt="" height="30">
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">

                            <div class="p-2">
                                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                    <div class="card">
                                        <div class="card-header">
                                            <label>Required Information</label>
                                        </div>
                                      <div class="card-body">
                                          <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="useremail">Full Name<sup><b>*</b></sup></label>
                                                    
                                                    <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" autofocus>

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
                                                    
                                                    <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="useremail">Email</label>
                                                    
                                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

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
                                                    
                                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

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
                                                    
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                                                    
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="useremail">Passing Year<sup><b>*</b></sup></label>
                                                    <select class="form-control" name="passing_year" id="passing_year">
                                                        <option value="">Select Year</option>
                                                        @foreach($years as $year)
                                                            <option value="{{$year->year}}">{{$year->year}}</option>
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
                                                     <input type="text" class="form-control @error('permanent_address') is-invalid @enderror" name="permanent_address" id="permanent_address" value="{{ old('permanent_address') }}"  >
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
                                                     <input type="text" class="form-control" name="current_address" value="{{ old('current_address') }}"  >
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
                                                    <input type="text" class="form-control" name="designation" value="{{ old('designation') }}"  >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="useremail">Bio</label>
                                                    <textarea class="form-control" name="bio" rows="1"></textarea>
                                                </div>
                                            </div>
                                            
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Register</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <p class="mb-0">By registering you agree to the Skote <a href="#" class="text-primary">Terms of Use</a></p>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Already have an account ? <a href="pages-login.html" class="font-weight-medium text-primary"> Login</a> </p>
                        <p>© </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ ('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ ('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ ('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ ('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ ('assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ ('assets/js/app.js"></script>

</body>

</html>