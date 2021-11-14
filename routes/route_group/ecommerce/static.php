<?php 

 # Middleware for tracking
 Route::group(['middleware' => 'tracking'], function () {

    # Static page  
    Route::get('/{page?}', ['as' => 'static','uses' => 'IndexController@staticPage']);

    # FAQ group 
    Route::group(['prefix' => 'faq', 'as' => 'faq.'], function () {
        Route::get('/view', ['as' => 'index', 'uses' => 'FAQController@index']);
        Route::get('/search', ['as' => 'search', 'uses' => 'FAQController@search']);
    });   
         
    # Product Route 
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/{productCode}', ['as' => 'index','uses' => 'ProductController@index']);                    
    });

    # Preview route  
    Route::get('/preview/{uid}/{page?}', ['as' => 'preview','uses' => 'IndexController@preview']);

});