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
    return view('layouts/base');
});


/**
 * Route Pweeps
 */
Route::get('/home', 'PweepController@index')->name('pweep');
Route::delete('/home/{id}', 'PweepController@remove')->name('deletePweep');
Route::get('/home/add', 'PweepController@add')->name('addPweep');