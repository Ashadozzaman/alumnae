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
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Tiket List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Welcome to Admin Section</li>
                </ol>
            </div>

        </div>
    </div>
</div>
@include('_message')
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="user-title row">
                    <h4 class="col-md-10">Tiket List</h4>
                    <!-- <a href="" class="btn btn-primary btn-sm ml-10"><i class="fa fa-plus"></i>Add User</a> -->
                </div>
                <br>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Alumni</th>
                            <th>Year</th>
                            <th>Amount</th>
                            <th>Details</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    	@foreach($tikets as $key=>$tiket)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                {{$tiket->user->user_name}}<br>
                                N-{{$tiket->user->phone_number}}
                            </td>
                            <td>{{$tiket->user->passing_year}}</td>
                            <td>
                                {{$tiket->amount}}<br>
                                @if($tiket->payment_by == 'cash')
                                <strong>Cash on Hand</strong>
                                @elseif($tiket->payment_by == 'bkash')
                                <strong>Bkash</strong>
                                @elseif($tiket->payment_by == 'bank')
                                <strong>Bank</strong>
                                @endif
                            </td>
                            <td>
                                @if($tiket->payment_by == 'cash')
                                <strong>Reciver:</strong> {{$tiket->paymet_reciver_name}}<br>
                                <strong>Number:</strong> {{$tiket->paymet_reciver_number}}
                                @elseif($tiket->payment_by == 'bkash')
                                <strong>Bkash TID:</strong> {{$tiket->bkash_transaction_id}}<br>
                                <strong>3 DIGIT:</strong> {{$tiket->bkash_three_digit}}
                                @elseif($tiket->payment_by == 'bank')
                                <strong>Bank TID:</strong> {{$tiket->bank_transaction_id}}<br>
                                <strong>Bank:</strong> {{$tiket->bank_name}}
                                @endif
                            </td>
                            <td>{{$tiket->date}}</td>
                            <td>
                                @if($tiket->status == 0)
                                <a href="{{route('tiket.approved',$tiket->id)}}" class="btn btn-primary btn-sm">Approved</a>
                                <a href="{{route('tiket.approved',$tiket->id)}}" class="btn btn-warning btn-sm">Reject</a>
                                @elseif($tiket->status == 1)
                                <!-- <button class="btn btn-success btn-sm">Done</button> -->
                                <a href="{{route('tiket.download',$tiket->id)}}" class="btn btn-warning btn-sm">Download</a>
                                @endif
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<style>
    .delete-button{
        border: none;
        color: #6363cd;
        background: none;
        margin-right: 35px;
    }
</style>
<!-- end row -->
<!-- end row -->
@endsection
@section('custome-js')

    <!-- Required datatable js -->
    <script src="{{asset('/')}}assets/admin/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('/')}}assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="{{asset('/')}}assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('/')}}assets/admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('/')}}assets/admin/libs/jszip/jszip.min.js"></script>
    <script src="{{asset('/')}}assets/admin/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{asset('/')}}assets/admin/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{asset('/')}}assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('/')}}assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('/')}}assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="{{asset('/')}}assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('/')}}assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="{{asset('/')}}assets/admin/js/pages/datatables.init.js"></script>
@endsection