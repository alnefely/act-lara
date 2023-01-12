<?php

namespace App\Http\Controllers;

use App\Models\Governor;
use Illuminate\Http\Request;

class GovernorController extends Controller
{
    public function __construct()
    {
        $this->middleware('authadmin:governor_show')->only('json','index');
        $this->middleware('authadmin:governor_create')->only('create','store');
        $this->middleware('authadmin:governor_edit')->only('edit', 'update');
        $this->middleware('authadmin:governor_delete')->only('destroy');
    }

    public function json()
    {
        $query = Governor::get();
        return datatables($query)->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.governor.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.governor.create'); 
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
            'username' => 'required|string|unique:governors|max:50',
            'phone' => 'required|numeric|digits_between:1,10',
            'password' => 'required|string|min:6|max:64',
            'manger_name' => 'required|string|max:50',
        ]);
        $row = new Governor;
        $row->name = $request->name;
        $row->username = $request->username;
        $row->phone = $request->phone;
        $row->password = bcrypt($request->password);
        $row->manger_name = $request->manger_name;
        $row->save();
        return redirect('/admin/governors')->with('success', 'تم اضافة البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Governor  $governor
     * @return \Illuminate\Http\Response
     */
    public function show(Governor $governor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Governor  $governor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Governor::where('id',$id);
        if( $row->count() > 0 ){
            $row = $row->first();
            return view('dashboard.governor.edit',  compact('row'));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Governor  $governor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:governors,id',
            'name' => 'required|string|max:50',
            'username' => 'required|string|max:50|unique:governors,username,'.$request->id,
            'phone' => 'required|numeric|digits_between:1,10',
            'manger_name' => 'required|string|max:50',
        ]);
        if( empty($request->password) ):
            $data = Governor::select('id','password')->where('id',$request->id)->first();
            $password = $data->password;
        else:
            $validatedData = $request->validate([
                'password' => 'required|string|min:6|max:64',
            ]);
            $password = bcrypt($request->password);
        endif;

        Governor::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'username' => $request->username,
            'manger_name' => $request->manger_name,
            'phone' => $request->phone,
            'password' => $password,
        ]);
        return redirect('/admin/governors')->with('success', 'تم تحديث البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Governor  $governor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:governors,id',
        ]);
        Governor::where('id', $request->id)->delete();
        return redirect('/admin/governors')->with('success', 'تم حذف البيانات بنجاح');
    }
}
