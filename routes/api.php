<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/users', 'ApiController@users');
    Route::get('/alldata', 'ApiController@alldata');
    Route::get('/companies', 'ApiController@companiesList');
    Route::get('/categories', 'ApiController@categories');
    Route::get('/categoriesbyuser/{user}', 'ApiController@categoriesuser');
});
