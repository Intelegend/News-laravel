<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
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


Route::get('news/id/{id}', 'App\Http\Controllers\NewsController@show');
Route::get('/', 'App\Http\Controllers\NewsController@index');
Route::get('news', 'App\Http\Controllers\NewsController@allNews');
Route::get('search', 'App\Http\Controllers\NewsController@search')->name('search');
Route::get('favorite', 'App\Http\Controllers\NewsController@favoriteShow');
Route::get('favoriteAdd', 'App\Http\Controllers\NewsController@favoriteAdd')->name('favoriteAdd');;
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
