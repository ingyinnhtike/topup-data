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

Route::group(['middleware' => 'ipcheck'], function () {

    // Check Balance API
    Route::post('excel/data/generate', 'ExcelDataTokenRequestController@index')->middleware('check.token.repuest.api.key.secret', 'client', 'auth:api')->name('data.generate');

    Route::post('data/generate', 'DataTokenRequestController@index')->middleware('check.token.repuest.api.key.secret', 'client', 'auth:api')->name('data.generate');

    Route::post('top-up/generate', 'TopUpTokenRequestController@index')->middleware('check.token.repuest.api.key.secret', 'client', 'auth:api')->name('top.up.generate');

    // Check Balance API
    Route::post('check/balance', 'CheckBalanceController@index')->middleware('check.token.repuest.api.key.secret', 'client', 'auth:api')->name('top.up.check');

    // user registeration and create service api
    // Route::post('registeration', 'RegisterationController@store')->middleware('check.token.repuest.api.key.secret', 'client', 'auth:api');

    Route::post('registeration', 'RegisterationController@store');
    Route::post('updateuserinfo', 'RegisterationController@update');

    //    Route::post('data/callback', 'DataTokenRequestController@callback')->name('otp.callback');

    Route::post('data/retry', 'RetryRequestController@index')->name('otp.retry');
});
