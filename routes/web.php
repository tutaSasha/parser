<?php

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

Route::get('/', 'ParserController@index');
Route::get('/result-data', 'ParserController@getResultData');
Route::post('/set-new-parse', 'ParserController@setNewParse');
