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

Route::get('/', 'App\Http\Controllers\SurveyController@index')->name('index');
Route::get('/get-raw-data', 'App\Http\Controllers\SurveyController@getRawData')->name('rawdata');
Route::post('/survey-store', 'App\Http\Controllers\SurveyController@store')->name('survey-store');
Route::post('/gps-save', 'App\Http\Controllers\SurveyController@saveGps');
