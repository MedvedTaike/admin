<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/first', function () {
    return view('first');
});
Route::get('/second', function () {
    return view('second');
});
Route::get('/third', function () {
    return view('third');
});
Route::get('/starter', function () {
    return view('starter');
});
Route::get('/', 'AuthController@show')->name('/');

Route::post('/login', 'AuthController@login')->name('login');

Route::group(['middleware'	=>	'auth'], function(){
	Route::get('/admin', 'AdminController@index');
    Route::get('/orders/party', 'AdminController@party')->name('orders.party');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/products', 'ProductsController');
    Route::resource('/users', 'UsersController');
    Route::resource('/brands', 'BrandsController');
    Route::resource('/sellers', 'SellersController');
    Route::resource('/regions', 'RegionController');
    Route::resource('/orders', 'OrdersController');
    Route::resource('/price-groups', 'PriceGroupController');
    Route::get('/logout', 'AuthController@logout')->name('logout');
});
