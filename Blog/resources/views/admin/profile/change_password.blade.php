@extends('layouts.admin_layouts.admin_layout')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
     
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    @include('admin.profile.profile_sitebar')
                    <div class="col-lg-8">
                        @if(Session::has('success_message'))
                        <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                            <div class="text-white"> {{Session::get('success_message')}}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if(Session::has('error_message'))
                        <div class="alert alert-dander border-0 bg-danger alert-dismissible fade show">
                            <div class="text-white"> {{Session::get('error_message')}}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                            <form action="{{route('admin.update.password')}}" method="post">
                                @csrf 
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Current Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" class="form-control" name="current_pwd" id="current_pwd" placeholder="Enter current password">
                                        <span id="chkPwd"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">New Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" class="form-control" name="new_pwd" id="new_pwd" placeholder="Enter new password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Confirm new Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" class="form-control" name="confirm_pwd" id="confirm_pwd" placeholder="Enter confirm new passwoed">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <button type="submit" class="btn btn-outline-primary px-5">Update</button>                                    
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection