<?php
  
    # Checkout Route 
    Route::group(['prefix' => 'checkout', 'as' => 'checkout.'], function () {
        Route::get('/order', ['as' => 'index','uses' => 'CheckoutController@index']);            
        Route::post('/placeorder', ['as' => 'placeorder','uses' => 'CheckoutController@placeOrder']);
    });

    