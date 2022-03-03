@extends('layouts.admin_layouts.admin_layout')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
       
        <h6 class="mb-0 text-uppercase">Permission List</h6>
        <a href="{{route('rolse.create')}}"  class="btn btn-outline-success btn-sm " style="float: right;margin-top:-20px;">Create Parmission<i class="fadeIn animated bx bx-plus-circle"></i></a>
        <hr>
        <div class="card">
            <div class="card-body">
                {{-- table-responsive --}}
                <div class="">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap5">
                       
                    <div class="row">
                        <div class="col-sm-12">
                            @if(Session::has('success_message'))
                            <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                                <div class="text-white"> {{Session::get('success_message')}}</div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <table id="example" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th width="10%">SL#</th>
										<th width="15%">Name</th>
										<th height="40px;">Permissions</th>
                                       
										<th width="10%">Modify</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($roles as $key=> $role)
                                    <tr>
										<td>{{$key+1}}</td>
										<td>{{$role['name']}}</td>
										<td>
											@foreach(@$role->permissions as $perm)
                                            <span class="badge bg-primary">{{ $perm->name }}</span>
											@endforeach
										</td>
                                      
										<td>
											<a href="{{ route('rolse.edit', $role->id) }}"><i class="btn btn-outline-success btn-sm fadeIn animated bx bx-comment-edit"></i></a>  

											<a class="confirmDelete" record="role" recoedid="{{$role->id}}" href="javascript:void('0')"><i class="btn btn-outline-danger btn-sm fadeIn animated bx bx-trash-alt"></i></a>
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