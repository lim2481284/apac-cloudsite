<?php

namespace App\Http\Controllers\Merchant\Customer;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    
    # Customer index page
    public function index(Request $request)
    {
        return view('pages.merchant.customer.index');
    }
    
    
    # Customer view page
    public function view(Request $request)
    {
        return view('pages.merchant.customer.view');
    }


    # TODO : Customer details function 

}
