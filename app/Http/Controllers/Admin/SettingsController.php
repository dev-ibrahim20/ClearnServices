<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = [
            'site_name' => Setting::getValue('site_name', 'مؤسسة الكمال'),
            'phone' => Setting::getValue('phone', ''),
            'whatsapp' => Setting::getValue('whatsapp', ''),
            'email' => Setting::getValue('email', ''),
            'hero_title' => Setting::getValue('hero_title', ''),
            'hero_subtitle' => Setting::getValue('hero_subtitle', ''),
            'cta_text' => Setting::getValue('cta_text', 'اطلب خدمة الآن'),
            'seo_title' => Setting::getValue('seo_title', ''),
            'seo_description' => Setting::getValue('seo_description', ''),
            'services_per_page' => Setting::getValue('services_per_page', 12),
            'gallery_per_page' => Setting::getValue('gallery_per_page', 12),
        ];
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_name' => ['nullable','string','max:255'],
            'phone' => ['nullable','string','max:50'],
            'whatsapp' => ['nullable','string','max:50'],
            'email' => ['nullable','email','max:255'],
            'hero_title' => ['nullable','string','max:255'],
            'hero_subtitle' => ['nullable','string','max:500'],
            'cta_text' => ['nullable','string','max:255'],
            'seo_title' => ['nullable','string','max:255'],
            'seo_description' => ['nullable','string','max:500'],
            'services_per_page' => ['nullable','integer','min:3','max:48'],
            'gallery_per_page' => ['nullable','integer','min:4','max:48'],
        ]);

        foreach ($data as $k => $v) {
            Setting::setValue($k, $v ?? '');
        }

        return redirect()->route('admin.settings.index')->with('success', 'تم حفظ الإعدادات بنجاح');
    }
}
