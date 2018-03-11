<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

//    Config::set('auth.defines', 'admin');
//    Route::get('/', function (){
//        return 'hi';
//    });
    Route::get('login', 'AdminLogin@login');
//        ->middleware('admin');
//    Route::get('pages/mainpage', ['middleware' => 'auth', 'uses' => 'AdminLogin@login']);

    Route::post('login', 'AdminLogin@dologin');
    Route::get('forgot/password', 'AdminLogin@remember_password');
    Route::post('forgot/password', 'AdminLogin@remember_password_post');
    Route::get('password/{token}', 'AdminLogin@reset_password');
    Route::post('password/{token}', 'AdminLogin@reset_password_post');

//    Route::any('welcome', 'AdminLogin@register');
    Route::group(['middleware' => 'admin:admin'], function () {

        Route::get('/', function () {
            return view('admin.layout.home');
        });

        Route::any('logout', 'AdminLogin@logout');
    });

});

// Route::any('logout', 'Admin\AdminLogin@logout');
//Route::any('welcome', 'Admin\AdminLogin@register');
//Route::get('login', 'Admin\AdminLogin@login');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin.layout.home');
    });
});
Route::get('/admin', function (){
    return var_dump($_COOKIE);
});

//Route::get('login', 'Admin\AdminLogin@login')->middleware('admin');
//Route::post('login', 'Admin\AdminLogin@dologin');
//Route::post('pages/mainpage', [ 'as' => 'login', 'uses' => 'Admin\AdminLogin@dologin']);

//Route::get('pages/mainpage', ['middleware' => 'auth', 'uses' => 'Admin\AdminLogin@login']);