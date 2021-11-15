<?php

namespace App\Http\Controllers\Merchant\Auth;

use DB;
use Auth;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{


    # Register page
    public function index()
    {        
        # Check if user already login - redirect back to account page 
        return (Auth::check())?redirect('/') : view('pages.merchant.auth.register');
    }


    # Function to register new merchant
    public function register(Request $request)
    {
        DB::beginTransaction();

        # 1 : Check if email existed
        $email = $request->email;
        if(User::where('role_id', getConfig('role.merchant_admin'))->where('email', $email)->exists())
            return back()->with('err', "Email address existed, please login or use different email address.")->withInput();
            
        # 2 : Create merchant admin account
        $user = User::create([
            'name' => $request->name,
            'email' => $email,
            'password' => \Hash::make($request->password),
            'role_id' => getConfig('role.merchant_admin'),
        ]);

        # 3 : Login user and redirect to onboarding page 
        Auth::login($user);        
        DB::commit();

        return redirect(route('onboarding.index'));
    }
    
}
