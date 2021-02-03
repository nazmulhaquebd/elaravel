@extends('admin_layout')
@section('admin_content')
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>All Slider</h2>
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
					  <th>Slider ID</th>
					  <th>Slider Name</th>
					  <th>Slider Tittle</th>
					  <th>Slider Description</th>
					  <th>Slider Image</th>
					  <th>Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>
		@foreach ($all_slider_infos as $key => $value)
			  <tbody>
				<tr>
					<td class="center">{{$value->slider_id}}</td>
					<td class="center">{{$value->slider_name}}</td>
					<td class="center">{{$value->slider_tittle}}</td>
					<td class="center">{{$value->slider_description}}</td>
					<td><img src="{{URL::to($value->slider_image)}}" style="height:80px; width:180px;"></td>
				@if($value->slider_status==1)
					<td class="center">
						<span class="label label-success">Active</span>
					</td>
				@else
					<td class="center">
						<span class="label label-danger">Inactive</span>
					</td>
				@endif

					<td class="center">
				@if($value->slider_status==1)
					<a class="btn btn-danger" href="{{URL::to('/inactive-slider',$value->slider_id)}}">
						<i class="halflings-icon white thumbs-down"></i>  
					</a>
				@else
					<a class="btn btn-success" href="{{URL::to('/active-slider',$value->slider_id)}}">
						<i class="halflings-icon white thumbs-up"></i>  
					</a>
				@endif

					<a class="btn btn-info" href="{{URL::to('/edit-slider',$value->slider_id)}}">
						<i class="halflings-icon white edit"></i>  
					</a>

					<a class="btn btn-danger" href="{{URL::to('/delete-slider',$value->slider_id)}}" id="delete">
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

