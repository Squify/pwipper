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
Route::get('/', 'PweepController@index')->name('homepage');
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('homepage');
});
Route::get('/profile', 'Auth\ProfileController@index')->name('profile')->middleware('auth');;
Route::get('/update-profile', 'Auth\UpdateProfileController@index')->name('updateProfile')->middleware('auth');;
Route::post('/update-profile', 'Auth\UpdateProfileController@updateProfile')->name('updateProfile')->middleware('auth');;

Route::get('/{id}', 'PweepController@remove')->name('deletePweep');

