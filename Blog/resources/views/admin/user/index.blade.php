@extends('layouts.admin_layouts.admin_layout')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
       
        <h6 class="mb-0 text-uppercase">User Role</h6>
        <a style="float: right; margin-top: -30px;" href="{{ route('users.create') }}"><button type="button" class="btn btn-outline-success btn-sm">Create User <i class="lni lni-circle-plus"></i></button></a>
        <hr>
        <div class="card">
            <div class="card-body">
                {{-- table-responsive --}}
                <div class="">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap5">
                       
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Status</th>
                                        <th>Action</th>         
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($admins as $admin)
                                    <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>
                                                @foreach ($admin->roles as $role)
                                                    <span class="badge bg-primary"> {{ $role->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if($admin->status ==1)
                                                    <a class="updateUserStatus" id="admin-{{$admin->id}}" admin_id="{{$admin->id}}" href="javascript:void(0)">Active</a>  
                                                @else
                                                    <a class="updateUserStatus" id="admin-{{$admin->id}}" admin_id="{{$admin->id}}" href="javascript:void(0)">Inactive</a>  
                                                @endif
                                            </td>
                                            <td>
                                            
                                                <a href="{{ route('users.edit', $admin->id) }}"><i class="btn btn-outline-success btn-sm fadeIn animated bx bx-comment-edit"></i></a>
                                            
                                            
                                                <a class="confirmDelete" record="user" recoedid="{{$admin->id}}" href="javascript:void('0')"><i class="btn btn-outline-danger btn-sm fadeIn animated bx bx-trash-alt"></i></a>
                                            
                                            </td>
                                        </tr>
                                    @endforeach
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