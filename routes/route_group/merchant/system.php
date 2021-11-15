<?php

    # Store route 
    Route::group(['prefix' => 'store', 'as' => 'store.', 'namespace' => 'Store'], function () {

        Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);
          
        # TODO : Update general setting function
        
        # TODO : Announcement mangement function         
        
        # TODO : Shipping management function
        
        # TODO : Page builder function
        
        # TODO : Staff management function

        # TODO : Goal management function
        
    });
