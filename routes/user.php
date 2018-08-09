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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['as' => 'user.', 'namespace' => 'User'], function() {
    Route::get('/', 'HomeController@index')->name('index');

    Route::get('/products',             'ProductsController@index')->name('products.index');
    Route::post('/products/buy/{id}',    'ProductsController@buy')->name('products.buy');

    Route::get('/orders',               'OrdersController@index')->name('orders.index');
    Route::get('/orders/cancel/{id}',   'OrdersController@cancel')->name('orders.cancel');
});
