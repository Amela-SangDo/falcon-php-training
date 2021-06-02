<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/task', 'App\Http\Controllers\TaskController@task')->name('task')->middleware('auth');
Route::resource('/task', 'App\Http\Controllers\CreatetaskController', ['only' => [
    'create', 'store', 'edit', 'update'] 
]);
Route::get('/task-list', 'App\Http\Controllers\TasklistController@index')->name('task-list')->middleware('auth');
Route::get('/task-list/{task_id}/edit', 'App\Http\Controllers\CreatetaskController@edit')->name('edit')->middleware('auth');
Route::put('/task-list/{id}', 'App\Http\Controllers\CreatetaskController@update')->name('update');