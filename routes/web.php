<?php

use app\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');


/**
 * Auth
 */
Route::get('/signup', 'AuthController@getSignup')->name('auth.signup');
Route::post('/signup', 'AuthController@postSignup');

Route::get('/signin', 'AuthController@getSignin')->name('auth.signin');
Route::post('/signin', 'AuthController@postSignin');
