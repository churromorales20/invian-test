<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'CompaniesController@dashboard')->name('home_dash');
    Route::post('/addcustomer', 'CompaniesController@addCustomer')->name('add_customer');
    Route::post('/addcategory', 'CompaniesController@addCategory')->name('add_category');
});

Auth::routes();
