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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/dashboard', 'DashboardController@index');
Route::get('/dashboard/orders', 'DashboardController@vieworders');
Route::get('/dashboard/products', 'DashboardController@viewproducts');
Route::get('/dashboard/product/create', 'DashboardController@viewcreate');

Route::get('/top', 'TopController@index');

Route::get('/order/history', 'OrderController@vieworders');
Route::get('/order/{product}', 'OrderController@index');
