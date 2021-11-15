<?php

namespace App\Http\Controllers\Merchant\Auth;

use Auth;
use App\Models\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OnboardingController extends Controller
{

    
    # Onboarding page 
    public function index(){    
        $config = getConfig('merchant');
        return view('pages.merchant.auth.onboarding',compact('config'));
    }



    # Submit onboarding form
    public function submit(Request $request)
    {
        
        # Check if domain name existing 
        if(Merchant::where('domain', $request->domain)->exists())
            return back()->with('err', 'Domain already used, please use different domain name')->withInput();

        # Create store & bind to user 
        $merchant = Merchant::create(
            $request->only(['name', 'domain']) + 
            ['meta' => json_encode($request->except(['_token','name','domain']))]
        );
        Auth::user()->update(['merchant_id' => $merchant->id]);

        return redirect('/')->with([ 'message' => ['title'=> 'Congratulations your Cloudsite account has been created. Stronger, together with Cloudsite !']]);      

    }
    


    # AJAX API for domain checking (only use for subdomain cloudsite checking)
    public function domainAvailability(Request $request){        

        # Check if domain exists
        $availability = Merchant::where('domain', $request->domain)->exists();        
        return response()->json(['available' => !$availability, 'message' =>  (!$availability)? 'Available' : 'Not Available']);

    }


}
