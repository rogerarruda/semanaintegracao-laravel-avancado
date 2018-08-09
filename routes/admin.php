<?php

Route::get('login', 'Admin\Auth\LoginController@showFormLogin')->name('login');
Route::post('login', 'Admin\Auth\LoginController@login')->name('login.post');
Route::post('logout', 'Admin\Auth\LoginController@logout')->name('logout');
Route::post('password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('password.reset.post');

Route::group(['middleware' => 'auth:admin', 'namespace' => 'Admin'], function(){
    Route::get('/', 'HomeController@index')->name('index');

    Route::group(['prefix' => 'products', 'as' => 'products.'], function(){
        Route::get('/', 				'ProductsController@index')->name('index');
		Route::get('create', 			'ProductsController@create')->name('create');
		Route::post('store', 			'ProductsController@store')->name('store');
		Route::get('show/{id}', 		'ProductsController@show')->name('show');
		Route::get('edit/{id}', 		'ProductsController@edit')->name('edit');
		Route::post('update/{id}', 	    'ProductsController@update')->name('update');
		Route::get('delete/{id}', 	    'ProductsController@destroy')->name('delete');
    });

});
