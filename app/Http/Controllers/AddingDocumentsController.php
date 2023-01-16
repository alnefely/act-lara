<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Governor;
use App\Models\Category;
use App\Models\UserReg;
use App\Models\User;

class AddingDocumentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('authadmin:adding_document_show')->only('create','ajax');
        $this->middleware('authadmin:adding_document_create')->only('store');
    }

    public function create()
    {
        // $governors = Governor::select('id','name')->get();
        $categories = Category::select('id','name')->get();
        return view('dashboard.adding-documents.create', compact('categories'));
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'governor_id' => 'required|array|min:3|max:3',
            'governor_id.*' => 'exists:governors,id',
            'standard' => 'required|array',
            'standard.*' => 'exists:user_regs,id',
        ]); 
        UserReg::whereIn('id',$request->standard)->update([
            'governor_id1' => $request->governor_id[0],
            'governor_id2' => $request->governor_id[1],
            'governor_id3' => $request->governor_id[2],
        ]);
        return back()->with('success', 'تم اسناد المعايير بنجاح');
    }
    
    public function Governors(Request $request)
    {
        if( $request->ajax() ):
            $user = User::find($request->user_id);
            $Governors = Governor::select('id','name','gender')->where('gender',$user->gender)->get();
            return response()->json([
                'data' => $Governors,
            ]);
        endif;
    }

    public function users(Request $request)
    {
        if( $request->ajax() ):
            $cat = Category::where('id', $request->cat_id)->first();
            $users = User::where(['type'=>$cat->type,'category_id'=>$request->cat_id])->select('id','school_name','gender')->get();
            return response()->json([
                'users' => $users,
            ]);
        endif;
    }

    public function ajax(Request $request)
    {
        if( $request->ajax() ):
            $regs = UserReg::with('standard:id,name')
            ->whereNull('governor_id1')
            ->whereNull('governor_id2')
            ->whereNull('governor_id3')
            ->where('user_id', $request->user_id)
            ->get();
            return response()->json([
                'regs' => $regs,
            ]);
        endif;
    }
}
