<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetAdminPasswordMail;
use Illuminate\Support\Facades\Cookie;

class AuthAdminController extends Controller
{


    public function login()
    {
        if ( Auth::guard('AuthAdmin')->check() ) {
            return redirect('/admin/home');
        }else {
            return view('auth-admin.login');
        }
    }

    public function logout()
    {
        if ( Auth::guard('AuthAdmin')->check() ) {
            Auth::guard('AuthAdmin')->logout();
            return redirect('/auth');
        }
        return redirect('/auth');
    }
    


}
