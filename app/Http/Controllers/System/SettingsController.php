<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\System\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::find(1);
        return view('system.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = Settings::find(1);
        $settings->artcc_code = $request->get('artcc_code');
        $settings->vatusa_uls_key = $request->get('uls_key');
        $settings->vatusa_api_key = $request->get('api_key');
        $settings->save();

        return response()->json(['success' => true]);
    }

    public function logo(Request $request)
    {
        $file = $request->file('artcc_logo');
        $destination = public_path('assets/images');
        $filename = 'logo.png';
        $file->move($destination, $filename);
        return redirect()->back()->with('alert-success', 'Logo has been updated!');
    }
}