<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
 use App\Http\Requests;
 use Session;
 use Illuminate\Support\Facades\Redirect;
 session_start();

class CheckoutController extends Controller
{
    public function login_checkout($value='')
    {
    	return view('pages.login');
    }

}
