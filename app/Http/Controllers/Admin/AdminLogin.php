<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLogin extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function dologin(Request $request)
    {
//        trans('admin_lang.test');
//        $rememberme = request('remember') == 1 ? true : false;
        if (auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')])) {
//        if ( Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]) ) {

//            , 'remember' => $rememberme])) {
            return view('admin.index');
        } else {
            session()->flash('error', trans('admin_lang.incorrect_information_login'));
            return redirect('admin.remember_password');
        }
//        return view('welcome2');
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('admin/login');
    }

    public function remember_password()
    {
        return view('admin.remember_password');
    }

    public function register()
    {
        return view('welcome');
    }
}
