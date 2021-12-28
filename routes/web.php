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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/{username}', 'profileController@show');
Route::get('/{username}', 'App\Http\Controllers\profileController@show')->name('profile');
Route::group(['middleware' => 'auth'], function () {
    Route::post('/follows','App\Http\Controllers\UserController@follows');
    Route::post('/unfollows', 'App\Http\Controllers\UserController@unfollows');
    Route::get('/following', 'App\Http\Controllers\profileController@following')->name('following');
});
Route::get('/{username}/followers', 'App\Http\Controllers\profileController@followers')->name('followers');
