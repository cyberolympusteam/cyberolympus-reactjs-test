<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' => 'users'], function () {
    Route::post('login', ['as' => 'login', 'uses' => 'Api\ApiController@login']);
});

Route::group(['prefix' => 'orders'], function () {
    Route::get('', ['as' => 'products.show.all', 'uses' => 'Api\ApiController@getOrder']);
    Route::post('store', ['as' => 'products.show.all', 'uses' => 'Api\ApiController@storeOrder']);
});

Route::group(['prefix' => 'products'], function () {
    Route::get('', ['as' => 'products.show.all', 'uses' => 'Api\ApiController@getProducts']);
    Route::post('store', ['as' => 'products.show.all', 'uses' => 'Api\ApiController@storeProduct']);
    Route::get('{productid}', ['as' => 'products.show.productid', 'uses' => 'Api\ApiController@getProductsById']);
});