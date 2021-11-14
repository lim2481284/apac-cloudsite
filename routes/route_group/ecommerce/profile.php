<?php

# Authenticated Route 
Route::group(['middleware' => ['auth', 'user.permission']], function () {

    # Logout 
    Route::get('/profile/logout', ['as' => 'logout', 'uses' => 'Auth\IndexController@logout']);

    # Profile route 
    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace'=>'Profile'], function () {

        Route::get('/view', ['as' => 'index', 'uses' => 'IndexController@index']);
        Route::post('/update', ['as' => 'update', 'uses' => 'IndexController@update','middleware'=>['throttle:15,1']]);
        
        # My Point Group 
        Route::group(['prefix' => 'point', 'as' => 'point.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'PointController@index']);
        });       
        
        # Promo code Group 
        Route::group(['prefix' => 'promocode', 'as' => 'promocode.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'PromocodeController@index']);
            Route::get('/{uid}', ['as' => '.get', 'uses' => 'PromocodeController@get','middleware'=>['throttle:25,1']]);
        });       
     
        # Order History Group
        Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
            Route::get('/history', ['as' => 'history', 'uses' => 'HistoryController@index']);
            Route::get('/tracking/awb/{awb}', ['as' => 'shipping.tracking.awb', 'uses' => 'HistoryController@shippingTrackingAWB']);
            Route::get('/tracking/code/{code}', ['as' => 'shipping.tracking.code', 'uses' => 'HistoryController@shippingTrackingCode']);
            Route::post('/check', ['as' => 'check', 'uses' => 'HistoryController@checkOrder']);
        });

    });
    
});