<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    # Dashboard page 
    public function index()
    {

          # 1 : Get survey answer vs month ( fake data )
          $revenueData = [['label'=>'21/9/2021', 'value'=> 40],['label'=>'22/9/2021', 'value'=> 50],['label'=>'23/9/2021', 'value'=> 80],['label'=>'24/9/2021', 'value'=> 10]] ;

          return view('pages.merchant.dashboard',compact('revenueData'));
    }

}
