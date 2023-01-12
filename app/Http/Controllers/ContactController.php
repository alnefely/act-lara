<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use Session;

class ContactController extends Controller
{
    public function index(){

        $contacts = Contact::get();

        return view('dashboard.contact.index',compact('contacts'));

    }

    
    public function store(Request $request){
        $data = new Contact;
        $data->user_chat = $request->user_chat;
        $data->email_chat = $request->email_chat;
        $data->messag_send = $request->messag_send;
        $data->save();
        Session::flash('success' , 'تم ارسال الرسالة');        
        return redirect()->back();
    }




    public function read($id){

        $data = Contact::findOrFail($id);
        $data->read_mes = 1;
        $data->save();

        Session::flash('success' , 'تم تعليم الرسالة كمقروء');
        return redirect()->route('admin.users.contact');

    }
}
