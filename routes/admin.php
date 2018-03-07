<?php

//Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
//
////    Config::set('auth.defines', 'admin');
//    Route::get('login', 'AdminLogin@login');
//    Route::get('forgot/password', 'AdminLogin@remember_password');
//    Route::post('login', 'AdminLogin@dologin');
////    Route::any('welcome', 'AdminLogin@register');
//    Route::group(['middleware' => 'admin:admin'], function () {
//
//        Route::get('/', function () {
//            return view('admin.layout.home');
//        });
//
//        Route::any('logout', 'AdminLogin@logout');
//    });
//
//});

// Route::any('logout', 'Admin\AdminLogin@logout');
//Route::any('welcome', 'Admin\AdminLogin@register');
//Route::get('login', 'Admin\AdminLogin@login');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin.layout.home');
    });
});