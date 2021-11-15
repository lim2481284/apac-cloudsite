<?php


# Ecommerce route namespace
Route::group(['namespace' => 'Ecommerce'], function () {

    # Ecommerce Demo Page
    Route::get('/{domain}', ['as' => 'index', 'uses' => 'IndexController@index']);

});
