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

Auth::routes();

Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
Route::resource('users', App\Http\Controllers\Admin\UserController::class)->except(['create', 'edit']);