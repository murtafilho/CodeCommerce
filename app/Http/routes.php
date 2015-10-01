<?php
Route::pattern('id', '[0-9+]');
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);


//ADMIN

Route::group(['prefix' => 'admin'], function () {

    //CATEGORIES

    Route::group(['prefix' => 'categories'], function () {

        get('/', ['as' => 'categories', 'uses' => 'CategoriesController@index']);

        get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);

        post('/', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);

        get('{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);

        get('{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);

        put('{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
    });

    //PRODUCTS

    Route::group(['prefix' => 'products'], function () {

        get('/', ['as' => 'products', 'uses' => 'ProductsController@index']);

        get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);

        post('/', ['as' => 'products', 'uses' => 'ProductsController@store']);

        get('{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);

        get('{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);

        put('{id}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);
    });

});



