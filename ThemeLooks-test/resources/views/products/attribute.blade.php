@extends('layouts.admin')

@section('content')
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-12 mx-auto">
						<h6 class="mb-0 text-uppercase">Product Attribute</h6>                        
						<a href="{{url('admin/products')}}" style="float:right; margin-top:-30px;"><button class="btn btn-sm btn-success">Product List <i class="lni lni-list"></i></button></a>

						<hr>
						<div class="card">
							<div class="card-body">
								<div class="p-4 border rounded">
										@if(Session::has('success_message'))
											<div class="alert alert-success border-0 bg-success alert-dismissible fade show">
												<div class="text-white">{{Session::get('success_message')}}</div>
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
										@endif
										@if ($errors->any())
											<div class="alert alert-danger">
												<ul>
													@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach
												</ul>
											</div>
										@endif
									<form class="row g-3 needs-validation" action="{{route('products.add.attribute',$product->id)}}"  method="post">
                                        @csrf
                                   
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="field_wrapper">
                                                    <div>
                                                        <input  type="text" name="gender[]" id="gender" value="" placeholder="gender" style="width:22%;"/>
                                                        <input  type="text" name="color[]" required id="color" value="" placeholder="color" style="width:22%"/>
                                                        <input  type="text" name="size[]" required id="size" value="" placeholder="size" style="width:22%"/>
                                                        <input type="number" name="price[]" required id="price" value="" placeholder="price" style="width:22%"/>
            
                                                        <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
										<div class="col-12">
											<button class="btn btn-primary btn-sm" type="submit">Add</button>
										</div>
									</form>
                                    
								</div>
							</div>
						</div>
                        <div class="card">

                <form name="editAttributeForm" id="editAttributeForm"  action="#"  method="post">
                        @csrf
					<div class="card-body">
						<div class="table-responsive">
						  
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
                                        <th>ID</th>
                                        <th>Gender</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($attributes as $key => $attr)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$attr->gender}}</td>
                                        <td>{{$attr->color}}</td>
                                        <td>{{$attr->size}}</td>
                                        <td>{{$attr->price}}</td>
                                        <td>
                                        <a  title="Attribute Delette" class="confirmDelete " record="attribute" recoedid="{{$attr->id}}" href="javascript:void('0')"><i class="btn btn-danger btn-sm fadeIn animated bx bx-trash-alt"></i></a>
                                       </td>
                                    </tr>
                                    @endforeach
								</tbody>
                                
							</table>
                            <div class="card-footer">
                        </div>
						</div>
                        
					</div>
                </form>
				</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>	
@endsection
@section("script_js")

<script>
    	//add remove product attrbutes
	 var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div style="margin-top:10px;"><div style="height:10px;"></div><input type="text" name="gender[]"  placeholder="gender" style="width:22%;"/>&nbsp;<input type="text" name="color[]" required placeholder="color" style="width:22%;"/>&nbsp;<input type="text" name="size[]" required placeholder="size" style="width:22%;"/>&nbsp;<input type="number" name="price[]" required placeholder="price" style="width:22%;"/><a href="javascript:void(0);" class="remove_button">Delete</a></div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
</script>
@endsection

