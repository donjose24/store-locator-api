<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::post('oauth/access_token', function () {
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['middleware' => 'oauth'], function () {
    Route::get('/what', function () {
        return "WOW";
    });
});
Route::get('/api/store/', 'Api\StoreController@all');
Route::get('/api/store/{id}', 'Api\StoreController@show');
Route::get('/api/product/', 'Api\ProductController@all');
Route::get('/api/product/search', 'Api\ProductController@search');
Route::get('/api/analytics', 'Api\ApiController@analytics');
Route::get('/', 'HomeController@index');
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('/stores', 'HomeController@stores');
    Route::get('/medicines', 'HomeController@medicines');
    Route::post('/product', 'Api\ProductController@store');
    Route::post('/store', 'Api\StoreController@store');
    Route::get('/store/delete/{id}', 'Api\StoreController@destroy');
    Route::get('/product/edit/{id}', 'Api\ProductController@edit');
    Route::get('/store/edit/{id}', 'Api\StoreController@edit');
    Route::get('/product/delete/{id}', 'Api\ProductController@destroy');
    Route::get('/store/view/{id}', 'Api\StoreController@view');
    Route::put('/product', 'Api\ProductController@update');
    Route::put('/stores', 'Api\StoreController@update');
    Route::get('/store/product/add/{id}/{storeId}', 'Api\StoreController@addMedicine');
    Route::get('/store/product/remove/{id}/{storeId}', 'Api\StoreController@deleteMedicine');
});
