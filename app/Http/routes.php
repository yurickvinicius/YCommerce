<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', function(){
   return view('app');
});

Route::group(['prefix' => 'admin', 'where' => ['id' => '[0-9]+']], function() {

    Route::get('categories', ['as'=>'categories', 'uses'=>'CategoriesController@index']);
    Route::post('categories', ['as'=>'categories', 'uses'=>'CategoriesController@store']);
    Route::get('categories/create', ['as'=>'categories.create', 'uses'=>'CategoriesController@create']);
    Route::get('categories/{id}/destroy', ['as'=>'categories.destroy', 'uses'=>'CategoriesController@destroy']);
    Route::get('categories/{id}/edit', ['as'=>'categories.edit', 'uses'=>'CategoriesController@edit']);
    Route::put('categories/{id}/update', ['as'=>'categories.update', 'uses'=>'CategoriesController@update']);

    Route::get('products', ['as'=>'products', 'uses'=>'ProductsController@index']);
    Route::post('products', ['as'=>'products', 'uses'=>'ProductsController@store']);
    Route::get('products/create', ['as'=>'products.create', 'uses'=>'ProductsController@create']);
    Route::get('products/{id}/destroy', ['as'=>'products.destroy', 'uses'=>'ProductsController@destroy']);
    Route::get('products/{id}/edit', ['as'=>'products.edit', 'uses'=>'ProductsController@edit']);
    Route::put('products/{id}/update', ['as'=>'products.update', 'uses'=>'ProductsController@update']);
    Route::get('products/{id}/images', ['as'=>'products.images', 'uses'=>'ProductsController@images']);
    Route::get('products/{id}/images/create', ['as'=>'products.images.create', 'uses'=>'ProductsController@createImage']);
    Route::post('products/{id}/images/store', ['as'=>'products.images.store', 'uses'=>'ProductsController@storeImage']);
    Route::get('products/image/{id}/destroy', ['as'=>'products.images.destroy', 'uses'=>'ProductsController@destroyImage']);
    Route::get('products/{id}/tags', ['as'=>'products.tags', 'uses'=>'ProductsController@tags']);
    Route::get('products/{id}/tag/create', ['as'=>'products.tags_create', 'uses'=>'ProductsController@createTag']);
    Route::post('products/{id}/tag/store', ['as'=>'products.tags_store', 'uses'=>'ProductsController@storeTag']);
    Route::get('products/{product_id}/tag/{tag_id}/destroy', ['as'=>'products.tags_destroy', 'uses'=>'ProductsController@destroyTag']);

    Route::get('tags', ['as'=>'tags', 'uses'=>'TagsController@index']);

});
