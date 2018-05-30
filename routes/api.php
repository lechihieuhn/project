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


// List all or single article
Route::get('menu/{id?}', 'MenuController@index');
// Create new menu
Route::post('menu', 'MenuController@store');
// Update menu
Route::post('menu/{id}', 'MenuController@update');
// Delete menu
Route::delete('menu/{id}','MenuController@destroy');