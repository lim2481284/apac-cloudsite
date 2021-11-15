<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class MerchantDashboardMiddleware
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

        # 0 : Check if user is admin role & already login
        if(checkRole(['merchant_admin']))
        {   
                        
            # 1 : Check if completed onboarding form
            $user = Auth::user();
            $routeAction = $request->route()->getAction();
            if($user->checkRole('merchant_admin') && !getMerchant())
                return redirect(route('onboarding.index'));

            # 2 : Get data  -  Check all route permission    
            $tourKey =  isset($routeAction['guide'])?$routeAction['guide']:null;

            # 3 : Check tour guide                         
            if($tourKey){
                $userTour = $user->getMeta('tour');
                if($userTour && in_array($tourKey, $userTour)){
                    unset($routeAction['guide']);
                    $request->route()->setAction($routeAction);
                }
                else {
                    $userTour[] = $tourKey;
                    $user->update(['meta'=>json_encode(setMeta($user->getMeta(), 'tour', $userTour))]);
                }
            }
            
            return $next($request);

        }

        if(Auth::check()){
            Auth::logout();
            return redirect('/login');
        }
        abort(404);

    }
}
