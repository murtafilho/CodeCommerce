<?php
Route::get('/', ['as' => 'home', 'uses' => 'StoreController@index']);

Route::get('/s3put',['as'=>'testes3put','uses'=> 'AwsController@putObj']);
//ADMIN
Route::get('/s3get',['as'=>'testes3get','uses'=> 'AwsController@getObj']);

Route::group(['prefix' => 'admin','where'=>['id'=>'[0-9]+']], function () {

    Route::pattern('id', '^[0-9]+$');

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

        Route::group(['prefix'=>'images'],function(){

            get('{id}/product',['as'=>'products.images','uses' => 'ProductsController@images']);

            get('create/{id}/product',['as'=>'products.images.create','uses' => 'ProductsController@createImage']);

            post('store/{id}/product',['as'=>'products.images.store','uses' => 'ProductsController@storeImage']);

            get('destroy/{id}/image',['as'=>'products.images.destroy','uses' => 'ProductsController@destroyImage']);

            get('imageerror/{key}/image',['as'=>'products.images.error','uses' => 'ProductsController@imageError']);
        });
    });

});



