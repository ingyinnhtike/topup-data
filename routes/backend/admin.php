<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 301);

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home', 'HomeController@search')->name('search');

Route::get('/voting', 'HomeController@voting')->name('voting.chart');

Route::resource('customers', 'CustomerController');

Route::get('otp/request', 'OTPRequestController@report')->name('otp.request');
Route::get('otp/search', 'OTPRequestController@search')->name('otp.search');
Route::post('otp/search', 'OTPRequestController@search')->name('otp.search');
Route::post('otp/download', 'OTPRequestController@download')->name('otp.download');

Route::get('top-up/request', 'TopUpRequestController@report')->name('top.up.request');
Route::get('top-up/search', 'TopUpRequestController@search')->name('top.up.search');
Route::post('top-up/search', 'TopUpRequestController@search')->name('top.up.search');
Route::post('top-up/download', 'TopUpRequestController@download')->name('top.up.download');

Route::get('otp/request/client', 'OTPClientRequestController@report')->name('otp.request.client');
Route::get('otp/search/client', 'OTPClientRequestController@search')->name('otp.search.client');
Route::post('otp/search/client', 'OTPClientRequestController@search')->name('otp.search.client');
Route::post('otp/download/client', 'OTPClientRequestController@download')->name('otp.download.client');

Route::get('top-up/request/client', 'TopUpClientRequestController@report')->name('top.up.request.client');
Route::get('top-up/search/client', 'TopUpClientRequestController@search')->name('top.up.search.client');
Route::post('top-up/search/client', 'TopUpClientRequestController@search')->name('top.up.search.client');
Route::post('top-up/download/client', 'TopUpClientRequestController@download')->name('top.up.download.client');

Route::resource('merchants', 'MerchantsController');

Route::resource('tokens', 'TokensController');

Route::resource('services', 'ServiceController');



