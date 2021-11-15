<?php 

    # Transaction Order route 
    Route::group(['prefix' => 'order', 'as' => 'order.' ,'namespace'=>'Order'], function () {
        
        Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

        # TODO : Order processing function & order details
      
    });