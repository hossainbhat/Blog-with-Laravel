@extends('layouts.admin_layouts.admin_layout')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    @if($user->image)
                                    <img src="{{asset('uploads/images/admin_profile/'.$user->image)}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                    @else 
                                    <img src="{{asset('assets/images/avatars/avatar-2.png')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                    @endif 
                                    <div class="mt-3">
                                        <h4>{{ucfirst($user->name)}}</h4>
                                        <p class="text-secondary mb-1">{{$user->email}}</p>
                                        <p class="text-muted font-size-sm">{{$user->address}}</p>
                                        <button class="btn btn-outline-primary">Message</button>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <ul class="list-group list-group-flush">
                                   
                                  <a href="{{$user->twitter}}" target="__blanck">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                                        <span class="text-secondary">@codervent</span>
                                    </li>
                                  </a>
                                  <a href="{{$user->instagram}}" target="__blanck">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                        <span class="text-secondary">codervent</span>
                                    </li>
                                    </a>
                                    <a href="{{$user->facebook}}" target="__blanck">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                                        <span class="text-secondary">codervent</span>
                                    </li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered mb-0">
									<tbody class="text-center">
                                        <tr>
											<th colspan="2"><h4 class="text-info">User Information</h4></th>
										</tr>
										<tr>
											<th width="50%">Full Name</th>
											<td>{{ucfirst($user->name)}}</td>
										</tr>
										<tr>
											<th width="50%">Email</th>
											<td>{{$user->email}}</td>
										</tr>
										<tr>
											<th width="50%">Mobile</th>
											<td>{{$user->mobile}}</td>
										</tr>
                                        <tr>
											<th width="50%">Address</th>
											<td>{{$user->address}}</td>
										</tr>
                                        <tr>
											<th width="50%">City</th>
											<td>{{ucfirst($user->city)}}</td>
										</tr>
                                        <tr>
											<th width="50%">Zipcode</th>
											<td>{{$user->zipcode}}</td>
										</tr>
                                        <tr>
											<th width="50%">Country</th>
											<td>{{$user->country}}</td>
										</tr>
                                        <tr>
											<th width="50%">Bio</th>
											<td>{{ucfirst($user->note)}}</td>
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