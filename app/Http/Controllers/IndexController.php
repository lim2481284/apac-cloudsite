<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{


    # Index page 
    public function index()
    {
        return view('pages.homepage');
    }


    # Pricing page 
    public function pricing()
    {
        return view('pages.pricing');
    }


    # Contact page 
    public function contact()
    {
        return view('pages.contact');
    }

}
