<?php

namespace App\Http\Controllers\Merchant\Auth;

use Auth;

use App\Models\User;

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
        $roleConfig = getConfig('role');
        $login = $request->login;
        $user = User::where(function ($query) use ($login) {
            $query->where('phone', $login)
                ->orWhere('email', $login);
        });

        # 0.1 : Get user based on role
        if($request->isRef && $request->role == 'referral')
            $user = $user->where('role_id',$roleConfig['referral']);
        else 
            $user = $user->whereIn('role_id',[$roleConfig['merchant_admin']]);
        $user = $user->first();
        if($user)
        {

            # 1 : Check if user role is correct
            if($user->checkRole(($request->isRef)?['merchant_admin']:['merchant_admin','merchant_staff']))
            {

                # 2 : Check merchant status 
                if(!$user->merchant->checkStatus('active')) 
                    return back()->with('err', translate('merchant_deactivated', "Merchant account is deactviated, please contact Cloudsite for further action."))->withInput();

                # 3 : Check login credential
                $credentials = $request->only('password');    
                if (
                    Auth::attempt(['email'=>$request->login, 'role_id' => $user->role_id] + $credentials) || 
                    Auth::attempt(['phone'=>$request->login, 'role_id' => $user->role_id] + $credentials)
                )
                {
                    
                    # Get IP location
                    $location  = '';
                    $requestLocation = Location::get($request->ip());
                    if($requestLocation) $location = $requestLocation->countryName . ' '. $requestLocation->regionName. ' '. $requestLocation->cityName;    
                    
                    # Get device info
                    $agent = '';
                    $requestAgent = new Agent();
                    if($requestAgent) $agent = $requestAgent->platform() . ' ' . $requestAgent->browser();

                    # Keep audit record 
                    \DB::table('audits')->insert(['event'=>'login','auditable_type'=>'App\Models\User','auditable_id'=>$user->id,'ip_address'=>$request->ip(),'user_agent'=>$agent,'tags'=>$location,'created_at'=>\Carbon\Carbon::now()]);

                    # Send login ntofiication to merchant 
                    if(!$request->isRef && $merchant = $user->merchant){
                        if($merchant->checkNotify('telegram')){
                            sendTelegram("<b>".translate('merchant_login_notification', 'MERCHANT LOGIN NOTIFICATION')."</b> \n\n<b>".translate('merchant_account', 'Merchant Account')."</b> \n".$user->name, false, $merchant->telegram->user_id);
                        }    
                    }
                 
                    # Check if redirect from communtiy 
                    if(session()->get('is_community')){
                        session()->forget('is_community');
                        return redirect('https://community.cloudsite.com.my');
                    }

                    return redirect()->intended('/');   

                }      
            }

        } 
   
        return back()->with('err', translate('incorrect_username_password', "Incorrect Username or Password"))->withInput();
    }



    # Function to verify google 2fa Code
    public function verifyGoogle2FA()
    {        
        return redirect(route('dashboard'));    
    }



}
