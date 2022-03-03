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
                      
                        <div class="card">
                            <div class="card-body">
                            <form action="{{route('admin.profile.edit')}}" method="post" enctype="multipart/form-data">
                                @csrf 
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="mobile" placeholder="Enter mobile" value="{{ Auth::user()->mobile }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="address" placeholder="Enter address" value="{{ Auth::user()->address }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">City</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="city" placeholder="Enter city" value="{{ Auth::user()->city }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Zipcode</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="zipcode" placeholder="Enter name" value="{{ Auth::user()->zipcode }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Country</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="country" placeholder="Enter country" value="{{ Auth::user()->country }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Facebook</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="facebook" placeholder="Enter facebook" value="{{ Auth::user()->facebook }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Twitter</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="twitter" placeholder="Enter twitter" value="{{ Auth::user()->twitter }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Instagram</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="instagram" placeholder="Enter instagram" value="{{ Auth::user()->instagram }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Image</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                                <div class="text-center p-2">
                                    @if(Auth::user()->image)
                                    <img src="{{asset('uploads/images/admin_profile/'.Auth::user()->image )}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="80">
                                    <a class="confirmDelete" record="profile-image" recoedid="{{ Auth::user()->id }}" href="javascript:void('0')"><i class="btn btn-danger btn-sm fadeIn animated bx bx-trash-alt"></i></a>
                                    @else 
                                    <img src="{{asset('assets/images/avatars/avatar-2.png')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="80">
                                    @endif 
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