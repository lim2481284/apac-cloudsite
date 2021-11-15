<?php

namespace App\Http\Controllers\Merchant\Product;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    
    # Product index page
    public function index(Request $request)
    {
        return view('pages.merchant.product');
    }


    # TODO : Product CRUD function 

}
