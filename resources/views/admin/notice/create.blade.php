@extends('layouts.admin.master')
@section('title','Create Notice') 
@section('custome-css')
@endsection
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Create Notice</h4>

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
                    <h4 class="col-md-10">Notice User</h4>
                    <a href="{{route('users.index')}}" class="btn btn-primary btn-sm col-md-2"><i class="fa fa-arrow-left"></i> Notice List</a>
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
                <form action="{{route('notice.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <label>Notice Information</label>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="useremail">Notice Title<sup><b>*</b></sup></label>
                                    
                                    <input id="notice_title" type="text" class="form-control @error('notice_title') is-invalid @enderror" name="notice_title" value="{{ old('notice_title') }}" required autocomplete="notice_title" autofocus>

                                    @error('notice_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="useremail">Notice Description<sup><b>*</b></sup></label>
                                    
                                    <textarea id="notice_description" type="text" class="form-control @error('notice_description') is-invalid @enderror" name="notice_description" required autocomplete="notice_description" autofocus rows="5">{{ old('notice_description') }}</textarea> 

                                    @error('notice_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="useremail">Status<sup><b>*</b></sup></label>
                                    <select class="form-control" name="published_status" id="published_status">
                                        <option value="1">Published</option>
                                        <option value="0">Un-Published</option>
                                    </select>
                                    @error('published_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="useremail">Image</label>
                                    <input class="form-control" type="file" name="notice_image" id="notice_image">
                                </div>
                                
                            </div>
                        </div>
                      </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Save</button>
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