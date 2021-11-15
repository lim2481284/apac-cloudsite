<?php


    # Analysis route 
    Route::group(['prefix' => 'analysis' , 'as' => 'analysis.', 'namespace' => 'Analysis'], function () {

        Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

        # TODO : Analysis details & analysis processing function

    });
