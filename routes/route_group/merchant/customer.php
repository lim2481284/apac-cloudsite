<?php 

    # Customer Management route 
    Route::group(['prefix' => 'customer','access'=>'ctm' , 'as' => 'customer.', 'namespace'=>'Customer'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);
        
        # TODO : Customer details & processing function

    });