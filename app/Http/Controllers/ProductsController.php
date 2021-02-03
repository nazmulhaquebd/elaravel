<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
 use App\Http\Requests;
 use Session;
 use Illuminate\Support\Facades\Redirect;
 session_start();

class ProductsController extends Controller
{
    public function index($value='')
    {
    	return view('admin.add_products');
    }
    public function save_products(Request $request)
    {
        $data=array();
		$data['products_name']=$request->products_name;
		$data['category_id']=$request->category_id;
		$data['brands_id']=$request->brands_id;
		$data['products_short_description']=$request->products_short_description;
		$data['products_long_description']=$request->products_long_description;
		$data['products_price']=$request->products_price;
		$data['products_image']=$request->products_image;
		$data['products_size']=$request->products_size;
		$data['products_color']=$request->products_color;
		$data['products_status']=$request->products_status;
// echo "<pre>";
// print_r($data);
// echo "<pre>";
// exit();
		$image=$request->file('products_image');
	if ($image){
		// $image_name=str_random(20);
		$ext=strtolower($image->getClientOriginalName());
		$image_full_name=$ext; //$image_full_name=$image_name.'.'.$ext;
		$upload_path='image/';
		$image_url=$upload_path.$image_full_name;
		$success=$image->move($upload_path,$image_full_name);

	if ($success){
		$data['products_image']=$image_url;
 			DB::table('tbl_products')->insert($data);
      		Session::put('message', 'Products added successfully');
      		return Redirect::to('/add-products');
   			}
   		}

   		$data['products_image']='';
			DB::table('tbl_products')->insert($data);
			Session::put('message', 'Products added successfully without image!');
			return Redirect::to('/add-products');
	   }
	   public function all_products($value='')
   {
      $all_products_info=DB::table('tbl_products')
       ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
       ->join('tbl_brands','tbl_products.brands_id','=','tbl_brands.brands_id')
      ->select('tbl_products.*','tbl_category.category_name','tbl_brands.brands_name')
      ->get();

        $manage_products=view ('admin.all_products')
        ->with('all_products_infos',$all_products_info);
            return view ('admin_layout')
            ->with('admin.all_products',$manage_products);
      return view ('admin.all_products');
   }
   public function inactive_products($products_id)
   {
     DB::table('tbl_products')
     ->where('products_id',$products_id)
     ->update(['products_status'=>0]);
     Session::put('message', 'Products Inactive Successfully');
      return Redirect::to('/all-products');
   }
   public function active_products($products_id)
   {
     DB::table('tbl_products')
     ->where('products_id',$products_id)
     ->update(['products_status'=>1]);
     Session::put('message', 'Products Active Successfully');
      return Redirect::to('/all-products');
   }
 public function edit_products($products_id)
   {    
      $all_products_info=DB::table('tbl_products')
      ->where('products_id',$products_id)
      ->first();
        $manage_products=view ('admin.edit_products')
        ->with('all_products_infos',$all_products_info);
            return view ('admin_layout')
            ->with('admin.edit_products',$manage_products);
     // return view('admin.edit_category');
   }
   public function update_products(Request $request,$products_id)
   {
    $data=array();
    $data['products_name']=$request->products_name;
    $data['category_id']=$request->category_id;
    $data['brands_id']=$request->brands_id;
    $data['products_short_description']=$request->products_short_description;
    $data['products_long_description']=$request->products_long_description;
    $data['products_price']=$request->products_price;
    $data['products_image']=$request->products_image;
    $data['products_size']=$request->products_size;
    $data['products_color']=$request->products_color;
    $data['products_status']=$request->products_status;
    $image=$request->file('products_image');
  if ($image){
    // $image_name=str_random(20);
    $ext=strtolower($image->getClientOriginalName());
    $image_full_name=$ext; //$image_full_name=$image_name.'.'.$ext;
    $upload_path='image/';
    $image_url=$upload_path.$image_full_name;
    $success=$image->move($upload_path,$image_full_name);

  if ($success){
    $data['products_image']=$image_url;
      DB::table('tbl_products')
      ->where('products_id',$products_id)
     ->update($data);
          Session::put('message', 'Products added successfully');
          return Redirect::to('/all-products');
        }
      }

      $data['products_image']='';
      DB::table('tbl_products')
      ->where('products_id',$products_id)
     ->update($data);
      Session::put('message', 'Products added successfully without image!');
      return Redirect::to('/all-products');
   }

   public function delete_products($products_id)
   {  
      // print_r($category_id);
      DB::table('tbl_products')
     ->where('products_id',$products_id)
     ->delete();
     Session::put('message', 'Products Delete successfully');
      return Redirect::to('/all-products');
   }





}