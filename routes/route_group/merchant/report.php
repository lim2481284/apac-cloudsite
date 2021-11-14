<?php


    # Report route 
    Route::group(['prefix' => 'report' , 'as' => 'report.', 'namespace' => 'Report'], function () {

        Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

        # TODO : Report details & report processing function

    });
