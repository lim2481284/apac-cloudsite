<?php

namespace App\Http\Controllers\Merchant\Auth;

use Auth;
use App\Models\Merchant;

use App\Jobs\SendMail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Merchant\StartUpRequest;


class StartupController extends Controller
{

    
    # Startup page 
    public function index(){    
        $config = getConfig('merchant');
        return view('pages.merchant.auth.startup',compact('config'));
    }



    # Submit startup form
    public function submit(StartUpRequest $request)
    {
        # Check if domain name existing 
        $domainCheck = self::domainCheck($request->domain);
        $response = json_decode($domainCheck->getContent(),true);

        if(!$response['available'])
            return back()->with('err',translate('invalid_domain','Invalid domain, please use different domain name'))->withInput();

        # Create store & bind to user 
        $user = Auth::user();
        $domainObj = [
            $request->domain.'.cloudsite.store' => [
                'primary'=>true,
                'active' => true,
                'type' => 'free'
            ]
        ];
        $merchant = Merchant::create(
            $request->only(['name']) + 
            ['domain'=>json_encode($domainObj), 'referral' => $user->getMeta('ref'), 'meta' => json_encode($request->except(['_token','name','domain','isEditor']) + ['notify'=>['email_c'=>true, 'email'=>$user->email]])]
        );
        $user->update(['merchant_id' => $merchant->id]);

        # CHeck if got referral - send notification 
        if($ref = $merchant->referrals)
        {

            # Check if got enable telegram notification 
            if($telegram = $ref->telegram){
                sendTelegram("<b>".translate('new_droplet_register', 'NEW DROPLET REGISTER')."</b> \n\n<b>".translate('merchant_name', 'Merchant Name')."</b> \n".$merchant->name, false, $telegram->user_id, translate('manage_droplet','Manage Droplet'),'https://partner.cloudsite.com.my/droplet');    
            }

            # Update merchant transaction rate
            $meta = $merchant->getMeta();
            $meta->merchant_rate = $ref->getMeta('mrate')??getConfig('system.system_config.ref_merchant_rate');
            $merchant->update(['meta'=>json_encode($meta)]);

        }

        # Send welcoming mail - to explain more cloudsite merchant feature 
        SendMail::dispatch(
            ['name' => $merchant->name], 
            translate('welcome_cloudsite_merchant', 'Welcome to Cloudsite Merchant Portal'),
            'mail.merchant.' .\Lang::getLocale() .'.auth.welcoming',
            $merchant->name,
            $user->email,
            $merchant,
            'aliyun'
        );           
        
        #  Send notification to cloudsite
        sendTelegram("Merchant Registration Success\nMerchant Name : " . $merchant->name);

        return redirect('/')->with([                        
            'message' => ['title'=> translate('account_created', 'Congratulations your Cloudsite account has been created. Stronger, together with Cloudsite !')]
        ]);      

    }
    


    # Ajax api for domain checking (only use for subdomain cloudsite checking)
    public function domainAvailability(Request $request){
        
        $data = self::domainCheck($request->domain);
        
        return $data;
    }


    # Function to validate domain name 
    public static function domainCheck($domain){
        
        # Domain data validation 
        $validation = Validator::make( ['domain' => $domain],[
            'domain' => ['required','min:2','max:25',Rule::notIn(getConfig('system.domain_prohibited_keyword')),'regex:/^[a-zA-Z0-9]+[\w.-]?[a-zA-Z0-9]+$/']
        ]);
        if($validation->fails())
            return response()->json(['available' => false, 'message' => translate('not_available','Not Available')]);
        
        # Check if domain exists
        $availability = Merchant::where('domain','like','%"'. $domain .'.cloudsite.store' .'"%')->exists();
        
        return response()->json(['available' => !$availability, 'message' =>  (!$availability)? translate('available','Available') : translate('not_available','Not Available')]);

    }

}
