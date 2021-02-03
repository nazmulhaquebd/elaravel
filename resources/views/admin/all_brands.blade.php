@extends('admin_layout')
@section('admin_content')


<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
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
								  <th>Brands ID</th>
								  <th>Brands Name</th>
								  <th>Brands Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead> 
						  @foreach ($all_brands_infos as $key => $value)
  
						  <tbody>
							<tr>
								<td>{{$value->brands_id}}</td>

								<td class="center">{{$value->brands_name}}</td>
					            <td class="center">{{$value->brands_description}}</td>
								@if($value->brands_status==1)
					<td class="center">
						<span class="label label-success">Active</span>
					</td>
				@else
					<td class="center">
						<span class="label label-danger">Inactive</span>
					</td>
				@endif

								<td class="center">
				@if($value->brands_status==1)
					<a class="btn btn-danger" href="{{URL::to('/inactive-brands',$value->brands_id)}}">
						<i class="halflings-icon white thumbs-down"></i>  
					</a>
				@else
					<a class="btn btn-success" href="{{URL::to('/active-brands',$value->brands_id)}}">
						<i class="halflings-icon white thumbs-up"></i>  
					</a>
				@endif

					<a class="btn btn-info" href=" {{URL::to('/edit-brands',$value->brands_id)}}">
						<i class="halflings-icon white edit"></i>  
					</a>
					<a class="btn btn-danger" onclick="return confirm('Do you want to delete it?')" href=" {{URL::to('/delete-brands',$value->brands_id)}}">
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