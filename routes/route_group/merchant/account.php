<?php

# Account Route
Route::group(['prefix' => 'account', 'as' => 'account.', 'namespace' => 'Account'], function () {


    # Account profile route
    Route::group(['namespace'=>'Profile'], function () {
        
        Route::get('/', ['as' => 'index', 'guide'=>'acc', 'uses' => 'IndexController@index']);
        Route::post('/action', ['as' => 'action', 'guide'=>'acc', 'uses' => 'IndexController@action']);      
        Route::post('/password', ['as' => 'pass.update', 'uses' => 'SecurityController@changePassword','middleware'=>['throttle:15,1']]);
        Route::post('/setting', ['as' => 'setting.update', 'uses' => 'SettingController@update']);

    });


    # Credit group 
    Route::group(['prefix' => 'credit', 'as' => 'credit.', 'access'=>'cd'], function () {

        Route::get('/', ['as' => 'index', 'guide'=>'credit', 'uses' => 'CreditController@index']);
        Route::get('/get/{id}', ['as' => 'get', 'uses' => 'CreditController@get']);
        Route::get('/history', ['as' => 'history', 'guide' => 'table', 'uses' => 'CreditController@history']);

        # Topup group 
        Route::group(['prefix' => 'topup', 'as' => 'topup.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'TopupController@index']);

            # TODO : Topup function 

        });

        # Withdrawal group 
        Route::group(['prefix' => 'withdraw', 'as' => 'withdraw.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'WithdrawController@index']);
            
            # TODO : Withdrawal function 

        });

        # TODO : Bank Management function 

    });


    # Notification route 
    Route::group(['prefix' => 'notification', 'as' => 'notification.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'NotificationController@index']);
    });
    
});
