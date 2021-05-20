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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/task', [App\Http\Controllers\TaskController::class, 'task'])->name('task');
Route::resource('/task', 'App\Http\Controllers\CreatetaskController', ['only' => [
    'create', 'store', 'edit'] 
]);
Route::get('/task-list', [App\Http\Controllers\TasklistController::class, 'index'])->name('task-list');