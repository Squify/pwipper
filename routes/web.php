<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/admin/users', 'AdminController@users')->name('adminUsers')->middleware('auth');
Route::post('/admin/users/create', 'AdminController@create')->name('adminCreate')->middleware('auth');
Route::get('/admin/pweeps', 'AdminController@pweeps')->name('adminPweeps')->middleware('auth');
Route::get('/admin/notifications', 'AdminController@notifications')->name('adminNotifications')->middleware('auth');

Route::get('/profile/{pseudo}', 'Auth\ProfileController@index')->name('profile')->middleware('auth');
Route::get('/profile/{pseudo}/media', 'Auth\ProfileController@media')->name('mediaProfile')->middleware('auth');
Route::get('/profile/{pseudo}/likes', 'Auth\ProfileController@likes')->name('likesProfile')->middleware('auth');

Route::get('/profile/{pseudo}/update', 'Auth\UpdateProfileController@index')->name('updateProfile')->middleware('auth');
Route::post('/profile/{pseudo}/update', 'Auth\UpdateProfileController@updateProfile')->name('updateProfile')->middleware('auth');
Route::get('/profile/{pseudo}/remove', 'Auth\UpdateProfileController@remove')->name('deleteProfile')->middleware('auth');

Route::get('/search', 'PweepController@search')->name('search')->middleware('auth');

Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact', 'ContactController@email')->name('sendMail');

Route::post('/pweep', 'PweepController@store')->name('storePweep')->middleware('auth');
Route::get('/pweep/details/{id}', 'PweepController@details')->name('detailsPweep')->middleware('auth');
Route::get('/pweep/{id}', 'PweepController@remove')->name('deletePweep')->middleware('auth');
Route::post('/pweep/{id}', 'PweepController@update')->name('updatePweep')->middleware('auth');
Route::get('/pweep/response/{id}', 'PweepController@response')->name('responsePweep')->middleware('auth');
Route::post('/pweep/response/{id}', 'PweepController@responsePost')->name('responsePweepPost')->middleware('auth');

Route::get('/pweep/like/{id}', 'PweepController@like')->name('likePweep')->middleware('auth');
Route::get('/pweep/repweep/{id}', 'PweepController@repweep')->name('repweep')->middleware('auth');

Route::get('/notifications', 'NotificationController@index')->name('notifications')->middleware('auth');
Route::get('/notifications/delete/{id}', 'NotificationController@remove')->name('deleteNotification')->middleware('auth');
Route::get('/notifications/read/{id}', 'NotificationController@read')->name('readNotification')->middleware('auth');
