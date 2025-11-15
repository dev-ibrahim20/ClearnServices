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

    <footer class="bg-dark text-white text-center py-4">
      <div class="container">
        <p class="mb-0">&copy; 2024 مؤسسة الكمال. جميع الحقوق محفوظة.</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
