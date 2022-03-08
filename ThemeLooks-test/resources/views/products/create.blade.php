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
                            @if ($errors->any())
                            <div class="alert alert-danger" style="margin-top: 10px;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                </div>
                            @endif
                            
                            <form class="row g-3 needs-validation" action="{{route('products.store')}}" method="post">
                                @csrf
                                <div class="col-md-12">
                                    <label for="name" class="form-label"> Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
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