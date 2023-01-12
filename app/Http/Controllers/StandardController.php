<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use App\Models\Category;
use Illuminate\Http\Request;

class StandardController extends Controller
{
    public function __construct()
    {
        $this->middleware('authadmin:standard_show')->only('json','index');
        $this->middleware('authadmin:standard_create')->only('create','store');
        $this->middleware('authadmin:standard_edit')->only('edit', 'update');
        $this->middleware('authadmin:standard_delete')->only('destroy');
    }

    public function json()
    {
        $query = Standard::with('category:id,name')->get();
        return datatables($query)->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.standard.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id','name')->get();
        return view('dashboard.standard.create', compact('categories')); 
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
            'name' => 'required|string|max:500|unique:standards',
            'category_id' => 'required|integer|exists:categories,id',
        ]);
        $row = new Standard;
        $row->name = $request->name;
        $row->category_id = $request->category_id;
        $row->save();
        return redirect('/admin/standards')->with('success', 'تم اضافة البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    public function show(Standard $standard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Standard::where('id',$id,);
        if( $row->count() > 0 ){
            $row = $row->first();
            $categories = Category::select('id','name')->get();
            return view('dashboard.standard.edit',  compact('row','categories'));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:standards,id',
            'name' => 'required|string|max:500|unique:standards,name,'.$request->id,
            'category_id' => 'required|integer|exists:categories,id',
        ]);
        Standard::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);
        return redirect('/admin/standards')->with('success', 'تم تحديث البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:standards,id',
        ]);
        Standard::where('id', $request->id)->delete();
        return redirect('/admin/standards')->with('success', 'تم حذف البيانات بنجاح');
    }
}
