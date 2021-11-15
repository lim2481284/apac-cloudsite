<?php

namespace App\Http\Controllers\Merchant\Store;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    
    # Store index page
    public function index(Request $request)
    {
        return view('pages.merchant.store');
    }


    # TODO : CMS Page builder
    # TODO : Goal Management
    # TODO : Staff management
    # TODO : Shipping management
    # TODO : Announcement management

}
