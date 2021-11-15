<?php

namespace App\Http\Controllers\Ecommerce;

use App\Models\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    # Index page 
    public function index($domain)
    {

        # 1 : Check if merchant store is exists
        $merchant = Merchant::where('domain',$domain)->first();

        return ($merchant)?view('pages.ecommerce.index', compact('merchant')):view('pages.ecommerce.404');

    }

}
