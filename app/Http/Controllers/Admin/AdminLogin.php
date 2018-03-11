<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Mail\AdminResetPassword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use SuperClosure\Analyzer\Token;
use DB;

class AdminLogin extends Controller
{
    public function login()
    {
//        if (Session::)
        
        return view('admin.login');
    }

    public function andmin_login()
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

    public function remember_password_post()
    {
        $admin = Admin::where('email', \request('email'))->first();
//        dd($admin);
        if (!empty($admin)) {
            $token = app('auth.password.broker')->createToken($admin);

            $data = DB::table('password_resets')->insert(
                ['email' => $admin->email, 'token' => $token, 'created_at' => Carbon::now()]);
            Mail::to($admin->email)->send(new AdminResetPassword(['data' => $admin, 'token' => $token]));

//            return new AdminResetPassword(['data' => $admin, 'token' => $token]);
            session()->flash('success', 'Reset Link is Sent');
            return back();
        }
        return back();
//        admin_reset_password
    }

    public function reset_password($token)
    {
        $check_token = DB::table('password_resets')
            ->where('token', $token)
            ->where('created_at', '>', Carbon::now()
                ->subHours(2))
            ->first();

        if (!empty($check_token)) {
            return view('admin.reset_password', ['data' => $check_token]);
        } else {
            return redirect('admin/forgot/password');
        }
//        return $check_token;
    }

    public function reset_password_post($token)
    {
        $this->validate(\request(), [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $check_token = DB::table('password_resets')
            ->where('token', $token)
            ->where('created_at', '>', Carbon::now()
                ->subHours(2))
            ->first();
       // return request();

        if (!empty($check_token)) {
            $admin_email = Admin::where('email', $check_token->email)->update(['email' => $check_token->email,
                'password' => bcrypt(\request('password'))]);
            DB::table('password_resets')->where('email', \request('email'))->delete();
//            \auth()->guard()->login($admin_email);
            // \auth()->guard()->attempt(['email' => $check_token->email, 'password' => request('password')], ture);
            // return request();
            session()->flash('resert_sucess', ' The Password is Reset success');
            return redirect(url('admin/login'));
//        return redirect('admin/login');
        }
    }

    public function register()
    {
        return view('welcome');
    }
}
