<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::Get('login','OtManagerController@login_view');
Route::Get('logout','OtManagerController@logout');
Route::Get('overtime','OtManagerController@matches');
Route::Post('login','OtManagerController@login');
Route::Resource('/','OtManagerController');
