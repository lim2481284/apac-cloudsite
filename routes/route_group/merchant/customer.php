<?php 

    # Customer Management route 
    Route::group(['prefix' => 'customer' , 'as' => 'customer.', 'namespace'=>'Customer'], function () {

        Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);
        Route::get('/view', ['as' => 'view', 'uses' => 'IndexController@view']);
        
        # TODO : Customer details & processing function

    });