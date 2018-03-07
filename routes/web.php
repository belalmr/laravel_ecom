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

// Route::get('/a', function(){
// 	return view('admin.layout.home');
// });

//Route::get('/test', function(){
//	return view('admin.layout.home');
//});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Config::set('auth.defines', 'admin');
    Route::get('login', 'AdminLogin@login');
//    Route::get('forgot/password', 'AdminLogin@remember_password');
    Route::post('login', 'AdminLogin@dologin');
//    Route::any('welcome', 'AdminLogin@register');
    Route::group(['middleware' => 'admin:admin'], function () {

        Route::get('/', function () {
            return view('admin.layout.home');
        });

        Route::any('logout', 'AdminLogin@logout');
    });

});