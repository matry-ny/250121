<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], static function () {
    Route::get('users', 'App\Http\Controllers\Api\UsersController@all');

    Route::get('comments', 'App\Http\Controllers\Api\CommentsController@all');
    Route::post('comment', 'App\Http\Controllers\Api\CommentsController@create');
    Route::put('comment/{id}', 'App\Http\Controllers\Api\CommentsController@update');
    Route::delete('comment/{id}', 'App\Http\Controllers\Api\CommentsController@delete');
});
