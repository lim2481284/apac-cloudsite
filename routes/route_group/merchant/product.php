<?php

    # Product Management Route
    Route::group(['prefix' => 'product', 'as' => 'product.', 'namespace'=>'Product'], function () {

        Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

        # TODO : Product CUD
        # TODO : Product Import 
        # TODO : Product Category management

    });
