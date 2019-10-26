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

/* START SECTION THIRD PARTY INTEGRATION ROUTES */

Route::group(['namespace' => 'Hotels\ProvidersIntegrations'], function () {
    Route::get('hotels', 'SearchHotelController@search')->name('hotels.providers.search');
});

/* START SECTION THIRD PARTY INTEGRATION ROUTES */
