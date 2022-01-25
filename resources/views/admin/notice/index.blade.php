@extends('layouts.admin.master')
@section('title','Notice List') 
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
            <h4 class="page-title mb-0 font-size-18">Notice List</h4>

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
                    <h4 class="col-md-10">Notice List</h4>
                    <a href="{{route('notice.create')}}" class="btn btn-primary btn-sm ml-10"><i class="fa fa-plus"></i>Notice notice</a>
                </div>
                <br>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    	@foreach($notices as $key=>$notice)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{ Str::limit($notice->notice_title, 20) }}</td>
                            <td>{{ Str::limit($notice->notice_description, 20) }}</td>
                            <td>
                                <img src="{{asset('/')}}images/notices/{{$notice->notice_image}}" style="width: 80px;">
                            </td>
                            <td>
                                @if($notice->published_status == 1)
                                <button class="btn btn-sm btn-success">Published</button>
                                @else
                                <button class="btn btn-sm btn-danger">Un-Published</button>
                                @endif

                            </td>
                            <td>
                                <div class="d-flex">
                            	<a href="{{ route('notice.edit',$notice->id)}}" class="fa fa-edit" style="margin-right: 10px"></a>

                                <form action="{{ route('notice.destroy',$notice->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="fa fa-trash delete-button" onclick="return confirm('Are you sure you want to delete this item?')"></button>
                                </form>
                                </div>
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