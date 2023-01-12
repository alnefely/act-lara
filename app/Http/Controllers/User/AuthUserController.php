<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserReg;
use App\Models\Evidence;
use App\Models\Standard;
use File;

class AuthUserController extends Controller
{
    //
    public function home()
    {
        if ( auth()->check() ) :
            $category_id = auth()->user()->category_id;
            // $evidences = Evidence::with('UserReg:evidence_id','standard:id,name','indicator:id,name')->where('category_id', $category_id)->get();         
            $standards = Standard::where('category_id', $category_id)->get();         
            
            return view('auth-user.home', compact('standards'));
        else:
            return redirect('/auth/user');
        endif;
    }
    
    public function updatePost(Request $request)
    {
        if ( auth()->check() ) :

            $user = auth()->user();
            $validatedData = $request->validate([
                'url' => 'required|url|max:150',
                'standard_id' => 'required|integer|exists:standards,id',
            ]);

            $check = UserReg::where([
                'user_id' => $user->id,
                'category_id' => $user->category_id,
                'standard_id' => $request->standard_id,
            ]);
            if( $check->count() == 0 ) :
                $row = new UserReg;
                $row->user_id = $user->id;
                $row->category_id = $user->category_id;
                $row->standard_id = $request->standard_id;
                $row->url = $request->url;
                $row->save();
                return back()->with('success', 'تم حفظ الرابط بنجاح');
            endif;

            if( $check->count() > 0 ):
                $UserReg = $check->first();
                UserReg::where('id', $UserReg->id)->update([
                    'url' => $request->url
                ]);
                return back()->with('success', 'تم تحديث الرابط بنجاح');
            endif;

        else:
            return redirect('/auth/user');
        endif;
    }
    
    public function profile()
    {
        if ( auth()->check() ) :
            return view('auth-user.profile');
        else:
            return redirect('/auth/user');
        endif;
    }
    
    public function profileUpdate(Request $request)
    {
        if ( auth()->check() ) :

            $userData = auth()->user();
            $validatedData = $request->validate([
                'owner_phone' => 'required|numeric|digits_between:1,10',
                'email' => 'required|email|max:50|unique:users,email,'.$userData->id,
            ]);
    
            if( empty($request->password) ):
                $user = User::select('id','password')->where('id',$userData->id)->first();
                $password = $user->password;
            else:
                $validatedData = $request->validate([
                    'password' => 'required|string|min:6|max:64',
                ]);
                $password = bcrypt($request->password);
            endif;
            User::where('id', $userData->id)
            ->update([
                'owner_phone' => $request->owner_phone,
                'email' => $request->email,
                'password' => $password,
            ]);
            return back()->with('success', 'تم تحديث بيانات حسابك بنجاح');
        
        else:
            return redirect('/auth/user');
        endif;
    }

    public function login()
    {
        if ( auth()->check() ):
            return redirect('/user/home');
        else:
            return view('auth-user.login');
        endif;
    }



    public function logout()
    {
        if ( auth()->check() ):
            auth()->logout();
            return redirect('/auth');
        endif;
        return redirect('/auth');
    }

}
