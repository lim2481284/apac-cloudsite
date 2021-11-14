<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    # Dashboard page 
    public function index()
    {
        return view('pages.merchant.dashboard');
    }

}
