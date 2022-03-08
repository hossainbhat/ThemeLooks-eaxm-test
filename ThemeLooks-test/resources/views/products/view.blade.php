@extends('layouts.admin')
@section('content')

<div class="page-wrapper">
			<div class="page-content">
				
				<div class="row">
					<div class="col-xl-9 mx-auto">
						
						
						
						<div class="card">
							<div class="card-body">
								<table class="table table-bordered mb-0">
									
									<tbody>

										<tr>
											<th colspan="4" class="text-center"><h3>Product Information</h3></th>
										</tr>
                                        <tr>
											<th colspan="2" class="text-center"><h5>Product name</h5></th>
                                            <td colspan="2" class="text-center"><h5>{{$product->name}}</h5></td>
										</tr>
                                        <tr>
                                            <th>Gender</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Price</th>
                                        </tr>
                                       @foreach($attributes as $attri)
                                        <tr>
											<td>{{@$attri->gender}}</td>
											<td>{{$attri->color}}</td>
											<td>{{$attri->size}}</th>
											<td>{{$attri->price}}</td>
										</tr>
                                      @endforeach
									</tbody>
								</table>
							</div>
						</div>
						
					</div>
				</div>
				<!--end row-->
			</div>
		</div>


@endsection
