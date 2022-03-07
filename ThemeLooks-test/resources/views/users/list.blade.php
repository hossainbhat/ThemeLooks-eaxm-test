@extends('layouts.admin')
@section('content')

<div class="page-wrapper">
    <div class="page-content">
       
        <h6 class="mb-0 text-uppercase">User Role</h6>
        <a style="float: right; margin-top: -30px;" href="{{route('users.create')}}"><button type="button" class="btn btn-outline-success btn-sm">Register User <i class="lni lni-circle-plus"></i></button></a>
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
								<div class="text-white">{{Session::get('success_message')}}</div>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						  @endif
                            <table id="example" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date of Birth</th>
                                        <th>City</th>
                                        <th>Country</th>
                                        <th>Status</th>
                                        <th width="12%">Action</th>         
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($users as $key => $user)
                                    <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->birth_date }}</td>
                                            <td>{{ $user->city }}</td>
                                            <td>{{ $user->country }}</td>
                                            <td>
                                                @if($user['status'] =='Active')
                                                    Active 
                                                @else 
                                                    InActive
                                                @endif 
                                            </td>
                                            <td>
                                            
                                                <a href="{{route('users.edit',$user->id)}}"><i class="btn btn-outline-success btn-sm fadeIn animated bx bx-comment-edit"></i></a>
                                            
                                            
                                                <a class="confirmDelete" record="user" recoedid="{{$user->id}}" href="javascript:void('0')"><i class="btn btn-outline-danger btn-sm fadeIn animated bx bx-trash-alt"></i></a>
                                            
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
