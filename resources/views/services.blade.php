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

    <footer class="bg-dark text-white text-center py-4">
      <div class="container">
        <p class="mb-0">&copy; 2024 مؤسسة الكمال. جميع الحقوق محفوظة.</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
