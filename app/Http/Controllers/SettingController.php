<?php

namespace App\Http\Controllers;

use App\Models\setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = setting::first();
        return view('setting.index', compact('setting'));
    }

    public function edit($id)
    {
        $setting = setting::findOrFail($id);
        return view('setting.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required',
            'address' => 'required',
            'email'   => 'required|email',
            'favicon' => 'nullable|image|mimes:png,jpg,ico|max:2048',
            'logo'    => 'nullable|image|mimes:png,jpg,webp|max:2048',
        ]);

        $setting = Setting::findOrFail($id);
        $setting->name = $request->name;
        $setting->address = $request->address;
        $setting->email = $request->email;

        // Upload favicon
        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $filename = 'favicon_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/setting'), $filename);
            $setting->favicon = $filename;
        }

        // Upload logo
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/setting'), $filename);
            $setting->logo = $filename;
        }

        $setting->save();

        return redirect()->route('setting.index')->with('success', 'Setting berhasil diperbarui.');
    }
}
