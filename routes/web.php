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
Route::post('/dashboard/product', 'DashboardController@store');
Route::get('/dashboard/product/create', 'DashboardController@create');

Route::get('/top', 'TopController@index');
Route::post('/top/balance', 'TopController@store');
