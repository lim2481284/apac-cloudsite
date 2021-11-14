<?php

    # Shared auth checking 
    Route::post('/auth/fingerprint', ['as' => 'fingerprint', 'uses' => 'Auth\IndexController@fingerprint','middleware'=>['throttle:50,1']]);

    # Auth route 
    Route::group(['prefix' => 'auth', 'as' => 'auth.', 'namespace' => 'Auth', 'middleware'=>['ecommerce.auth.validation']], function () {
        
        # Login & Register
        Route::post('/login', ['as' => 'login', 'uses' => 'LoginController@login','middleware'=>['throttle:15,1']]);
        Route::post('/register', ['as' => 'register', 'uses' => 'RegisterController@register','middleware'=>['throttle:15,1']]);

        # Forgot password
        Route::get('/password/reset/{urlCode}', ['as' => 'reset.get', 'uses' => 'ForgotController@index','middleware'=>['throttle:15,1']]);
        Route::post('/password/reset', ['as' => 'reset', 'uses' => 'ForgotController@resetPassword','middleware'=>['throttle:15,1']]);
        Route::post('/password/reset/send', ['as' => 'reset.send', 'uses' => 'ForgotController@sendResetToken','middleware'=>['throttle:15,1']]);

    });
