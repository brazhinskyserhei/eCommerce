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

Route::prefix('admin')->group(function () {
	Route::get('/', function () {
        return view('admin.layout');
    });
	
	Route::get('{path}', function () {
        return view('admin.layout');
    })->where('path','([A-z\d-\/_.]+)?');
	
	//Route::get('{path}', 'HomeController@index')->where('path','([A-z\d-\/_.]+)?');
    //Route::resource('categories', 'Admin\CategoryController');
});

/*
Route::get('/admin', function () {
    return view('admin.layout');
});*/



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
