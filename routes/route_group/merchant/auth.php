<?php 

Route::group(['namespace' => 'Auth'], function () {

    
    # Auth middleware
    Route::group(['middleware'=>'merchant.auth.validation'],function(){

        # Login Page
        Route::group(['prefix' => 'login', 'as' => 'login.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'LoginController@index']);
            Route::post('/', ['as' => 'submit', 'uses' => 'LoginController@login','middleware'=>['throttle:15,1']]);
        });


         # Register Page
        Route::group(['prefix' => 'register', 'as' => 'register.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'RegisterController@index']);
            Route::post('/', ['as' => 'submit', 'uses' => 'RegisterController@register','middleware'=>['throttle:15,1']]);
        });

    
        # Onboarding Route
        Route::group(['prefix' => 'onboarding', 'as' => 'onboarding.', 'validation'=>'onboarding'], function () {
            Route::get('/',['as' => 'index', 'uses' => 'OnboardingController@index']);
            Route::post('/', ['as' => 'submit', 'uses' => 'OnboardingController@submit']);
          
        });


        # TODO : Forgot password function & Reset password handling 

    });           


});
   