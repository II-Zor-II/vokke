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

Route::group(['namespace' => 'Api', 'middleware' => ['auth:api']],function() {
    Route::resource('kangaroo', 'KangarooController');
    Route::resource('user', 'UserController');
});

Route::resource('kangaroo', 'Api\KangarooController', ['only' => 'index']);
