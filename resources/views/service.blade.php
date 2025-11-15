<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $service->name }} | مؤسسة الكمال</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <style>
      body{font-family:'Tajawal',sans-serif;background:#f8f9fa}
      .hero-small{background:#0d6efd;color:#fff;padding:3rem 0}
      .service-cover{border-radius:1rem;overflow:hidden}
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
            <li class="nav-item"><a class="nav-link" href="/services">الخدمات</a></li>
            <li class="nav-item"><a class="nav-link" href="/gallery">معرض الأعمال</a></li>
            <li class="nav-item"><a class="nav-link" href="/\#contact">اتصل بنا</a></li>
          </ul>
          <a href="/\#contact" class="btn btn-primary d-none d-lg-block">اطلب خدمة الآن</a>
        </div>
      </div>
    </nav>

    <main style="margin-top:72px;">
      <section class="hero-small text-center">
        <div class="container">
          <h1 class="fw-bolder mb-0">{{ $service->name }}</h1>
        </div>
      </section>

      <section class="py-5">
        <div class="container">
          <div class="row g-4">
            <div class="col-lg-7">
              <div class="service-cover shadow-sm">
                <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->name }}" class="w-100" style="height:420px;object-fit:cover;">
              </div>
            </div>
            <div class="col-lg-5">
              <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-start mb-2">
                    <h2 class="h4 fw-bold mb-0">{{ $service->name }}</h2>
                    @if($service->discount > 0)
                      <span class="badge badge-discount">خصم {{ $service->discount }}%</span>
                    @endif
                  </div>
                  @if(session('success'))
                    <div class="alert alert-success text-center" role="alert">
                      {{ session('success') }}
                    </div>
                  @endif
                  <p class="text-muted">{{ $service->description }}</p>
                  @php
                    $final = $service->discount > 0 ? round($service->price*(1 - $service->discount/100)) : $service->price;
                  @endphp
                  <div class="mb-2">
                    <span class="price h4 mb-0">{{ $final }} ر.س</span>
                    @if($service->discount > 0)
                      <span class="old-price">{{ $service->price }} ر.س</span>
                    @endif
                  </div>
                  <div class="text-muted mb-4"><small>عدد الطلبات: {{ $service->orders }}</small></div>

                  <form class="mt-2" method="POST" action="/request-service">
                    @csrf
                    <input type="hidden" name="service_type" value="{{ $service->slug }}">
                    <div class="row g-2 align-items-center">
                      <div class="col-12 col-md">
                        <input class="form-control" name="name" type="text" placeholder="اسمك" required>
                      </div>
                      <div class="col-12 col-md">
                        <input class="form-control" name="phone" type="tel" placeholder="رقم الهاتف" required>
                      </div>
                      <div class="col-12">
                        <textarea class="form-control" name="message" rows="2" placeholder="ملاحظات إضافية (اختياري)"></textarea>
                      </div>
                      <div class="col-12 col-md-4 d-grid">
                        <button type="submit" class="btn btn-primary">اطلب الخدمة</button>
                      </div>
                    </div>
                  </form>

                  <div class="mt-3">
                    <a href="/services" class="btn btn-outline-secondary btn-sm">رجوع إلى جميع الخدمات</a>
                  </div>
                </div>
              </div>
            </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
