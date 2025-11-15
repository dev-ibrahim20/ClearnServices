<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

    <title>@yield('title', 'لوحة التحكم') | مؤسسة الكمال</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <style>
      :root { --sidebar-width: 260px; }
      html, body { height: 100%; }
      body { font-family: 'Tajawal', sans-serif; background:#f5f7fb; }
      .admin-shell { min-height: 100vh; }
      .admin-sidebar { width: var(--sidebar-width); background:#0d1b2a; color:#cbd5e1; position: fixed; top:0; bottom:0; right:0; padding-top: 64px; }
      .admin-sidebar .brand { position: fixed; top:0; right:0; left:0; height:64px; background:#0b1320; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; }
      .admin-sidebar a { color:#cbd5e1; text-decoration:none; display:block; padding:.75rem 1rem; border-radius:.5rem; margin:.25rem .75rem; }
      .admin-sidebar a.active, .admin-sidebar a:hover { background:#14243a; color:#fff; }
      .admin-main { margin-right: var(--sidebar-width); padding-top: 72px; }
      .admin-topbar { height:64px; background:#ffffff; border-bottom:1px solid #e9ecef; position: fixed; top:0; right:var(--sidebar-width); left:0; z-index:10; display:flex; align-items:center; }
      .admin-topbar .container-fluid { display:flex; align-items:center; justify-content:space-between; }
      .stat-card { border:0; border-radius:1rem; }
    </style>
    @stack('head')
  </head>
  <body>
    <div class="admin-shell">
      <aside class="admin-sidebar">
        <div class="brand">لوحة التحكم</div>
        <nav class="mt-3">
          <a href="/kasc/dashboard" class="@yield('nav.dashboard')">الملخص</a>
          <a href="/kasc/services" class="@yield('nav.services')">الخدمات</a>
          <a href="/kasc/gallery" class="@yield('nav.gallery')">معرض الأعمال</a>
          <a href="/kasc/requests" class="@yield('nav.requests')">الطلبات</a>
          <a href="/kasc/settings" class="@yield('nav.settings')">الإعدادات</a>
          <form action="/logout" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm w-100">
              <i class="fas fa-sign-out-alt ms-2"></i>
              تسجيل الخروج
            </button>
          </form>
        </nav>
      </aside>

      <header class="admin-topbar">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center gap-3">
            <a class="btn btn-sm btn-outline-secondary" href="/" target="_blank">عرض الموقع</a>
          </div>
          <div class="d-flex align-items-center gap-3">
            <span class="text-muted small">مرحبا بك</span>
          </div>
        </div>
      </header>

      <main class="admin-main">
        <div class="container-fluid px-4 py-4">
          @yield('content')
        </div>
      </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
  </body>
</html>
