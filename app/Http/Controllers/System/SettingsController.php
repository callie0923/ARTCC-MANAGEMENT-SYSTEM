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
        dd($request->all());
        $settings = Settings::find(1);
        $settings->artcc_code = $request->get('artcc_code');
        $settings->vatusa_uls_key = $request->get('uls_key');
        $settings->vatusa_api_key = $request->get('api_key');
        $settings->wx_nex_gen_radar = $request->get('wx_nex_gen_radar');
        $settings->wx_vis_radar = $request->get('wx_vis_radar');
        $settings->wx_infrared_radar = $request->get('wx_infrared_radar');
        $settings->wx_wind_surface_data = $request->get('wx_wind_surface_data');
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

    public function welcomeText(Request $request)
    {
        $welcome = $request->get('welcome_msg');
        $settings = Settings::find(1);
        $settings->welcome_text = $welcome;
        $settings->save();

        return redirect()->back()->with('alert-success', 'Welcome Message Succesfully Updated');
    }
}