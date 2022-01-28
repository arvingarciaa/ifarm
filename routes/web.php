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

//Pages Controller
Route::get('/', 'PagesController@getLandingPage')->name('getLandingPage');
Route::post('/update/topBanner', 'PagesController@updateTopBanner')->name('updateTopBanner');
Route::post('/update/weather', 'PagesController@updateWeatherSection')->name('updateWeatherSection');
Route::post('/update/bulletin', 'PagesController@updateBulletinSection')->name('updateBulletinSection');
Route::post('/update/vegetation', 'PagesController@updateVegetationSection')->name('updateVegetationSection');
Route::post('/update/plantingStatus', 'PagesController@updatePlantingStatusSection')->name('updatePlantingStatusSection');
Route::post('/update/maps', 'PagesController@updateMapsSection')->name('updateMapsSection');
Route::post('/update/news', 'PagesController@updateNewsSection')->name('updateNewsSection');


//News Controller
Route::post('/addNews', 'NewsController@addNews')->name('addNews');
Route::post('/{id}/editNews', 'NewsController@editNews')->name('editNews');
Route::delete('/{id}/deleteNews', 'NewsController@deleteNews')->name('deleteNews');

//Maps Controller
Route::post('/addMap', 'MapsController@addMap')->name('addMap');
Route::post('/{id}/editMap', 'MapsController@editMap')->name('editMap');
Route::delete('/{id}/deleteMap', 'MapsController@deleteMap')->name('deleteMap');

//Vegetation Maps Controller
Route::post('/addVegetationMap', 'VegetationMapsController@addVegetationMap')->name('addVegetationMap');
Route::post('/{id}/editVegetationMap', 'VegetationMapsController@editVegetationMap')->name('editVegetationMap');
Route::delete('/{id}/deleteVegetationMap', 'VegetationMapsController@deleteVegetationMap')->name('deleteVegetationMap');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
