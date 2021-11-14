<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class MerchantAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {        

        # Retrieve route case and validate rotue based on case 
        $routeAction = $request->route()->getAction();
        $validationCase =  isset($routeAction['validation'])?$routeAction['validation']:null;       

        # Check if user already login and already verified
        if (Auth::check() && checkRole(['merchant_admin']) && Auth::user()->getMeta('verified_at') && getMerchant())  
            return redirect('/');
            
        # Merge is ref request 
        $request->merge(['isRef'=>false]);

        switch($validationCase)
        {  

            case "verify" : 
             
                # Validate role 
                if (!checkRole('merchant_admin')) return redirect(route('login.index'));
                return $next($request);


            case "forgot" : 
                
                # Check if got method then validate method 
                $parameter = $request->route()->parameters;
                if(isset($parameter['method'])){
                    $method = $parameter['method'];
                    if (!in_array($method, ['email', 'phone'])) abort(404);
                }

                # Check if got url token then validate token 
                if(isset($parameter['urlToken'])){

                    $urlToken = $parameter['urlToken'];
                    $user = \App\Models\User::where('url_token', $urlToken)->where('role_id', getConfig('role.merchant_admin'))->first();
                    if(!$user) abort(404);

                    # Pass user data to request
                    $request->merge(['user'=>$user]);
                }
                
                return $next($request);

                
            case "startup" :
               
                # Check if user not yet login and check role 
                if(!checkRole('merchant_admin')) return redirect(route('register.index'));

                # Check if email verified
                if(!\Auth::user()->getMeta('verified_at')) return redirect(route('verify.index'));

                # Check if startup form already submitted
                if(getMerchant()) return redirect('/');    
                
                return $next($request);

        }

        return $next($request);
        
    }
}
