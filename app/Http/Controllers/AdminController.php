<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Group;
use App\Models\Governor;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('authadmin:home')->only('home');
        $this->middleware('authadmin:profile_edit')->only('profile', 'update_profile');        
        $this->middleware('authadmin:admin_show')->only('json','index');
        $this->middleware('authadmin:admin_create')->only('create','store');
        $this->middleware('authadmin:admin_edit')->only('edit', 'update');
        $this->middleware('authadmin:admin_delete')->only('destroy');
    }


    public function json()
    {   
        $query = Admin::select('id','main', 'name', 'group_id', 'email', 'img', 'created_at');
        return datatables()->of($query)
        ->addColumn('group', function($row){
            return $row->group->group_name;
        })->make(true);
    }


    public function home()
    {   
        $Admins = Admin::count();
        $Governor = Governor::count();
        $Users = User::count();
        $contact = Contact::count();

        return view('dashboard.admin.home', compact('Admins','Governor','Users','contact'));
    }

    public function index()
    {
        return view('dashboard.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::select('id','group_name')->get();
        return view('dashboard.admin.create', compact('groups'));
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
            'name' => 'required|string|max:100|unique:admins',
            'email' => 'required|email|unique:admins',
            'info' => 'nullable|string|max:255',
            'img' => 'nullable|string|max:100',
            'password' => 'required|min:6|max:64',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'group_id' => 'integer|exists:groups,id',
        ]);

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->info = nl2br($request->info);
        $admin->img = $request->img;
        $admin->password = Hash::make($request->password);
        $admin->facebook = $request->facebook;
        $admin->twitter = $request->twitter;
        $admin->instagram = $request->instagram;
        $admin->youtube = $request->youtube;
        $admin->linkedin = $request->linkedin;
        $admin->group_id = $request->group_id;
        $admin->email_verified_at = now();
        $admin->save();
        return redirect('/admin/all')->with('success', 'تم انشاء المدير بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::where('id', $id);
        if( $admin->count() >= 1 ) {
        
            $admin = $admin->first();

            if($admin->main == 'main')
            {
                return redirect('/admin/all')->with('error', 'لا يمكن تعديل بيانات المدير الرئيسى');
            }else {
                $groups = Group::select('id','group_name')->get();
                return view('dashboard.admin.edit', compact('admin', 'groups'));
            }

        }else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:100|unique:admins,name,'.$request->id,
            'email' => 'required|email|unique:admins,email,'.$request->id,
            'info' => 'nullable|string|max:255',
            'img' => 'nullable|string|max:100',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'group_id' => 'integer|exists:groups,id',
        ]);

        if( empty($request->password) ){
            $password = $request->old_password;
        }else {
            $validatedData = $request->validate([
                'password' => 'required|string|min:6|max:60',
            ]);
            $password = Hash::make($request->password);
        }

        Admin::where('id',$request->id)
        ->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $password, 
            'group_id'  => $request->group_id,
            'info'      => nl2br($request->info),
            'img'       => $request->img,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'linkedin' => $request->linkedin,
        ]);
        return redirect('/admin/all')->with('success', 'تم تحديث بيانات المشرف بنجاح' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $admin = Admin::where('id', $request->id)->first();

        if ( $admin->main == 'main' ) {
            return redirect('/admin/all')->with('error', 'لا يمكن حذف المدير الرئيسى');
        }else {
            $admin->delete();
            return redirect('/admin/all/')->with('success', 'تم حذف المدير بنجاح');
           
        }
        
    }

    public function profile()
    {   
        return view('dashboard.admin.profile');
    }

    public function update_profile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100|unique:admins,name,'.adminInfo('id'),
            'email' => 'required|email|unique:admins,email,'.adminInfo('id'),
            'info' => 'nullable|string|max:255',
            'admin_logo' => 'nullable|string|max:100',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        if( empty($request->password) ){
            $password = adminInfo('password');
        }else {
            $validatedData = $request->validate([
                'password' => 'required|string|min:6|max:60',
            ]);
            $password = Hash::make($request->password);
        }

        Admin::where('id', adminInfo('id'))
        ->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $password, 
            'group_id'  => adminInfo('group_id'),
            'info'      => nl2br($request->info),
            'img'       => $request->admin_logo,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'linkedin' => $request->linkedin,
        ]);
        return back()->with('success', 'تم تحديث البيانات بنجاح' );
    }

}
