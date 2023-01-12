<?php

namespace App\Http\Controllers;

use App\Models\Evidence;
use App\Models\Indicator;
use Illuminate\Http\Request;

class EvidenceController extends Controller
{

    public function __construct()
    {
        $this->middleware('authadmin:evidence_show')->only('json','index');
        $this->middleware('authadmin:evidence_create')->only('create','store');
        $this->middleware('authadmin:evidence_edit')->only('edit', 'update');
        $this->middleware('authadmin:evidence_delete')->only('destroy');
    }

    public function json()
    {
        $query = Evidence::with('indicator:id,name,standard_id','standard:id,name')->get();
        return datatables($query)->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.evidence.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $indicators = Indicator::select('id','name')->get();
        return view('dashboard.evidence.create', compact('indicators')); 
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
            'name' => 'required|string|max:500|unique:evidence',
            'indicator_id' => 'required|integer|exists:indicators,id',
        ]);
        $indicator = Indicator::where('id', $request->indicator_id)->first();
        $row = new Evidence;
        $row->name = $request->name;
        $row->indicator_id = $request->indicator_id;
        $row->standard_id = $indicator->standard_id;
        $row->category_id = $indicator->category_id;
        $row->save();
        return redirect('/admin/evidences')->with('success', 'تم اضافة البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evidence  $evidence
     * @return \Illuminate\Http\Response
     */
    public function show(Evidence $evidence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evidence  $evidence
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Evidence::where('id',$id,);
        if( $row->count() > 0 ){
            $row = $row->first();
            $indicators = Indicator::select('id','name')->get();
            return view('dashboard.evidence.edit',  compact('row','indicators'));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evidence  $evidence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:evidence,id',
            'name' => 'required|string|max:500|unique:evidence,name,'.$request->id,
            'indicator_id' => 'required|integer|exists:indicators,id',
        ]);
        $indicator = Indicator::where('id', $request->indicator_id)->first();
        Evidence::where('id', $request->id)->update([
            'name' => $request->name,
            'indicator_id' => $request->indicator_id,
            'standard_id' => $indicator->standard_id,
            'category_id' => $indicator->category_id
        ]);
        return redirect('/admin/evidences')->with('success', 'تم تحديث البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evidence  $evidence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:evidence,id',
        ]);
        Evidence::where('id', $request->id)->delete();
        return redirect('/admin/evidences')->with('success', 'تم حذف البيانات بنجاح');
    }
}
