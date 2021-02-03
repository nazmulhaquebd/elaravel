@extends('admin_layout')
@section('admin_content')
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>All Products</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
<p class="alert-success">
	<?php	
		$message=Session::get('message');
		if($message){
		echo $message;
		Session::put('message', null);
		}
	?>
</p>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>P ID</th>
					  <th>P Name</th>
					  <th>category ID</th>
					  <th>Brands ID</th>
					  <th>P Short D</th>
					  <th>P long D</th>
					  <th>P Price</th>
					  <th>P Image</th>
					  <th>P Size</th>
					  <th>P Color</th>
					  <th>Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>
		@foreach ($all_products_infos as $key => $value)
			  <tbody>
				<tr>
					<td class="center">{{$value->products_id}}</td>
					<td class="center">{{$value->products_name}}</td>
					<td class="center">{{$value->category_name}}</td>
					<td class="center">{{$value->brands_name}}</td>
					<td class="center">{{$value->products_short_description}}</td>
					<td class="center">{{$value->products_long_description}}</td>
					<td class="center">{{$value->products_price}}</td>
					<td><img src="{{URL::to($value->products_image)}}" style="height:80px; width:80px;"></td>
					<td class="center">{{$value->products_size}}</td>
					<td class="center">{{$value->products_color}}</td>

				@if($value->products_status==1)
					<td class="center">
						<span class="label label-success">Active</span>
					</td>
				@else
					<td class="center">
						<span class="label label-danger">Inactive</span>
					</td>
				@endif

					<td class="center">
				@if($value->products_status==1)
					<a class="btn btn-danger" href="{{URL::to('/inactive-products',$value->products_id)}}">
						<i class="halflings-icon white thumbs-down"></i>  
					</a>
				@else
					<a class="btn btn-success" href="{{URL::to('/active-products',$value->products_id)}}">
						<i class="halflings-icon white thumbs-up"></i>  
					</a>
				@endif

					<a class="btn btn-info" href="{{URL::to('/edit-products',$value->products_id)}}">
						<i class="halflings-icon white edit"></i>  
					</a>

					<a class="btn btn-danger" href="{{URL::to('/delete-products',$value->products_id)}}" id="delete">
						<i class="halflings-icon white trash"></i> 
					</a>
					</td>
				</tr>
			  </tbody>
		@endforeach
		  </table>            
		</div>
	</div><!--/span-->
</div><!--/row-->
@endsection

