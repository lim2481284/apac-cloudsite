<?php

namespace App\Http\Controllers\Merchant\Auth;

use Auth;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Auth\Authenticatable;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    use Authenticatable;
    

    # login page
    public function index()
    {         
        # Check if user already login - redirect back to account page 
        return (Auth::check())?redirect('/'):view('pages.merchant.auth.login');

    }


    # Login Function 
    public function login(Request $request)
    {
        
        # 0 : Check if user exists 
        $user = User::where('email', $request->login)->first();
        if($user)
        {

            # 1 : Check if user role is correct
            if($user->checkRole(['merchant_admin']))
            {

                # 2 : Check merchant status 
                if(!$user->merchant->checkStatus('active')) 
                    return back()->with('err', "Merchant account is deactviated, please contact Cloudsite for further action")->withInput();

                # 3 : Check login credential
                $credentials = $request->only('password');    
                if (Auth::attempt(['email'=>$request->login, 'role_id' => $user->role_id] + $credentials))
                    return redirect()->intended('/');   
            }

        } 
   
        return back()->with('err', "Incorrect Username or Password")->withInput();
    }



}
