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

});
