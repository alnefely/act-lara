<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\UserReg;
use App\Models\Evidence;
use Illuminate\Http\Request;
use App\Models\Degree;
use App\Models\Education;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('authadmin:user_show')->only('json','index');
        $this->middleware('authadmin:user_create')->only('create','store');
        $this->middleware('authadmin:user_edit')->only('edit', 'update');
        $this->middleware('authadmin:user_delete')->only('destroy');
    }

    public function json()
    {
        $userData = auth('AuthAdmin')->user();
        $selected = ['id','name','school_name','owner_phone','category_id','status','gender','created_at'];
        if( $userData->main == 'male' ):
            $query = User::where('gender', 'M')->select($selected)->with('category:id,name')->get();
        elseif( $userData->main == 'female' ):
            $query = User::where('gender', 'F')->select($selected)->with('category:id,name')->get();
        else:
            $query = User::select($selected)->with('category:id,name')->get();
        endif;
        
        // $query = User::select($selected)->with('category:id,name','posts:id,degree')->get();
        return datatables($query)->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id','name','type')->get();
        $educations = Education::select('id','name')->get();
        return view('dashboard.user.create', compact('categories','educations')); 
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
            'edit' => 'required|in:enable,disable',
            'category_id' => 'required|integer|exists:categories,id',
            
            'education_id' => 'required|integer|exists:education,id',
            'gender' => 'required|in:ذكر,انثي',
            'member1' => 'nullable|string|max:50',
            'member1_date' => 'nullable|date',
            'member2' => 'nullable|string|max:50',
            'member2_date' => 'nullable|date',
            'member3' => 'nullable|string|max:50',
            'member3_date' => 'nullable|date',
            'member4' => 'nullable|string|max:50',
            'member4_date' => 'nullable|date',
            'member5' => 'nullable|string|max:50',
            'member5_date' => 'nullable|date',
        ]);
        $cat = Category::find($request->education_id);

        $row = new User;
        $row->name = $request->name;
        $row->owner_phone = $request->owner_phone;
        $row->email = $request->email;
        $row->password = bcrypt($request->password);
        $row->school_name = $request->school_name;
        $row->manger_name = $request->manger_name;
        $row->manger_phone = $request->manger_phone;
        $row->type = $cat->type;
        $row->edit = $request->edit;
        $row->category_id = $request->category_id;
        $row->education_id = $request->education_id;
        $row->gender = $request->gender;
        $row->member1 = $request->member1;
        $row->member1_date = $request->member1_date;
        $row->member2 = $request->member2;
        $row->member2_date = $request->member2_date;
        $row->member3 = $request->member3;
        $row->member3_date = $request->member3_date;
        $row->member4 = $request->member4;
        $row->member4_date = $request->member4_date;
        $row->member5 = $request->member5;
        $row->member5_date = $request->member5_date;
        $row->save();
        return redirect('/admin/users')->with('success', 'تم اضافة المستخدم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function ArbitrationForm($id)
    {
        $UserReg = UserReg::with(
            'standard:id,name','category:id,name',
            'governor1:id,name',
            'governor2:id,name','governor3:id,name')->findOrFail($id);
        $degrees = Degree::where('reg_id', $UserReg->id)->with(
            'governor:id,name',
            'indicator:id,name',
            'evidence:id,name')->get();

        return view('dashboard.user.form', compact('UserReg','degrees'));
        // $row = User::where('id',$id);
        // if( $row->count() > 0 ) :
        //     $user = $row->first();
        //     $evidences = UserReg::with('standard:id,name','governor1:id,name','governor2:id,name','governor3:id,name')->where('user_id', $user->id)->get();
        //     // $TotalScores = UserReg::where('user_id', $user->id)->sum('degree');
        //     return view('dashboard.user.show', compact('user','evidences'));
        // endif;
        // abort(404);
    }
    
    public function show($id)
    {
        $row = User::where('id',$id);
        if( $row->count() > 0 ) :
            $user = $row->first();
            $evidences = UserReg::with('standard:id,name','governor1:id,name','governor2:id,name','governor3:id,name')->where('user_id', $user->id)->get();
            // $TotalScores = UserReg::where('user_id', $user->id)->sum('degree');
            return view('dashboard.user.show', compact('user','evidences'));
        endif;
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return $row = User::where('id',$id);
        if( $row->count() > 0 ){
            $row = $row->first();
            $categories = Category::select('id','name','type')->get();
            return view('dashboard.user.edit',  compact('row','categories'));
        }
        abort(404);
    }

    public function approve($id)
    {
        $data = User::find($id);
        $data->status = 1;
        $data->save();
        return redirect()->back()->with('success', 'تم قبول المستخدم بنجاح');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $request->all();
        $validatedData = $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'required|string|max:50',
            'owner_phone' => 'required|numeric|digits_between:1,10',
            'email' => 'required|email|max:50|unique:users,email,'.$request->id,
            'school_name' => 'required|string|max:50',
            'manger_name' => 'required|string|max:50',
            'manger_phone' => 'required|numeric|digits_between:1,10',
            // 'captin_name' => 'required|string|max:50',
            // 'captin_phone' => 'required|numeric|digits_between:1,10',
            'edit' => 'required|in:enable,disable',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        if( empty($request->password) ):
            $user = User::select('id','password')->where('id',$request->id)->first();
            $password = $user->password;
        else:
            $validatedData = $request->validate([
                'password' => 'required|string|min:6|max:64',
            ]);
            $password = bcrypt($request->password);
        endif;
        User::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'owner_phone' => $request->owner_phone,
            'email' => $request->email,
            'school_name' => $request->school_name,
            'manger_name' => $request->manger_name,
            'manger_phone' => $request->manger_phone,
            // 'captin_name' => $request->captin_name,
            // 'captin_phone' => $request->captin_phone,
            'edit' => $request->edit,
            'password' => $password,
            'category_id' => $request->category_id,
        ]);
        return redirect('/admin/users')->with('success', 'تم تحديث البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:users,id',
        ]);
        User::where('id', $request->id)->delete();
        return redirect('/admin/users')->with('success', 'تم حذف البيانات بنجاح');
    }
    
}
