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

Route::group(['middleware' => ['web']], function () {
    //
});

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
    Route::post('/product', 'ProductController@store');
});
