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

//Pages Controller
Route::get('/', 'PagesController@getLandingPage')->name('getLandingPage');


//News Controller
Route::post('/addNews', 'NewsController@addNews')->name('addNews');
Route::post('/{id}/editNews', 'NewsController@editNews')->name('editNews');
Route::delete('/{id}/deleteNews', 'NewsController@deleteNews')->name('deleteNews');

//Maps Controller
Route::post('/addMap', 'MapsController@addMap')->name('addMap');
Route::post('/{id}/editMap', 'MapsController@editMap')->name('editMap');
Route::delete('/{id}/deleteMap', 'MapsController@deleteMap')->name('deleteMap');