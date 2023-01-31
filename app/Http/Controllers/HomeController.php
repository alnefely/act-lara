<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserReg;
use App\Models\Education;





use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
    
        $users = User::where('status', 1)->with('posts:id,user_id','education:id,name')->orderBy('education_id','desc')->get();
        return view('welcome' , compact('users')); 
        // return $users;
    }


}
