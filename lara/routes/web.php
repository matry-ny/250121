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

Route::group(['middleware' => 'guest'], static function () {
    Route::get('register', fn () => view('auth.register'));
    Route::get('login', [
        'as' => 'login',
        'uses' => fn () => view('auth.login')
    ]);

    Route::post('register', 'App\Http\Controllers\Auth\RegisterController@process');
    Route::post('login', ['as' => 'login', 'uses' => 'App\Http\Controllers\Auth\LoginController@process']);
});

Route::group(['middleware' => 'auth'], static function () {
    Route::get('', fn () => view('index'));
    Route::get('logout', 'App\Http\Controllers\Auth\LogoutController@process');
    Route::post('import.excel', 'App\Http\Controllers\ExcelController@import')->name('import.excel');
    Route::get('export.excel', 'App\Http\Controllers\ExcelController@export')->name('export.excel');
    Route::get('liqpay', 'App\Http\Controllers\PaymentsController@liqpay')->name('payments.liqpay');
});
