<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('layout');
});*/
 //frontend------------------------
 Route::get('/','App\Http\Controllers\HomeController@index');
 //show products with category
 Route::get('/category_with_products/{category_id}','App\Http\Controllers\HomeController@show_category_with_products');

 //show product with brand
 Route::get('/brands_with_products/{category_id}', 'App\Http\Controllers\HomeController@show_brands_with_products');
//view products with id
Route::get('/view-products/{category_id}', 'App\Http\Controllers\HomeController@view_products_with_id');
//Customer checkout and regestration and login
Route::get('/login-checkout', 'App\Http\Controllers\CheckoutController@login_checkout');

 //backend-------------
  Route::get('/admin','App\Http\Controllers\AdminController@index');
  Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');
  Route::post('/admin-dashboard', 'App\Http\Controllers\AdminController@dashboard');
  Route::get('/logout','App\Http\Controllers\SuperAdminController@logout');
//Category related route-----
  Route::get('/add-category','App\Http\Controllers\CategoryController@index');
  Route::post('/save-category','App\Http\Controllers\CategoryController@save_category');
  Route::get('/all-category', 'App\Http\Controllers\CategoryController@all_category');
Route::get('/inactive-category/{category_id}', 'App\Http\Controllers\CategoryController@inactive_category');
Route::get('/active-category/{category_id}', 'App\Http\Controllers\CategoryController@active_category');
Route::get('/edit-category/{category_id}', 'App\Http\Controllers\CategoryController@edit_category');
Route::post('/update-category/{category_id}', 'App\Http\Controllers\CategoryController@update_category');
Route::get('/delete-category/{category_id}', 'App\Http\Controllers\CategoryController@delete_category');

//Brands related route-----
Route::get('/add-brands', 'App\Http\Controllers\BrandsController@index');
Route::post('/save-brands', 'App\Http\Controllers\BrandsController@save_brands');
Route::get('/all-brands', 'App\Http\Controllers\BrandsController@all_brands');
Route::get('/inactive-brands/{brands_id}', 'App\Http\Controllers\BrandsController@inactive_brands');
Route::get('/active-brands/{brands_id}', 'App\Http\Controllers\BrandsController@active_brands');
Route::get('/edit-brands/{brands_id}', 'App\Http\Controllers\BrandsController@edit_brands');
Route::post('/update-brands/{brands_id}', 'App\Http\Controllers\BrandsController@update_brands');
Route::get('/delete-brands/{brands_id}', 'App\Http\Controllers\BrandsController@delete_brands');

//Products related route
Route::get('/add-products', 'App\Http\Controllers\ProductsController@index');
Route::post('/save-products', 'App\Http\Controllers\ProductsController@save_products');
Route::get('/all-products', 'App\Http\Controllers\ProductsController@all_products');
Route::get('/inactive-products/{products_id}', 'App\Http\Controllers\ProductsController@inactive_products');
Route::get('/active-products/{products_id}', 'App\Http\Controllers\ProductsController@active_products');
Route::get('/edit-products/{products_id}', 'App\Http\Controllers\ProductsController@edit_products');
Route::post('/update-products/{products_id}', 'App\Http\Controllers\ProductsController@update_products');
Route::get('/delete-products/{products_id}', 'App\Http\Controllers\ProductsController@delete_products');
//Slider related route
Route::get('/add-slider', 'App\Http\Controllers\SliderController@index');
Route::post('/save-slider', 'App\Http\Controllers\SliderController@save_slider');
Route::get('/all-slider', 'App\Http\Controllers\SliderController@all_slider');
Route::get('/inactive-slider/{slider_id}', 'App\Http\Controllers\SliderController@inactive_slider');
Route::get('/active-slider/{slider_id}', 'App\Http\Controllers\SliderController@active_slider');
Route::get('/edit-slider/{slider_id}', 'App\Http\Controllers\SliderController@edit_slider');
Route::post('/update-slider/{slider_id}', 'App\Http\Controllers\SliderController@update_slider');
Route::get('/delete-slider/{slider_id}', 'App\Http\Controllers\SliderController@delete_slider');
