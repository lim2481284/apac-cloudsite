<?php

namespace App\Http\Controllers\Merchant\Account;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreditController extends Controller
{


    # Credit index page  
    public function index()
    {
        return view('pages.merchant.credit');
    }


}
