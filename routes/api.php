<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
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

Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');
Route::get('/task', 'Api\TaskController@index');
Route::post('/task', 'Api\TaskController@store')->middleware('auth:api');
Route::get('/task/{task}', 'Api\TaskController@show');
Route::patch('task/{task}', 'Api\TaskController@update')->middleware(['auth:api','canupdate']);
Route::delete('task/{task}', 'Api\TaskController@destroy')->middleware(['auth:api','candelete']);