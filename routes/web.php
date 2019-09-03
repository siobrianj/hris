<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Route::POST('/login/custom',[
	'uses' => 'LoginController@login',
	'as' => 'login.custom'
]);

Route::group(['middleware' => 'auth'],function(){
	Route::get('/dashboard',function(){
		return view('dashboard');
	})->name('dashboard');

	Route::get('/dashboard',function(){
		return view('dashboard');
	})->name('dashboard');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

#employeeRoutes
Route::get('/profile','EmployeeController@index');
