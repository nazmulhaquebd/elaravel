<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
 use App\Http\Requests;
 use Session;
 use Illuminate\Support\Facades\Redirect;
 session_start();

class CategoryController extends Controller
{
    public function index($value='')
    {
    	return view('admin.add_category');
    }
      public function save_category(Request $request)
    {
         $data=array();
		 $data['category_id']=$request->category_id;
		 $data['category_name']=$request->category_name;
		 $data['category_description']=$request->category_description;
		 $data['category_status']=$request->category_status;
		  //echo "<pre>";
		 //print_r($data);
		//exit();
		DB::table('tbl_category')->insert($data);
		Session::put('message', 'Category added successfully');
		return Redirect::to('/add-category');




    }
     public function all_category($value='')
   	{
   		    $all_category_info=DB::table('tbl_category')->get();
      		$manage_category=view ('admin.all_category')
        		->with('all_category_infos',$all_category_info);
      	return view ('admin_layout')
        	->with('admin.all_category',$manage_category);
      // return view ('admin.all_category');
   }
   public function inactive_category($category_id)
   {
     DB::table('tbl_category')
     ->where('category_id',$category_id)
     ->update(['category_status'=>0]);
     Session::put('message', 'Category Inactive successfully');
      return Redirect::to('/all-category');
   }

   public function active_category($category_id)
   {
     DB::table('tbl_category')
     ->where('category_id',$category_id)
     ->update(['category_status'=>1]);
     Session::put('message', 'Category Active successfully');
      return Redirect::to('/all-category');
   }
   public function edit_category($category_id)
   	{
   		$all_category_info=DB::table('tbl_category')
      	->where('category_id',$category_id)
     	->first();
        $manage_category=view ('admin.edit_category')
        ->with('all_category_infos',$all_category_info);
            return view ('admin_layout')
            ->with('admin.edit_category',$manage_category);

     		//return view('admin.edit_category');
   	}
   	public function update_category(Request $request,$category_id)
   	{
       	$data=array();
       	$data['category_id']=$request->category_id;
       	$data['category_name']=$request->category_name;
       	$data['category_description']=$request->category_description;
      		// print_r($data);
       	DB::table('tbl_category')
    	 ->where('category_id',$category_id)
    	 ->update($data);
     	Session::put('message', 'Category update successfully');
      	return Redirect::to('/all-category');
   	}
   	public function delete_category($category_id)
   	{  
      // print_r($category_id);
      	DB::table('tbl_category')
     	->where('category_id',$category_id)
     	->delete();
      Session::put('message', 'Category Delete successfully');
      return Redirect::to('/all-category');
   	}




   	}


