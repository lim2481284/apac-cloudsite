<?php

namespace App\Http\Controllers\Merchant\Order;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    
    # Order index page
    public function index(Request $request)
    {
        return view('pages.merchant.order.index');
    }


    # TODO : Order processing function 

}
