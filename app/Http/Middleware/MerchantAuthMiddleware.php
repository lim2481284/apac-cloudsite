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

        switch($validationCase)
        {  

            case "forgot" : 
                # TODO : Forgot password validation 
                
            case "onboarding" :
               
                # Check if user not yet login and check role 
                if(!checkRole('merchant_admin')) return redirect(route('register.index'));

                # Check if onboarding form already submitted
                if(getMerchant()) return redirect('/');    
                
                return $next($request);

        }

        return $next($request);
        
    }
}
