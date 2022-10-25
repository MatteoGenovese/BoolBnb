<?php

use App\Models\Apartment;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route:: namespace('api')->group(function(){
    Route::get('/totalCount', 'ApartmentController@totalCounts');
    Route::get('/apartments', 'ApartmentController@index');
    Route::post('/visuals/{id}', 'VisualController@update');
    Route::get('/visuals/{id}', 'VisualController@show');
    Route::get("/apartments/search/{latitude}&{longitude}", "ApartmentController@filteredIndex");
    Route::get('/apartments/{id}', 'ApartmentController@show');
    Route::get("/services", "ServiceController@index");
    Route::post("/messages", "MessageController@store");
});
