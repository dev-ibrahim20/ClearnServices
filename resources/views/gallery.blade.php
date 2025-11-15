<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $settings['site_name'] }} | معرض الأعمال</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <style>
      html, body { height: 100%; }
      body { display: flex; flex-direction: column; min-height: 100vh; }
      main { flex: 1 0 auto; }
      body { font-family: 'Tajawal', sans-serif; scroll-behavior: smooth; background-color: #f8f9fa; }
      .card-img-top { height: 200px; object-fit: cover; }
      .gallery-item { transition: transform 0.3s ease, box-shadow 0.3s ease; }
      .gallery-item:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0,0,0,0.12) !important; }
      .filter-btn.active { background-color: #0d6efd !important; color: white !important; }
      .filter-btn { border-radius: 999px; padding: 0.5rem 1rem; border-width: 2px; transition: all 0.2s ease-in-out; }
      .filter-btn:hover { background-color: #0d6efd !important; color: #fff !important; box-shadow: 0 6px 16px rgba(13,110,253,0.25); transform: translateY(-2px); }
      .btn-group { flex-wrap: wrap; }
      .btn-group .btn { margin: 0.25rem; }
      .gallery-item .card { border-radius: 1rem; overflow: hidden; border: 0; }
      .hero-small { background: #0d6efd; color: #fff; padding: 3rem 0; }
      /* Smooth fade for partial updates */
      #gallery-partial-container { position: relative; transition: opacity .2s ease; }
      #gallery-partial-container.loading { opacity: .35; }
      /* Card appear animation */
      @keyframes cardIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
      #gallery-partial-container .gallery-item { animation: cardIn .35s ease both; }
      #gallery-partial-container .gallery-item:nth-child(1) { animation-delay: .03s }
      #gallery-partial-container .gallery-item:nth-child(2) { animation-delay: .06s }
      #gallery-partial-container .gallery-item:nth-child(3) { animation-delay: .09s }
      #gallery-partial-container .gallery-item:nth-child(4) { animation-delay: .12s }
      #gallery-partial-container .gallery-item:nth-child(5) { animation-delay: .15s }
      #gallery-partial-container .gallery-item:nth-child(6) { animation-delay: .18s }
      /* Spinner overlay */
      .gallery-loading { position:absolute; inset:0; display:flex; align-items:center; justify-content:center; pointer-events:none; opacity:0; transition:opacity .2s ease; }
      #gallery-partial-container.loading .gallery-loading { opacity:1; }
    </style>
  </head>
  <body>
    <!-- Header -->
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
          <a class="navbar-brand fw-bold text-primary" href="/">{{ $settings['site_name'] }}</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="/">الرئيسية</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/#services">خدماتنا</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/gallery">معرض الأعمال</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/#contact">تواصل معنا</a>
              </li>
            </ul>
            <a href="/#contact" class="btn btn-primary d-none d-lg-block">{{ $settings['cta_text'] }}</a>
          </div>
        </div>
      </nav>
    </header>

    <main style="margin-top: 72px;">
      <section class="hero-small text-center">
        <div class="container">
          <h1 class="fw-bolder mb-0">معرض أعمالنا</h1>
        </div>
      </section>

      <section class="py-5 bg-white">
        <div class="container">
          <!-- Filter Buttons -->
          <div class="d-flex justify-content-center mb-4 btn-group" role="group">
            <a href="{{ url('/gallery') }}" class="btn btn-outline-primary filter-btn {{ empty($currentService) ? 'active' : '' }}">الكل</a>
            @if(isset($services) && $services->count())
              @foreach($services as $svc)
                <a href="{{ url('/gallery?service='.$svc->slug) }}" class="btn btn-outline-primary filter-btn {{ isset($currentService) && $currentService && $currentService->slug === $svc->slug ? 'active' : '' }}">{{ $svc->name }}</a>
              @endforeach
            @endif
          </div>
          <!-- Gallery Grid -->
          <div id="gallery-partial-container">
            <div class="gallery-loading">
              <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
            @include('partials.gallery-grid',['items'=>$items])
          </div>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
      <div class="container">
        <div class="row">
          <!-- Company Info -->
          <div class="col-lg-4 col-md-6 mb-4">
            <!-- Logo -->
            <div class="mb-3">
              <img src="{{ asset('image/0.jpg') }}" alt="{{ $settings['site_name'] }} Logo" class="footer-logo img-fluid" style="max-height: 80px; border-radius: 8px;">
            </div>
            <h5 class="fw-bold mb-3">{{ $settings['site_name'] }}</h5>
            <p class="text-white-50">
              نقدم حلولاً متكاملة ومتخصصة في خدمات التنظيف والصيانة بأعلى معايير الجودة والاحترافية
            </p>
            <div class="d-flex gap-3 mt-3">
              @if(!empty($settings['facebook']))
              <a href="{{ $settings['facebook'] }}" class="text-white-50 hover-white" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
              @endif
              @if(!empty($settings['twitter']))
              <a href="{{ $settings['twitter'] }}" class="text-white-50 hover-white" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
              @endif
              @if(!empty($settings['instagram']))
              <a href="{{ $settings['instagram'] }}" class="text-white-50 hover-white" target="_blank">
                <i class="fab fa-instagram"></i>
              </a>
              @endif
            </div>
          </div>
          
          <!-- Quick Links -->
          <div class="col-lg-2 col-md-6 mb-4">
            <h6 class="fw-bold mb-3">روابط سريعة</h6>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="/services" class="text-white-50 text-decoration-none hover-white">خدماتنا</a></li>
              <li class="mb-2"><a href="/gallery" class="text-white-50 text-decoration-none hover-white">معرض الأعمال</a></li>
              <li class="mb-2"><a href="/about" class="text-white-50 text-decoration-none hover-white">من نحن</a></li>
              <li class="mb-2"><a href="/contact" class="text-white-50 text-decoration-none hover-white">اتصل بنا</a></li>
            </ul>
          </div>
          
          <!-- Contact Info -->
          <div class="col-lg-3 col-md-6 mb-4">
            <h6 class="fw-bold mb-3">معلومات التواصل</h6>
            <ul class="list-unstyled text-white-50">
              <li class="mb-2">
                <i class="fas fa-phone me-2"></i>
                <a href="tel:{{ $settings['phone'] ?? '01000000000' }}" class="text-white-50 text-decoration-none hover-white">
                  {{ $settings['phone'] ?? '01000000000' }}
                </a>
              </li>
              <li class="mb-2">
                <i class="fab fa-whatsapp me-2"></i>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', '+2'.$settings['phone'] ?? '01000000000') }}" class="text-white-50 text-decoration-none hover-white" target="_blank">
                  {{ $settings['phone'] ?? '01000000000' }}
                </a>
              </li>
              <li class="mb-2">
                <i class="fas fa-envelope me-2"></i>
                <a href="mailto:{{ $settings['email'] ?? 'info@example.com' }}" class="text-white-50 text-decoration-none hover-white">
                  {{ $settings['email'] ?? 'info@example.com' }}
                </a>
              </li>
              <li class="mb-2">
                <i class="fas fa-map-marker-alt me-2"></i>
                {{ $settings['address'] ?? 'العنوان غير محدد' }}
              </li>
            </ul>
          </div>
          
          <!-- Working Hours -->
          <div class="col-lg-3 col-md-6 mb-4">
            <h6 class="fw-bold mb-3">ساعات العمل</h6>
            <ul class="list-unstyled text-white-50">
              <li class="mb-2">السبت - الخميس: 9:00 ص - 8:00 م</li>
              <li class="mb-2">الجمعة: 10:00 ص - 6:00 م</li>
              <li class="mb-2">الطوارئ: متاح على مدار 24 ساعة</li>
            </ul>
          </div>
        </div>
        
        <hr class="border-secondary my-4">
        
        <div class="row align-items-center">
          <div class="col-md-6">
            <p class="mb-0 text-white-50">
              &copy; {{ date('Y') }} {{ $settings['site_name'] }}. جميع الحقوق محفوظة.
            </p>
          </div>
          <div class="col-md-6 text-md-end">
            <p class="mb-0 text-white-50">
              صُمم بـ ❤️ بواسطة فريق {{ $settings['site_name'] }}
            </p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        function loadGallery(url) {
          fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(res => res.text())
            .then(html => {
              const container = document.querySelector('#gallery-partial-container');
              if (!container) return;
              container.classList.add('loading');
              // Replace inner HTML while keeping spinner element
              const spinner = container.querySelector('.gallery-loading');
              container.innerHTML = '';
              if (spinner) container.appendChild(spinner);
              container.insertAdjacentHTML('beforeend', html);
              // small timeout to allow CSS transition
              setTimeout(()=>{ container.classList.remove('loading'); }, 50);
              bindPagination();
            });
        }

        function bindFilters() {
          document.querySelectorAll('.filter-btn').forEach(link => {
            link.addEventListener('click', function (e) {
              const href = this.getAttribute('href');
              if (!href) return;
              e.preventDefault();
              history.pushState({}, '', href);
              document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
              this.classList.add('active');
              const container = document.querySelector('#gallery-partial-container');
              if (container) container.classList.add('loading');
              loadGallery(href);
            });
          });
        }

        function bindPagination() {
          document.querySelectorAll('#gallery-pagination a').forEach(a => {
            a.addEventListener('click', function (e) {
              e.preventDefault();
              const href = this.getAttribute('href');
              if (!href) return;
              history.pushState({}, '', href);
              loadGallery(href);
            });
          });
        }

        bindFilters();
        bindPagination();
      });
    </script>
  </body>
</html>
