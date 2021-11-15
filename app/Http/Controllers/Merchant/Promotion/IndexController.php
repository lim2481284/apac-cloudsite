<?php

namespace App\Http\Controllers\Merchant\Promotion;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    
    # Promotion index page
    public function index(Request $request)
    {
        return view('pages.merchant.promotion');
    }


    # TODO : Promotion CRUD function  | Product discount | Promocode

}
