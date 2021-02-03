<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Str;
 use App\Http\Requests;
 use Session;
 use Illuminate\Support\Facades\Redirect;
 session_start();

class SliderController extends Controller
{
    public function index() //copy add_products and past add_slider
    {
    	return view('admin.add_slider');
    }
    public function save_slider(Request $request)
    { 
      $data['slider_name']=$request->slider_name;
      $data['slider_tittle']=$request->slider_tittle;
      $data['slider_description']=$request->slider_description;
      $data['slider_status']=$request->slider_status;
    $image=$request->file('slider_image');

  if ($image){
    $image_name=Str::random(32);
    $ext=strtolower($image->getClientOriginalExtension());
    $image_full_name=$image_name.'.'.$ext;
    $upload_path='slider_images/';
    $image_url=$upload_path.$image_full_name;
    $success=$image->move($upload_path,$image_full_name);

  if ($success){
    $data['slider_image']=$image_url;
      DB::table('tbl_slider')->insert($data);
          Session::put('message', 'slider added successfully');
          return Redirect::to('/add-slider');
        }
      }

      $data['slider_image']='';
      DB::table('tbl_slider')->insert($data);
      Session::put('message', 'slider added successfully without image!');
      return Redirect::to('/add-slider');
    }
    public function all_slider($value='')
    {    
       $all_slider_info=DB::table('tbl_slider')->get();
         $manage_slider=view ('admin.all_slider')
         ->with('all_slider_infos',$all_slider_info);
             return view ('admin_layout')
             ->with('admin.all_slider',$manage_slider);
      // return view('admin.all_slider');
    }
 
    public function inactive_slider($slider_id)
    {
      DB::table('tbl_slider')
      ->where('slider_id',$slider_id)
      ->update(['slider_status'=>0]);
      Session::put('message', 'slider Inactive Successfully');
       return Redirect::to('/all-slider');
    }
    public function active_slider($slider_id)
    {
      DB::table('tbl_slider')
      ->where('slider_id',$slider_id)
      ->update(['slider_status'=>1]);
      Session::put('message', 'slider Active Successfully');
       return Redirect::to('/all-slider');
    }
    public function edit_slider($slider_id)
   {    
      $all_slider_info=DB::table('tbl_slider')
      ->where('slider_id',$slider_id)
      ->first();
        $manage_slider=view ('admin.edit_slider')
        ->with('all_slider_infos',$all_slider_info);
            return view ('admin_layout')
            ->with('admin.edit_slider',$manage_slider);
     //return view('admin.edit_slider');
   }

   public function update_slider(Request $request,$slider_id)
   {
    $data=array();
    $data['slider_name']=$request->slider_name;
    $data['slider_tittle']=$request->slider_tittle;
    $data['slider_description']=$request->slider_description;
    $data['slider_image']=$request->slider_image;
    $data['slider_status']=$request->slider_status;
    $image=$request->file('slider_image');

  if ($image){
    $image_name=Str::random(32);
    $ext=strtolower($image->getClientOriginalExtension());
    $image_full_name=$image_name.'.'.$ext;
    $upload_path='slider_images/';
    $image_url=$upload_path.$image_full_name;
    $success=$image->move($upload_path,$image_full_name);

  if ($success){
    $data['slider_image']=$image_url;
      DB::table('tbl_slider')
      ->where('slider_id',$slider_id)
     ->update($data);
          Session::put('message', 'slider added successfully');
          return Redirect::to('/all-slider');
        }
      }

      $data['slider_image']='';
      DB::table('tbl_slider')
      ->where('slider_id',$slider_id)
     ->update($data);
      Session::put('message', 'slider added successfully without image!');
      return Redirect::to('/all-slider');
   }
   public function delete_slider($slider_id)
   {  
      // print_r($skider_id);
      DB::table('tbl_slider')
     ->where('slider_id',$slider_id)
     ->delete();
     Session::put('message', 'Slider Delete successfully');
      return Redirect::to('/all-slider');
   }


}
