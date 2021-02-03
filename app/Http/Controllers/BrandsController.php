<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
 use App\Http\Requests;
 use Session;
 use Illuminate\Support\Facades\Redirect;
 session_start();

class BrandsController extends Controller
{
    public function index($value='')
    {
        return view('admin.add_brands');
    }
    public function save_brands(Request $request)
   {
       $data=array();
       //$data['brands_id']=$request->brands_id;
       $data['brands_name']=$request->brands_name;
       $data['brands_description']=$request->brands_description;
       $data['brands_status']=$request->brands_status;
       //print_r($data);
       DB::table('tbl_brands')->insert($data);
      Session::put('message', 'Brands added successfully');
      return Redirect::to('/add-brands');
   }
   public function all_brands($value='')
   	{
   	$all_brands_info=DB::table('tbl_brands')->get();
        		$manage_brands=view ('admin.all_brands')
        		->with('all_brands_infos',$all_brands_info);
            	return view ('admin_layout')
            ->with('admin.all_brands',$manage_brands);
      		// return view ('admin.all_brands');
   	}
       public function inactive_brands($brands_id)
       {
         DB::table('tbl_brands')
         ->where('brands_id',$brands_id)
         ->update(['brands_status'=>0]);
         Session::put('message', 'brands Inactive successfully');
          return Redirect::to('/all-brands');
       }
       public function active_brands($brands_id)
       {
         DB::table('tbl_brands')
         ->where('brands_id',$brands_id)
         ->update(['brands_status'=>1]);
         Session::put('message', 'brands Active successfully');
          return Redirect::to('/all-brands');
    }
    public function edit_brands($brands_id)
   {    
      $all_brands_info=DB::table('tbl_brands')
      ->where('brands_id',$brands_id)
      ->first();
        $manage_brands=view ('admin.edit_brands')
        ->with('edit_brands_infos',$all_brands_info);
            return view ('admin_layout')
            ->with('admin.edit_brands',$manage_brands);
     // return view('admin.edit_brands');
   }
    
   public function update_brands(Request $request,$brands_id)
   {
     $data=array();
       $data['brands_id']=$request->brands_id;
       $data['brands_name']=$request->brands_name;
       $data['brands_description']=$request->brands_description;
      // print_r($data);
       DB::table('tbl_brands')
     ->where('brands_id',$brands_id)
     ->update($data);
     Session::put('message', 'brands update successfully');
      return Redirect::to('/all-brands');
   }

   public function delete_brands($brands_id)
   {  
      // print_r($category_id);
      DB::table('tbl_brands')
     ->where('brands_id',$brands_id)
     ->delete();
     Session::put('message', 'brands Delete successfully');
      return Redirect::to('/all-brands');
   }

}
