<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Admin;
use App\Models\User;
use App\Models\Governor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetAdminPasswordMail;
use Illuminate\Support\Facades\Cookie;
use Session;


use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function auth() {
        return view('auth-admin.login');
    }


    public function check(Request $request)
    {
        $remembar = $request->remember ? true : false;
        if ( auth()->attempt(['email'=>$request->email, 'password'=>$request->password], $remembar) ):
            $user = User::where("email", $request->email)->first();
            auth()->login($user, $remembar);
            return redirect('/user/home');
        endif;

        if ( auth('AuthAdmin')->attempt(['email'=>$request->email, 'password'=>$request->password], $remembar) ):
            $admin = Admin::where("email", $request->email)->first();
            auth('AuthAdmin')->login($admin, $remembar);
            return redirect('/admin/home');
        endif;

        if ( auth('governor')->attempt(['username'=>$request->email, 'password'=>$request->password], $remembar) ):
            $Governor = Governor::where("username", $request->email)->first();
            auth()->login($Governor, $remembar);
            return redirect('/governor/home');
        endif;
        return back()->with('error', 'خطا فى بيانات الدخول');
    }

    public function forgetPassword()
    {
        return view('auth-admin.forget-password');
    }
    

    public function ResetPasword(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|string|max:50',
        ]);
        if( User::where('email',$request->email)->count() > 0 ) :
            $newPassword = rand(1234560, 6543210);
            Mail::to($request->email)->send(new ForgetAdminPasswordMail($newPassword));
            User::where('email', $request->email)
            ->update([
                'password'  => Hash::make($newPassword), 
            ]);
            return redirect('/auth')->with('success', 'تم إرسال كلمة السر الى البريد.' );
        endif;
        return back()->with('error', 'هذا البريد غير مسجل لدينا'); 
    }



    // register
    public function index()
    {
            $categories = Category::select('id','name')->get();
            return view('auth-user.register', compact('categories')); 
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'owner_phone' => 'required|numeric|digits_between:1,10',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|string|min:6|max:64',
            'school_name' => 'required|string|max:50',
            'manger_name' => 'required|string|max:50',
            'manger_phone' => 'required|numeric|digits_between:1,10',
            'captin_name' => 'required|string|max:50',
            'captin_phone' => 'required|numeric|digits_between:1,10',
            'category_id' => 'required|integer|exists:categories,id',
        ]);
        $row = new User;
        $row->name = $request->name;
        $row->owner_phone = $request->owner_phone;
        $row->email = $request->email;
        $row->password = bcrypt($request->password);
        $row->school_name = $request->school_name;
        $row->manger_name = $request->manger_name;
        $row->manger_phone = $request->manger_phone;
        $row->captin_name = $request->captin_name;
        $row->captin_phone = $request->captin_phone;
        $row->category_id = $request->category_id;
        $row->save();

        Session::flash('success' , 'تم التسجيل بنجاح وسيتم تفعيل الحساب خلال 24 ساعة');
        return redirect('/auth');
    }
}
