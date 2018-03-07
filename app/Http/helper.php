<?php
// admin url
namespace App\Http;
//use Illuminate\Foundation\Http\Kernel as HttpKernel;

if (!function_exists('admin_url')) {
    function admin_url($url = null)
    {
        return url('admin/' . $url);
    }
}

if (!function_exists('admin')) {
    function admin_auth()
    {
        return auth()->guard('admin');
    }
}