<?php

# Dashboard route namespace
Route::group(['namespace' => 'Merchant'], function () {

    # Auth route 
    require base_path('routes/route_group/merchant/auth.php');

    # Domain Check Route
    Route::post('/domain/check', ['as' => 'domain.check', 'uses' => 'Auth\OnboardingController@domainAvailability', 'middleware' => ['throttle:25,1']]);

    # Authenticated Route 
    Route::group(['middleware' => ['auth']], function () {

        # Logout - this one need to put out side 2fa middleware
        Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LogoutController@logout']);

        # Dashboard Middleware - to validate merchant permission
        Route::group(['middleware' => ['merchant.permission']], function () {

            # Dashboard Page
            Route::get('/', ['as' => 'dashboard' , 'guide' => 'db', 'uses' => 'IndexController@index']);

            # Account route 
            require base_path('routes/route_group/merchant/account.php');

            # Promotion route 
            require base_path('routes/route_group/merchant/promotion.php');

            # Customer route 
            require base_path('routes/route_group/merchant/customer.php');

            # Analysis route 
            require base_path('routes/route_group/merchant/analysis.php');

            # Order route 
            require base_path('routes/route_group/merchant/order.php');

            # Product route 
            require base_path('routes/route_group/merchant/product.php');

            # System route 
            require base_path('routes/route_group/merchant/system.php');

        });
    });
});