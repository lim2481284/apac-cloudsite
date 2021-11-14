<?php

namespace App\Http\Controllers\Merchant\Auth;

use DB;
use Auth;
use App\Models\User;
use App\Services\Twilio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Merchant\RegisterRequest;

class RegisterController extends Controller
{


    # Register page
    public function index()
    {        
        # Check if user already login - redirect back to account page 
        if (Auth::check())  return redirect('/');
        return view('pages.'.env('APP_ID').'.auth.register');
    }


    # Function to register new merchant
    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();

        # 0 : Get referral
        $ref = ($request->ref)?User::where('refcode',$request->ref)->first():null;

        # 1 : Check if email and phone number existed
        $email = $request->email;
        $roleConfig = getConfig('role');
        $phone = $request->country_code.$request->phone;
        if(User::whereIn('role_id',($request->isRef)?[$roleConfig['referral']]:[$roleConfig['merchant_admin'], $roleConfig['merchant_staff']])->where(function ($query) use ($email, $phone) {
            $query->where('phone', $phone)
                ->orWhere('email', $email);
        })->exists())
            return back()->with('err', translate('phone_email_existed', 'Phone number or email address existed, please login or use different phone number or email address.'))->withInput();
            
        # 2 : Create merchant admin or referral account
        $user = User::create([
            'name' => $request->name,
            'email' => $email,
            'password' => \Hash::make($request->password),
            'role_id' => ($request->isRef)?$roleConfig['referral']:$roleConfig['merchant_admin'],
            'provider_id' => $email,
            'provider_name' => 'email',
            'phone' => $phone,
            'meta' => json_encode(['def_lang' => \Lang::getLocale() ,'pass_updated' => true ,'sms_token' => sprintf("%06d", mt_rand(1, 999999)), 'ref'=>$ref?$ref->id:null])
        ]);

        # 3 : Send SMS verification
        try{
            Twilio::sendSMS($user->phone,$user->getMeta('sms_token'));
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('err', translate('invalid_phone_number', 'Invalid phone number.'))->withInput();
        }

        # 4 : Send notification 
        $msg = ($request->isRef)? "New Referral Register":"New Merchant Register";
        sendTelegram($msg . "\Name : " . $user->name."\nPhone Number : ".$user->phone);

        # 5 : Login user and redirect to verification page 
        Auth::login($user);        
        DB::commit();
        return redirect(route('verify.index'));
    }
    
}
