<?php

namespace App\Http\Controllers\Merchant\Analysis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    # Analysis index page  
    public function index()
    {
        return view('pages.merchant.analysis');
    }

}
