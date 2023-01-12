<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('authadmin:group_show')->only('json','index');
        $this->middleware('authadmin:group_create')->only('create','store');
        $this->middleware('authadmin:group_edit')->only('edit', 'update');
        $this->middleware('authadmin:group_delete')->only('destroy');
    }


    public function json()
    {   
        $query = Group::select('id','group_name','main','created_at');
        return datatables()->of($query)
        ->addColumn('ago', function($row){
            return $row->created_at->diffForHumans();
        })
        ->addColumn('admins', function($row){
            return $row->admins->count();
        })
        ->make(true);
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('dashboard.groups.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.groups.create');
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
            'group_name' => 'required|string|max:100|unique:groups',
        ]);

        $group = new Group();
        $group->group_name = $request->group_name;

        $group->filemanager_show        = $request->filemanager_show;
        $group->profile_edit            = $request->profile_edit;
        $group->setting_show            = $request->setting_show;
        $group->setting_edit            = $request->setting_edit;
        $group->admin_show              = $request->admin_show;
        $group->admin_create            = $request->admin_create;
        $group->admin_edit              = $request->admin_edit;
        $group->admin_delete            = $request->admin_delete;
        $group->group_show              = $request->group_show;
        $group->group_create            = $request->group_create;
        $group->group_edit              = $request->group_edit;
        $group->group_delete            = $request->group_delete;

        $group->save();
        return redirect('/admin/groups')->with('success', 'تم إنشاء المجموعة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::where(['id'=>$id, 'main'=>'normal']);
        if( $group->count() > 0 ){
            $group = $group->first();
            return view('dashboard.groups.edit',  compact('group'));
        }else {
            return redirect('/admin/404')->with('error', '404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $group = Group::where(['id'=>$request->id, 'main'=>'normal']);

        if( $group->count() > 0 ){

            $validatedData = $request->validate([
                'group_name' => 'required|string|max:150|unique:groups,group_name,'.$request->id,
            ]);

            Group::where(['id' => $request->id, 'main'=>'normal'])
            ->update([
                'group_name'        => $request->group_name,
                'filemanager_show'  => $request->filemanager_show,
                'profile_edit'      => $request->profile_edit,
                'setting_show'      => $request->setting_show,
                'setting_edit'      => $request->setting_edit,
                'admin_show'        => $request->admin_show,
                'admin_create'      => $request->admin_create,
                'admin_edit'        => $request->admin_edit,
                'admin_delete'      => $request->admin_delete,
                'group_show'        => $request->group_show,
                'group_create'      => $request->group_create,
                'group_edit'        => $request->group_edit,
                'group_delete'      => $request->group_delete,

                
            ]);
            return back()->with('success', 'تم تحديث المجموعة بنجاح');

        }
        else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $group = Group::where('id', $request->id);
        if( $group->count() > 0)
        {
            $group = $group->first();

            if( $group->main == 'main' )
            {
                return redirect('/admin/groups')->with('error', 'لا يمكن حذف المجموعة الرئيسية');
            }
            elseif ($group->admins->count() > 0) {
                return redirect('/admin/groups')->with('error', 'لا يمكن حذف هذه المجموعة لانها تحتوى على مدراء!');
            }
            else {
                $group->delete();
                return redirect('/admin/groups')->with('success', 'تم حذف المجموعة بنجاح');
            }
        }
        else {
            return redirect('/admin/404')->with('error', 'الصفحة غير متوفرة');
        }
        
    }
}
