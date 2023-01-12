<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('authadmin:category_show')->only('json','index');
        $this->middleware('authadmin:category_create')->only('create','store');
        $this->middleware('authadmin:category_edit')->only('edit', 'update');
        $this->middleware('authadmin:category_delete')->only('destroy');
    }

    public function json()
    {
        $query = Category::select('id','name','created_at')->get();
        return datatables($query)->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.category.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create'); 
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
            'name' => 'required|string|max:50|unique:categories',
        ]);
        $row = new Category;
        $row->name = $request->name;
        $row->save();
        return redirect('/admin/categories')->with('success', 'تم اضافة البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Category::where('id',$id,);
        if( $row->count() > 0 ){
            $row = $row->first();
            return view('dashboard.category.edit',  compact('row'));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:categories,id',
            'name' => 'required|string|max:50|unique:categories,name,'.$request->id,
        ]);
        Category::where('id', $request->id)
        ->update([
            'name' => $request->name,
        ]);
        return redirect('/admin/categories')->with('success', 'تم تحديث البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:categories,id',
        ]);
        Category::where('id', $request->id)->delete();
        return redirect('/admin/categories')->with('success', 'تم حذف البيانات بنجاح');
    }
}
