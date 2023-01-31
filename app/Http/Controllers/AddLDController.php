<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Education;
use App\Models\AddLD;


class AddLDController extends Controller
{

    public function __construct()
    {
        $this->middleware('authadmin:addld_show')->only('json','index');
        $this->middleware('authadmin:addld_create')->only('create','store');
    }

    public function json()
    {
        $query = User::get();
        return datatables($query)->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.AddLD.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::select('id','school_name','j_date','u_link','education_id')->with( 'education:id,name')->get();
        return view('dashboard.AddLD.create', compact('users')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $row = User::find($request->id);
        // $row->j_date = $request->j_date;
        $row->u_link = $request->u_link;
        $row->save();
        return redirect('/admin/AddLD')->with('success', 'تم اضافة الرابط بنجاح');
    }
}