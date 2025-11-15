<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>جميع الخدمات | مؤسسة الكمال</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <style>
      body{font-family:'Tajawal',sans-serif;background:#f8f9fa}
      .service-card{transition:transform .25s ease, box-shadow .25s ease;border:0;border-radius:1rem;overflow:hidden}
      .service-card:hover{transform:translateY(-4px);box-shadow:0 10px 24px rgba(0,0,0,.12)}
      .card-img-top{height:200px;object-fit:cover}
      .hero-small{background:#0d6efd;color:#fff;padding:3rem 0}
      .price{font-weight:800}
      .old-price{text-decoration:line-through;color:#adb5bd;margin-inline-start:.5rem}
      .badge-discount{background:#dc3545}
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
      <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="/">مؤسسة الكمال</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div id="nav" class="collapse navbar-collapse">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="/">الرئيسية</a></li>
            <li class="nav-item"><a class="nav-link active" href="/services">الخدمات</a></li>
            <li class="nav-item"><a class="nav-link" href="/gallery">معرض الأعمال</a></li>
            <li class="nav-item"><a class="nav-link" href="/#contact">اتصل بنا</a></li>
          </ul>
          <a href="/#contact" class="btn btn-primary d-none d-lg-block">اطلب خدمة الآن</a>
        </div>
      </div>
    </nav>

    <main style="margin-top:72px;">
      <section class="hero-small text-center">
        <div class="container"><h1 class="fw-bolder mb-0">جميع الخدمات</h1></div>
      </section>

      <section class="py-5">
        <div class="container">
          <div class="row g-4">
            @foreach ($services as $s)
              <div class="col-lg-4 col-md-6">
                <a href="{{ url('/services/'.$s->slug) }}" class="text-decoration-none text-reset">
                  <div class="card service-card h-100 shadow-sm">
                    <img class="card-img-top" src="{{ asset('storage/'.$s->image) }}" alt="{{ $s->name }}">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-start">
                        <h3 class="h5 fw-bold mb-2">{{ $s->name }}</h3>
                        @if($s->discount > 0)
                          <span class="badge badge-discount">خصم {{ $s->discount }}%</span>
                        @endif
                      </div>
                      <p class="text-muted mb-3">{{ $s->excerpt }}</p>
                      <div class="d-flex align-items-center">
                        @php
                          $final = $s->discount > 0 ? round($s->price*(1 - $s->discount/100)) : $s->price;
                        @endphp
                        <span class="price h5 mb-0">{{ $final }} ر.س</span>
                        @if($s->discount > 0)
                          <span class="old-price">{{ $s->price }} ر.س</span>
                        @endif
                      </div>
                      <div class="text-muted mt-1"><small>عدد الطلبات: {{ $s->orders }}</small></div>
                    </div>
                  </div>
                </a>
              </div>
            @endforeach
          </div>
          <div class="mt-4">
            {{ $services->links() }}
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
              <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-white">من نحن</a></li>
              <li class="mb-2"><a href="/#contact" class="text-white-50 text-decoration-none hover-white">اتصل بنا</a></li>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
