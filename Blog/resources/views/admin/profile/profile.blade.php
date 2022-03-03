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
                               
                                <table class="table table-bordered mb-0">
									
									<tbody>
										<tr>
											<th width="40%" class="text-center">User Role</th>
											<td class="text-center"><span class="badge bg-success">wen designer</span></td>
										</tr>
                                        <tr>
											<th width="40%" class="text-center">Full Name</th>
											<td class="text-center">{{ Auth::user()->name }}</td>
										</tr>
										<tr>
											<th width="40%" class="text-center">Eamil</th>
											<td class="text-center">{{ Auth::user()->email }}</td>
										</tr>
                                        <tr>
											<th width="40%" class="text-center">Mobile</th>
											<td class="text-center">{{ Auth::user()->mobile }}</td>
										</tr>
                                        <tr>
											<th width="40%" class="text-center">Address</th>
											<td class="text-center">{{ Auth::user()->address }}</td>
										</tr>
                                        <tr>
											<th width="40%" class="text-center">City</th>
											<td class="text-center">{{ Auth::user()->city }}</td>
										</tr>
                                        <tr>
											<th width="40%" class="text-center">Zipcode</th>
											<td class="text-center">{{ Auth::user()->zipcode }}</td>
										</tr>
                                        <tr>
											<th width="40%" class="text-center">Country</th>
											<td class="text-center">{{ Auth::user()->country }}</td>
										</tr>
                                        <tr>
											<th width="40%" class="text-center">Image</th>
											<td class="text-center">
                                                @if(Auth::user()->image)
                                                <img class="rounded-circle p-1 bg-primary" src="{{asset('uploads/images/admin_profile/'.Auth::user()->image)}}" alt="">
                                                @else 
                                                <img class="rounded-circle p-1 bg-primary" src="{{asset('assets/images/avatars/avatar-2.png')}}" alt="">
                                                @endif 
                                            </td>
										</tr>
                                        <tr>
                                            <td colspan="2" class="text-center">
                                                <a href="{{route('admin.changepassword')}}"><button type="button" class="btn btn-warning btn-sm ">Change Password</button></a> 
                                               <a href="{{route('admin.profile.edit')}}"><button type="button" class="btn btn-primary btn-sm ">Edit</button></a> 
                                            </td>
                                        </tr>
									</tbody>
								</table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection