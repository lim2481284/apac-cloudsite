<?php

# Account Route
Route::group(['prefix' => 'account', 'as' => 'account.', 'namespace' => 'Account'], function () {

    # Credit group 
    Route::group(['prefix' => 'credit', 'as' => 'credit.'], function () {

        Route::get('/', ['as' => 'index', 'uses' => 'CreditController@index']);

        # TODO : Topup function 

        # TODO : Withdrawal function 

        # TODO : Bank Management function 

    });

});
