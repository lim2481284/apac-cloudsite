<?php


    # Promotion route 
    Route::group(['prefix' => 'promotion'  , 'as' => 'promotion.', 'namespace' => 'Promotion'], function () {

        Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

        # TODO : Product Discount function 
        # TODO : Promo code function 

    });
