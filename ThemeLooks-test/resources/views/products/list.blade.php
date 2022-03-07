@extends('layouts.admin')
@section('content')

<div class="page-wrapper">
    <div class="page-content">
       
        <h6 class="mb-0 text-uppercase">Product List</h6>
        <a style="float: right; margin-top: -30px;" href="{{route('products.create')}}"><button type="button" class="btn btn-outline-success btn-sm">Create Product <i class="lni lni-circle-plus"></i></button></a>
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
                                        <th>Gender</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th width="12%">Action</th>         
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($products as $key => $product)
                                    <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->gender }}</td>
                                            <td>{{ $product->color }}</td>
                                            <td>{{ $product->size }}</td>
                                            <td>{{ $product->price }}</td>
                                            
                                            <td>
                                            
                                                <a href="{{route('products.edit',$product->id)}}"><i class="btn btn-outline-success btn-sm fadeIn animated bx bx-comment-edit"></i></a>
                                            
                                            
                                                <a class="confirmDelete" record="product" recoedid="{{$product->id}}" href="javascript:void('0')"><i class="btn btn-outline-danger btn-sm fadeIn animated bx bx-trash-alt"></i></a>
                                            
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
