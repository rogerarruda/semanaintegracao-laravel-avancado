<?php

Route::get('login', 'Admin\Auth\LoginController@showFormLogin')->name('login');
Route::post('login', 'Admin\Auth\LoginController@login')->name('login.post');
Route::post('logout', 'Admin\Auth\LoginController@logout')->name('logout');
Route::post('password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('password.reset.post');

});
