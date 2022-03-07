@extends('layouts.admin')

@section('content')

<div class="page-wrapper">
    <div class="page-content">

        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h6 class="mb-0 text-uppercase">User Registation</h6>
                <a style="float: right; margin-top: -30px;" href="{{route('users.index')}}"><button type="button" class="btn btn-outline-success btn-sm">User List<i class="fadeIn animated bx bx-list-ol"></i></button></a>

                <hr>
                <div class="card">
                    <div class="card-body">
                        <div class="p-4 border rounded">
                           
                            <form class="row g-3 needs-validation" action="{{route('users.update',$user->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="col-md-6">
                                    <label for="name" class="form-label"> Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="{{$user->name}}">
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"  placeholder="Enter Email" value="{{$user->email}}">
                                </div>
                                <div class="col-md-12">
                                    <label for="birth_date" class="form-label">Birth of Date</label>
                                    <input type="date" name="birth_date" class="form-control" id="birth_date" value="{{$user->birth_date}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="city" class="form-label">City</label>
                                    <input type="city" name="city" class="form-control" id="city" required=""  placeholder="Enter city" value="{{$user->city}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="country" name="country" class="form-control" id="country" required=""  placeholder="Enter country" value="{{$user->country}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" autocomplete="off"  placeholder="Enter Password">
                                </div>
                                <div class="col-md-6">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" autocomplete="off" id="password_confirmation"  placeholder="Enter Confirm Password">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="Active" {{ $user->status == 'Active' ? 'checked' : ''}}> Active
                                    <input class="form-check-input" type="radio" name="status" id="status" value="InActive" {{ $user->status == 'InActive' ? 'checked' : ''}}> InActive                               
                                 </div>
                                <div class="col-12">
                                    <button class="btn btn-outline-success" type="submit">Update</button>
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