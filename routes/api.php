<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    // 'middleware' => ['auth:api'],
], function () {
    Route::get('/home/products', 'HomeController@products');

    Route::post('/product', 'DashboardController@store');
    Route::get('/orders', 'DashboardController@orders');
    Route::get('/products', 'DashboardController@products');

    Route::get('/top', 'TopController@tops');
    Route::post('/top/balance', 'TopController@store');

    Route::post('/order', 'OrderController@store');
    Route::get('/order/history', 'OrderController@orders');
});
