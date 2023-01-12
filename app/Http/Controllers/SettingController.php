<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('authadmin:setting_show')->only('index');
        $this->middleware('authadmin:setting_edit')->only('update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sc = Setting::first();
        return view('dashboard.settings.index', compact('sc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'site_name' => 'required|string|max:100',
            'site_description' => 'required|string|max:160',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string|max:17',
            'address' => 'nullable|string|max:160',
            'site_logo' => 'required|string|max:100',
            'site_icon' => 'required|string|max:100',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'whatsapp' => 'nullable|url|max:255',
        ]);

        Setting::where('id', $request->id)
        ->update([
            'site_name'          => $request->site_name,
            'site_description'   => $request->site_description,
            'email'              => $request->email,
            'phone'              => $request->phone,
            'head_code'          => $request->head_code,
            'footer_code'        => $request->footer_code,
            'site_logo'          => $request->site_logo,
            'site_icon'          => $request->site_icon,
            'facebook'           => $request->facebook,
            'twitter'            => $request->twitter,
            'instagram'          => $request->instagram,
            'youtube'            => $request->youtube,
            'linkedin'           => $request->linkedin,
            'whatsapp'           => $request->whatsapp,
            'address'            => $request->address,
        ]);
        return back()->with('success',  'تم تحديث البيانات بنجاح' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
