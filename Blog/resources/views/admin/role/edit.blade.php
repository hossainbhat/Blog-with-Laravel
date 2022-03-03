@extends('layouts.admin_layouts.admin_layout')
@section('content')
<div class="page-wrapper">
    <div class="page-content">

        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h6 class="mb-0 text-uppercase">Edit Permission</h6>
                <a style="float: right; margin-top: -30px;" href="{{route('rolse.index')}}"><button type="button" class="btn btn-outline-success btn-sm">Parmission List<i class="fadeIn animated bx bx-list-ol"></i></button></a>

                <hr>
                <div class="card">
                    <div class="card-body">
                        <div class="p-4 border rounded">
                           
                            <form class="row g-3 needs-validation" novalidate="" action="{{ route('rolse.update', $role->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="col-md-12">
                                    <label for="name" class="form-label">Role Name</label>
                                    <input type="text" name="name" value="{{ $role->name }}" class="form-control" id="name" required="">
                                </div>

                                <div class="col-12">
                                    <label for="name" class="form-label">Permissions</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1" {{ App\Models\User::roleHasPermissions($role, $all_permissions) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkPermissionAll">All</label>

                                        
                                    </div>
                                    <hr>
                                    @php $i = 1; @endphp
                                    @foreach ($permission_groups as $group)
                                    <div class="row">
                                        @php
                                        $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                                        $j = 1;
                                    @endphp
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                            </div>
                                        </div>
                                        <div class="col-9 role-{{ $i }}-management-checkbox">
                                          
                                        @foreach ($permissions as $permission)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})"  name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                        @php  $j++; @endphp
                                        @endforeach
                                        </div>
                                    </div>
                                    @php  $i++; @endphp
                                    @endforeach
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-outline-primary" type="submit">Edit</button>
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
@include('admin.role.script')

@endsection