<?php

namespace App\Http\Controllers\Merchant\Auth;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{

    # logout function     
    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }

}
