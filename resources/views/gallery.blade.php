<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>خدمات مؤسسة الكمال | معرض الأعمال</title>
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
    </style>
  </head>
  <body>
    <!-- Header -->
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
          <a class="navbar-brand fw-bold text-primary" href="/">مؤسسة الكمال</a>
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
                <a class="nav-link" href="/#contact">اتصل بنا</a>
              </li>
            </ul>
            <a href="/#contact" class="btn btn-primary d-none d-lg-block">اطلب خدمة الآن</a>
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
            <button type="button" class="btn btn-outline-primary filter-btn active" data-filter="all">الكل</button>
            <button type="button" class="btn btn-outline-primary filter-btn" data-filter="closet">تنظيف خزائن</button>
            <button type="button" class="btn btn-outline-primary filter-btn" data-filter="sewage">صيانة صرف صحي</button>
          </div>
          <!-- Gallery Grid -->
          <div class="row gy-4">
            @forelse($items as $it)
              <div class="col-lg-3 col-md-6 gallery-item" data-category="{{ $it->category }}">
                <div class="card shadow-sm h-100">
                  @if($it->image)
                    <img src="{{ asset('storage/'.$it->image) }}" class="card-img-top" alt="{{ $it->title }}">
                  @endif
                  <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $it->title }}</h5>
                    @if($it->service)
                      <div class="text-primary small mb-2">الخدمة: {{ $it->service->name }}</div>
                    @endif
                    @if($it->description)
                      <p class="card-text">{{ $it->description }}</p>
                    @endif
                  </div>
                  <div class="card-footer bg-transparent border-0 text-muted">
                    <small>
                      @if($it->done_at)
                        تاريخ الإنجاز: {{ $it->done_at->format('d M Y') }}
                      @endif
                    </small>
                  </div>
                </div>
              </div>
            @empty
              <div class="col-12 text-center text-muted py-5">لا توجد عناصر في المعرض بعد.</div>
            @endforelse
          </div>
          <div class="mt-4">
            {{ $items->links() }}
          </div>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
      <div class="container">
        <p class="mb-0">&copy; 2024 مؤسسة الكمال. جميع الحقوق محفوظة.</p>
        <p class="mb-0 text-white-50">للتواصل السريع: 966500000000+</p>
      </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.filter-btn');
        const items = document.querySelectorAll('.gallery-item');
        buttons.forEach(btn => {
          btn.addEventListener('click', () => {
            buttons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const filter = btn.getAttribute('data-filter');
            items.forEach(item => {
              const category = item.getAttribute('data-category');
              const col = item.closest('[class*="col-"]') || item;
              if (filter === 'all' || category === filter) {
                col.classList.remove('d-none');
              } else {
                col.classList.add('d-none');
              }
            });
          });
        });
      });
    </script>
  </body>
</html>
