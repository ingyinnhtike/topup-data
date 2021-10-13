<?php

use App\Models\Service;
use Illuminate\Support\Facades\Request;
use App\Models\servicefield;

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::any('/', 'HomeController@index')->name('index');

Route::resource('customers', 'Auth\CustomerController');

/**
 * Service
 */
Route::get('create/ajax-service',function()
{
    $merchant_id = Request::get('merchant_id');
    $service = Service::query();
    $service->where('merchant_id','=',$merchant_id);
    return $service->get();

})->name('ajax.service');

/**
 * Service Field
 */
Route::get('create/ajax-service-field',function()
{
    $service_id = Request::get('service_id');
    $servicefield = servicefield::query();
    $servicefield->where('service_id','=',$service_id);
    return $servicefield->get();

})->name('ajax.service-field');
