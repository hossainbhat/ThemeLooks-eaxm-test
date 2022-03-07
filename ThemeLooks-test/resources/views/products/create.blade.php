@extends('layouts.admin')

@section('content')

<div class="page-wrapper">
    <div class="page-content">

        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h6 class="mb-0 text-uppercase">Create Product</h6>
                <a style="float: right; margin-top: -30px;" href="{{route('products.index')}}"><button type="button" class="btn btn-outline-success btn-sm">Product List<i class="fadeIn animated bx bx-list-ol"></i></button></a>

                <hr>
                <div class="card">
                    <div class="card-body">
                        <div class="p-4 border rounded">
                           
                            <form class="row g-3 needs-validation" action="{{route('products.store')}}" method="post">
                                @csrf
                                <div class="col-md-12">
                                    <label for="name" class="form-label"> Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="gender" class="form-label">Gender</label>
                                    <input type="text" name="gender" class="form-control" id="gender"  placeholder="Enter gender" >
                                </div>
                                <div class="col-md-6">
                                    <label for="color" class="form-label">Color</label>
                                    <input type="text" name="color" class="form-control" id="color" >
                                </div>
                                <div class="col-md-6">
                                    <label for="size" class="form-label">size</label>
                                    <input type="text" name="size" class="form-control" id="size" placeholder="Enter size" >
                                </div>
                                <div class="col-md-6">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" name="price" class="form-control" id="price" placeholder="Enter price">
                                </div>
                               
                                <div class="col-12">
                                    <button class="btn btn-outline-success" type="submit">Create</button>
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