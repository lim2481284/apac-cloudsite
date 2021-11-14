<?php

    # System route 
    Route::group(['prefix' => 'system', 'as' => 'system.', 'namespace' => 'System'], function () {

        Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);
          
        # General Setting Route
        Route::group(['prefix' => '/general', 'as' => 'general.'], function () {
            Route::get('/', ['as' => 'index', 'guide' => 'setting', 'uses' => 'GeneralController@index']);

            # TODO : Update general setting function
         
        });    

                    
        # Announcement Route
        Route::group(['prefix' => '/announcement', 'access'=>'anm', 'as' => 'announcement.'], function () {
            Route::get('/', ['as' => 'index', 'guide'=>'announcement', 'uses' => 'AnnouncementController@index']);
            
            # TODO : Announcement mangement function

        });    


        # Shipping route 
        Route::group(['prefix' => 'shipping' ,'access'=>'shp', 'as' => 'shipping.'], function () {
            Route::get('/', ['as' => 'index', 'guide'=>'courier', 'uses' => 'ShippingController@index']);
          
            # TODO : Shipping management function
        });


        # CMS route 
        Route::group(['prefix' => 'cms' ,'access'=>'cms', 'as' => 'cms.','editor'=> true], function () {
            Route::get('/', ['as' => 'index', 'guide'=>'cms', 'uses' => 'CMSController@index']);
           
            # TODO : Page builder function

        });


        # Staff Management route 
        Route::group(['prefix' => 'staff' ,'access'=>'stf' , 'as' => 'staff.'], function () {
            Route::get('/', ['as' => 'index', 'guide'=>'staff', 'uses' => 'StaffController@index']);
            
            # TODO : Staff management function

        });

        
        # Goal Management route
        Route::group(['prefix' => 'goal' ,'access'=>'gl' , 'as' => 'goal.'], function () {
            Route::get('/', ['as' => 'index', 'guide'=>'goal', 'uses' => 'GoalController@index']);
          
            # TODO : Goal management function

        });


    });
