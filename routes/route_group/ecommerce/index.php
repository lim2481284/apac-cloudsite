<?php

# Socialite route 
require base_path('routes/route_group/ecommerce/socialite.php');

# Bind customer route 
Route::post('/customer/bind/{type?}', ['as' => 'customer.bind', 'uses' => 'Ecommerce\IndexController@bindCustomer']);

# Ecommerce route namespace
Route::group(['namespace' => 'Ecommerce', 'middleware' => ['ecommerce.process']], function () {

    # Auth route 
    require base_path('routes/route_group/ecommerce/auth.php');
    
    # Checkout route 
    require base_path('routes/route_group/ecommerce/checkout.php');

    # Static route 
    require base_path('routes/route_group/ecommerce/static.php');

    # Profile route 
    require base_path('routes/route_group/ecommerce/profile.php');

    # Favourite route 
    Route::post('/favourite/action', ['as' => 'favourite.action', 'uses' => 'Session\FavouriteController@action']);

    # Cart route 
    Route::post('/cart/action', ['as' => 'cart.action', 'uses' => 'Session\CartController@action']);

    # Cancel payment route 
    Route::post('/payment/cancel', ['as' => 'payment.cancel', 'uses' => 'PaymentController@cancel']);

    # Shipping Route 
    Route::post('/shipping/action', ['as' => 'shipping.action', 'uses' => 'ShippingController@action']);

});
