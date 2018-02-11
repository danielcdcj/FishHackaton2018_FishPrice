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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('insertPrice', 'FishPriceController@insertPrice');
//getLocations
Route::get('getLocations', 'FishPriceController@getLocations');
Route::get('getSpecies', 'FishPriceController@getSpecies');
//getYears
Route::get('getYears', 'FishPriceController@getYears');
Route::get('getPrice', 'FishPriceController@getPrice');
