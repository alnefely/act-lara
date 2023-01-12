<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use App\Models\Standard;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('authadmin:indicator_show')->only('json','index');
        $this->middleware('authadmin:indicator_create')->only('create','store');
        $this->middleware('authadmin:indicator_edit')->only('edit', 'update');
        $this->middleware('authadmin:indicator_delete')->only('destroy');
    }

    public function json()
    {
        $query = Indicator::with('standard:id,name')->get();
        return datatables($query)->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.indicator.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $standards = Standard::select('id','name')->get();
        return view('dashboard.indicator.create', compact('standards')); 
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
            'name' => 'required|string|max:500|unique:indicators',
            'standard_id' => 'required|integer|exists:standards,id',
        ]);
        $standard = Standard::where('id', $request->standard_id)->first();
        $row = new Indicator;
        $row->name = $request->name;
        $row->standard_id = $request->standard_id;
        $row->category_id = $standard->category_id;
        $row->save();
        return redirect('/admin/indicators')->with('success', 'تم اضافة البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Indicator  $indicator
     * @return \Illuminate\Http\Response
     */
    public function show(Indicator $indicator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Indicator  $indicator
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Indicator::where('id',$id,);
        if( $row->count() > 0 ){
            $row = $row->first();
            $standards = Standard::select('id','name')->get();
            return view('dashboard.indicator.edit',  compact('row','standards'));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Indicator  $indicator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:indicators,id',
            'name' => 'required|string|max:500|unique:indicators,name,'.$request->id,
            'standard_id' => 'required|integer|exists:standards,id',
        ]);
        $standard = Standard::where('id', $request->standard_id)->first();
        Indicator::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'standard_id' => $request->standard_id,
            'category_id' => $standard->category_id,
        ]);
        return redirect('/admin/indicators')->with('success', 'تم تحديث البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Indicator  $indicator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:indicators,id',
        ]);
        Indicator::where('id', $request->id)->delete();
        return redirect('/admin/indicators')->with('success', 'تم حذف البيانات بنجاح');
    }
}
