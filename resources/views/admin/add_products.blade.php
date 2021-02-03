

@extends('admin_layout')
@section('admin_content')			
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
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
			<form class="form-horizontal" action="{{url('/save-products')}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="date01">Products Name</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="date01" name="products_name" required>
				  </div>
				</div>
				<div class="control-group">
					<label class="control-label" for="selectError3">Products Category</label>
					<div class="controls">
					  <select id="selectError3" name="category_id">
					  	<option>Select Category</option>
				<?php 
                    $show_all_catagory=DB::table('tbl_category')
                    ->where('category_status',1)
                     ->get();
                    foreach ($show_all_catagory as $value){?>
						<option value="{{$value->category_id}}" required>{{$value->category_name}}</option>
				 <?php } ?>
					  </select>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="selectError3">Brands Name</label>
					<div class="controls">
					  <select id="selectError3" name="brands_id">
					  	<option>Select Brands</option>
                <?php 
                    $show_all_brands=DB::table('tbl_brands')
                    ->where('brands_status',1)
                     ->get();
                    foreach ($show_all_brands as $value){?>
						<option value="{{$value->brands_id}}" required>{{$value->brands_name}}</option>
				 <?php } ?>
					  </select>
					</div>
				  </div>         
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Products Short Description</label>
				  <div class="controls">
					<textarea class="cleditor" id="textarea2" rows="3" name="products_short_description" required></textarea>
				  </div>
				</div>
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Products long Description</label>
				  <div class="controls">
					<textarea class="cleditor" id="textarea2" rows="3" name="products_long_description" required></textarea>
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="date01">Products Price</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="date01" name="products_price" required>
				  </div>
				</div>
				  <div class="control-group">
					<label class="control-label">Products Image</label>
					<div class="controls">
						<input type="file" class="input-xlarge" id="date01" name="products_image" required>
					</div>
				  </div>
				  <div class="control-group">
				  <label class="control-label" for="date01">Products Size</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="date01" name="products_size" required>
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="date01">Products Color</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="date01" name="products_color" required>
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="date01">Products Status</label>
				  <div class="controls">
					<input type="checkbox" class="input-xlarge" id="date01" value="1" name="products_status" required>
				  </div>
				</div>
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Add Products</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->
</div><!--/row-->
@endsection


