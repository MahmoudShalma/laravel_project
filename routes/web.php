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

Route::get('create', function () {
    return view('form');
});


// Route::post('store','App\Http\Controllers\testController@store');
// Route::get('display','App\Http\Controllers\testController@index');
// Route::get('delete/{id}','App\Http\Controllers\testController@destroy');
// Route::get('edit/{id}','App\Http\Controllers\testController@edit');
// Route::post('update','App\Http\Controllers\testController@update');

 Route::resource('user','App\Http\Controllers\UserController');


 Route::resource('students','App\Http\Controllers\StudentsController')->middleware('auth');
 Route::get('Login','App\Http\Controllers\StudentsController@login')->name('Login');

 Route::post('doLogin','App\Http\Controllers\StudentsController@doLogin');

 Route::get('LogOut','App\Http\Controllers\StudentsController@Logout');


 Route::resource('std','stdController');
