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

Route::get('/', 'IndexController@index');
Route::post('/join', 'AdvocAuthController@join');
Route::post('/auth/login', 'AdvocAuthController@login');

Route::middleware('authorize')->group(function (){
    Route::post('/user/application', 'ApplicationController@apply');
    Route::post('/user/application/update', 'ApplicationController@update');
});


