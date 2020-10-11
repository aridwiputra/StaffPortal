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

Route::get('/', 'StaffController@index');
Route::get('/create', 'StaffController@create');
Route::post('/create', 'StaffController@store');
Route::get('/{id}', 'StaffController@edit');
Route::get('/staff/{id}', 'StaffController@show');
Route::post('/{id}', 'StaffController@update');
Route::delete('/delete', 'StaffController@destroy');

