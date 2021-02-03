<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
 use App\Http\Requests;
 use Session;
 use Illuminate\Support\Facades\Redirect;
 session_start();

class HomeController extends Controller
{
    public function index($value=''){
        $show_features_items=DB::table('tbl_products')
      ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
      ->join('tbl_brands','tbl_products.brands_id','=','tbl_brands.brands_id')
      ->select('tbl_products.*','tbl_category.category_name','tbl_brands.brands_name')
      ->where('tbl_products.products_status',1)
      ->limit(9)
      ->get();

        $manage_products=view ('pages.home_content')
        ->with('products_info',$show_features_items);
            return view ('layout')
            ->with('pages.home_content',$manage_products);

    //return view('pages.home_content');
}
public function show_category_with_products($category_id) 
{ 
  $show_category_with_products=DB::table('tbl_products')
  ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
  ->join('tbl_brands','tbl_products.brands_id','=','tbl_brands.brands_id')
  ->select('tbl_products.*','tbl_category.category_name','tbl_brands.brands_name')
  ->where('tbl_category.category_id',$category_id)
  ->where('tbl_products.products_status',1)
  ->limit(15)
  ->get();

    $manage_category_with_products=view ('pages.category_with_products')
    ->with('category_with_products_info',$show_category_with_products);
        return view ('layout')
        ->with('pages.category_with_products',$manage_category_with_products);
  //return view('pages.category_with_products');

  // Copy home_content.blade.php and Past category_with_products.blade.php
}
public function show_brands_with_products($brands_id) 
    { 
      $show_category_with_brands=DB::table('tbl_products')
      ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
      ->join('tbl_brands','tbl_products.brands_id','=','tbl_brands.brands_id')
      ->select('tbl_products.*','tbl_category.category_name','tbl_brands.brands_name')
      ->where('tbl_brands.brands_id',$brands_id)
      ->where('tbl_products.products_status',1)
      ->limit(15)
      ->get();

        $manage_brands_with_products=view ('pages.brands_with_products')
        ->with('brands_with_products_info',$show_category_with_brands);
            return view ('layout')
            ->with('pages.brands_with_products',$manage_brands_with_products);
      //return view('pages.brands_with_products');

      // Copy home_content.blade.php and Past brands_with_products.blade.php
    }
    public function view_products_with_id($products_id) 
    { 
      $show_products_with_id=DB::table('tbl_products')
      ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
      ->join('tbl_brands','tbl_products.brands_id','=','tbl_brands.brands_id')
      ->select('tbl_products.*','tbl_category.category_name','tbl_brands.brands_name')
      ->where('tbl_products.products_id',$products_id)
      ->where('tbl_products.products_status',1)
      ->get();

        $manage_products_with_id=view ('pages.products_detail')
        ->with('products_with_detail_info',$show_products_with_id);
            return view ('layout')
            ->with('pages.products_detail',$manage_products_with_id);
      //return view('pages.products_detail');

      // Copy home_content.blade.php and Past products_detail.blade.php
    }


}