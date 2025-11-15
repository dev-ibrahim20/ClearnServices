<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share settings data with all views
        view()->share('settings', [
            'site_name' => \App\Models\Setting::getValue('site_name', 'خدمات التنظيف المتخصصة'),
            'phone' => \App\Models\Setting::getValue('phone', '966500000000+'),
            'whatsapp' => \App\Models\Setting::getValue('whatsapp', ''),
            'email' => \App\Models\Setting::getValue('email', ''),
            'hero_title' => \App\Models\Setting::getValue('hero_title', ''),
            'hero_subtitle' => \App\Models\Setting::getValue('hero_subtitle', ''),
            'cta_text' => \App\Models\Setting::getValue('cta_text', 'اطلب خدمة التنظيف'),
            'seo_title' => \App\Models\Setting::getValue('seo_title', ''),
            'seo_description' => \App\Models\Setting::getValue('seo_description', ''),
            'services_per_page' => \App\Models\Setting::getValue('services_per_page', 12),
            'gallery_per_page' => \App\Models\Setting::getValue('gallery_per_page', 12),
            'years_experience' => \App\Models\Setting::getValue('years_experience', 5),
        ]);
    }
}
