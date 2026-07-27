<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $groupedSettings = Setting::all()->groupBy('setting_group');
        return view('admin.settings.index', compact('groupedSettings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'settings' => 'nullable|array',
            'site_logo' => 'nullable|image|mimes:jpeg,png,gif,webp|max:2048',
            'about_image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
            'hero_image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
        ]);

        if ($request->has('settings')) {
            foreach ($request->settings as $key => $value) {
                Setting::where('setting_key', $key)->update(['setting_value' => $value]);
            }
        }

        $imageFields = ['site_logo', 'about_image', 'hero_image'];
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('image', 'public');
                Setting::where('setting_key', $field)->update(['setting_value' => basename($path)]);
            }
        }

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }
}
