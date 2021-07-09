<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        return view('dashboard.settings.index');
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->location = $request->location;
        $setting->facebook_url = $request->facebook_url;
        $setting->youtube_url = $request->youtube_url;
        $setting->about_us = $request->about_us;
        $setting->time = $request->time;
        $setting->save();

        session()->flash('success', __('dashboard.statuses.settings_update'));

        return response()->json([
            'redir' => route('settings.index')
        ]);
    }
}
