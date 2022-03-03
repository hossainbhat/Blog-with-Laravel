@extends('layouts.admin_layouts.admin_layout')
@section('content')
<div class="page-wrapper">
    <div class="page-content">

        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h6 class="mb-0 text-uppercase">Create User Role</h6>
                <a style="float: right; margin-top: -30px;" href="{{route('users.index')}}"><button type="button" class="btn btn-outline-success btn-sm">User List<i class="fadeIn animated bx bx-list-ol"></i></button></a>

                <hr>
                <div class="card">
                    <div class="card-body">
                        <div class="p-4 border rounded">
                           
                            <form class="row g-3 needs-validation" novalidate="" action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <label for="name" class="form-label"> Name</label>
                                    <input type="text" name="name" class="form-control" id="name" required="" placeholder="Enter Name">
                                </div>
                                
                                <div class="col-md-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" required=""  placeholder="Enter Email">
                                </div>
                                <div class="col-md-12">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" required=""  placeholder="Enter Password">
                                </div>
                                <div class="col-md-12">
                                    <label for="name" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required=""  placeholder="Enter Confirm Password">
                                </div>
                                
                                 <div class="col-md-12">
                                    
									<div class="mb-3">
										<label class="form-label">Assign Roles</label>
										<select class="multiple-select" name="roles[]" id="roles"  data-placeholder="Choose anything" multiple="multiple">
											<option value="" disabled>Select one</option>
                                            @foreach($roles as $role)
											    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
										</select>
									</div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-outline-primary" type="submit">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!--end row-->
    </div>
</div>
@endsection
@section('js')
<script>
    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
    $('.multiple-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
</script>
@endsection