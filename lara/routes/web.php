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

Route::group(['middleware' => 'guest'], function() {
    Route::get('register', static function () {
        return view('auth.register');
    });
    Route::get('login', [
        'as' => 'login',
        'uses' => static function () {
            return view('auth.login');
        }
    ]);

    Route::post('register', 'App\Http\Controllers\Auth\RegisterController@process');
    Route::post('login', ['as' => 'login', 'uses' => 'App\Http\Controllers\Auth\LoginController@process']);
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('', ['as' => 'home', 'uses' => 'App\Http\Controllers\IndexController@index']);
});
