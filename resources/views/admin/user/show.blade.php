@extends('layouts.admin.master')
@section('title','Dasboard') 
@section('custome-css')
<!-- DataTables -->
<link href="{{asset('/')}}assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('/')}}assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{asset('/')}}assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- start page title -->

 <!-- start page title -->
<div class="row">
<div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
        <h4 class="page-title mb-0 font-size-18">Profile</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">User List</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </div>

    </div>
</div>
</div>
<!-- end page title -->

<!-- start row -->
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="profile-widgets py-4">

                    <div class="text-center">
                        <div class="">
                            @if($user->image)
                            <img src="{{asset('/')}}images/user/{{$user->image}}" alt="" class="avatar-lg mx-auto img-thumbnail rounded-circle " style="width:150px;height: 150px;">
                            @else
                            <img src="{{asset('/')}}assets/admin/images/users/avatar-2.jpg" alt="" class="avatar-lg mx-auto img-thumbnail rounded-circle"  style="width:150px;height: 150px;">
                            @endif
                        </div>

                        <div class="mt-3 ">
                            <a href="#" class="text-dark font-weight-medium font-size-16">{{$user->full_name}}</a>
                            <p class="text-body mt-1 mb-1">{{$user->designation}}</p>
                        </div>

                        <div class="mt-4">

                            <ui class="list-inline social-source-list">
                                <li class="list-inline-item">
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle">
                                                <i class="mdi mdi-facebook"></i>
                                            </span>
                                    </div>
                                </li>

                                <li class="list-inline-item">
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-info">
                                                <i class="mdi mdi-twitter"></i>
                                            </span>
                                    </div>
                                </li>

                                <li class="list-inline-item">
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-danger">
                                            <i class="mdi mdi-google-plus"></i>
                                        </span>
                                    </div>
                                </li>

                                <li class="list-inline-item">
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-pink">
                                            <i class="mdi mdi-instagram"></i>
                                        </span>
                                    </div>
                                </li>
                            </ui>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Personal Information</h5>

                <p class="card-title-desc">
                    {{$user->bio}}
                </p>

                <div class="mt-3">
                    <p class="font-size-12 text-muted mb-1">Email Address</p>
                    <h6 class="">{{$user->email}}</h6>
                </div>

                <div class="mt-3">
                    <p class="font-size-12 text-muted mb-1">Phone number</p>
                    <h6 class="">{{$user->phone_number}}</h6>
                </div>

                <div class="mt-3">
                    <p class="font-size-12 text-muted mb-1">Permanent Address</p>
                    <h6 class="">{{$user->permanent_address}}</h6>
                </div>
                <div class="mt-3">
                    <p class="font-size-12 text-muted mb-1">Current Address</p>
                    <h6 class="">{{$user->current_address}}</h6>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4">
         <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-8">
                        <p class="mb-2">Passing Year</p>
                        <h4 class="mb-0">{{$user->passing_year}} </h4>
                    </div>
                </div>
            </div>
        </div>
         <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-8">
                        <p class="mb-2">Tiket Amount</p>
                        <h4 class="mb-0">{{$user->tiket_amount}} ৳</h4>
                    </div>
                </div>
            </div>
        </div>
         <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-8">
                        <p class="mb-2">Tiket Status</p>
                        @if($user->tiket_status == 0)
                            <button class="btn btn-sm btn-danger">Pending</button>
                        @else
                        <a href="{{route('tiket.download',$tiket->id)}}" class="btn btn-warning btn-sm">Download</a>
                        @endif
                        {{--<a href="{{route('tiket.generate',$user->id)}}" class="btn btn-sm btn-primary mt-2">Tiket Generate</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custome-js')
@endsection