<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


        <!-- SEO Meta Tags -->
    <meta name="description" content="{{ $settings['site_description'] ?? 'نقدم حلولاً متكاملة ومتخصصة في خدمات التنظيف والصيانة بأعلى معايير الجودة والاحترافية' }}">
    <meta name="keywords" content="تنظيف, صيانة, خدمات تنظيف, تنظيف منازل, صيانة طوارئ">
    <meta name="author" content="{{ $settings['site_name'] }}">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $settings['site_name'] }} | الرئيسية">
    <meta property="og:description" content="{{ $settings['site_description'] ?? 'نقدم حلولاً متكاملة ومتخصصة في خدمات التنظيف والصيانة بأعلى معايير الجودة والاحترافية' }}">
    <meta property="og:image" content="{{ asset('image/0.jpg') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $settings['site_name'] }}">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $settings['site_name'] }} | الرئيسية">
    <meta name="twitter:description" content="{{ $settings['site_description'] ?? 'نقدم حلولاً متكاملة ومتخصصة في خدمات التنظيف والصيانة بأعلى معايير الجودة والاحترافية' }}">
    <meta name="twitter:image" content="{{ asset('image/0.jpg') }}">
    
    <!-- Additional Meta Tags -->
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{{ $settings['site_name'] }} - خدمات التنظيف والصيانة">
    <meta name="twitter:image:alt" content="{{ $settings['site_name'] }} - خدمات التنظيف والصيانة">
    
    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('image/0.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('image/0.jpg') }}">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @routes
        @viteReactRefresh
        @vite(['resources/js/app.jsx', "resources/js/Pages/{$page['component']}.jsx"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
