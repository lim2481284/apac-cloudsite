<?php

    # Product Management Route
    Route::group(['prefix' => 'product' ,'access'=>'pd' , 'as' => 'product.', 'namespace'=>'Product'], function () {

        Route::get('/', ['as' => 'index', 'guide'=>'product', 'uses' => 'IndexController@index']);

        # TODO : Product CUD
        # TODO : Product Import 
        # TODO : Product Category management

    });
