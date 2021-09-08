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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'App\Http\Controllers\Resource\CompanyController@index')->name('index');

Route::get('/search', 'App\Http\Controllers\Resource\CompanyController@search')->name('search');

Route::get('/show', 'App\Http\Controllers\Resource\CompanyController@search')->name('search');
