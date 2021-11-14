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

    
        # Startup Route
        Route::group(['prefix' => 'startup', 'as' => 'startup.', 'validation'=>'startup'], function () {
            Route::get('/',['as' => 'index', 'uses' => 'StartupController@index']);
            Route::post('/', ['as' => 'submit', 'uses' => 'StartupController@submit']);
          
        });


        # Forgot password
        Route::group(['prefix' => 'forgot/{method?}', 'as' => 'forgot.', 'validation'=>'forgot'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'ForgotPasswordController@index']);

            # TODO : Forgot password function & Reset password handling
        });

    });           


});
   