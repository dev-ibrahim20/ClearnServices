<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $settings['site_name'] }} | الرئيسية</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <style>
      body {
        font-family: 'Tajawal', sans-serif;
        scroll-behavior: smooth;
        background-color: #f8f9fa;
      }
      .hero-bg {
        background-image: linear-gradient(rgba(0, 20, 40, 0.75), rgba(0, 20, 40, 0.75)), url('https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=1470&q=80');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 10rem 0;
      }
      .card-img-top {
        height: 200px;
        object-fit: cover;
      }
      .gallery-item {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      .gallery-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.12) !important;
      }
      .filter-btn.active {
        background-color: #0d6efd !important;
        color: white !important;
      }
      .filter-btn {
        border-radius: 999px;
        padding: 0.5rem 1rem;
        border-width: 2px;
        transition: all 0.2s ease-in-out;
      }
      .filter-btn:hover {
        background-color: #0d6efd !important;
        color: #fff !important;
        box-shadow: 0 6px 16px rgba(13,110,253,0.25);
        transform: translateY(-2px);
      }
      .btn-group {
        flex-wrap: wrap;
      }
      .btn-group .btn {
        margin: 0.25rem;
      }
      .gallery-item .card {
        border-radius: 1rem;
        overflow: hidden;
        border: 0;
      }
    </style>
        {{-- @vite('resources/js/index.tsx') --}}
  </head>
  <body>
    <!-- Header -->
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
          <a class="navbar-brand fw-bold text-primary" href="#">مؤسسة الكمال</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="/">الرئيسية</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/services">الخدمات</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/gallery">معرض الأعمال</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">اتصل بنا</a>
              </li>
            </ul>
            <a href="#contact" class="btn btn-primary d-none d-lg-block">{{ $settings['cta_text'] }}</a>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <!-- Hero Section -->
      <section id="hero" class="hero-bg text-center">
        <div class="container">
          <h1 class="display-4 fw-bolder mb-3">{{ $settings['hero_title'] ?: 'خدمات التنظيف المتخصصة بأعلى معايير الجودة' }}</h1>
          <p class="lead mb-4">{{ $settings['hero_subtitle'] ?: 'نقدم حلولاً متكاملة لأعمال النظافة والصيانة لمنزلك أو شركتك' }}</p>
          <a href="/gallery" class="btn btn-light btn-lg">شاهد أعمالنا</a>
        </div>
      </section>

      <!-- Statistics Section -->
      <section class="py-5 bg-primary text-white">
        <div class="container">
          <div class="row text-center">
            <div class="col-md-3 mb-4">
              <div class="stat-item">
                <h2 class="fw-bold display-4">{{ $stats['completed_projects'] }}+</h2>
                <p class="mb-0">مشروع منجز</p>
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="stat-item">
                <h2 class="fw-bold display-4">{{ $stats['service_requests'] }}+</h2>
                <p class="mb-0">طلب خدمة</p>
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="stat-item">
                <h2 class="fw-bold display-4">{{ $stats['services_offered'] }}</h2>
                <p class="mb-0">خدمة متاحة</p>
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="stat-item">
                <h2 class="fw-bold display-4">{{ $stats['years_experience'] }}+</h2>
                <p class="mb-0">سنوات خبرة</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Services Section -->
      <section id="services" class="py-5">
        <div class="container">
          <div class="text-center mb-5">
            <h2 class="fw-bold">خدماتنا الأساسية</h2>
            <p class="text-muted">نقدم حلولاً متكاملة لضمان بيئة صحية ونظيفة.</p>
          </div>
          <div class="row text-center">
            @if(isset($latestServices) && $latestServices->count())
              @foreach($latestServices as $svc)
                <div class="col-md-4 mb-4">
                  <a href="{{ url('/services/'.$svc->slug) }}" class="text-decoration-none text-reset">
                    <div class="card h-100 border-0 shadow-sm">
                      @if($svc->image)
                        <img src="{{ asset('storage/'.$svc->image) }}" alt="{{ $svc->name }}" class="card-img-top">
                      @endif
                      <div class="card-body">
                        <h3 class="card-title h4 fw-bold">{{ $svc->name }}</h3>
                        <p class="card-text text-muted">{{ $svc->excerpt }}</p>
                        @php $final = $svc->discount > 0 ? round($svc->price*(1 - $svc->discount/100)) : $svc->price; @endphp
                        <div class="mt-2">
                          <span class="fw-bold">{{ $final }} ر.س</span>
                          @if($svc->discount > 0)
                            <span class="text-muted text-decoration-line-through ms-2">{{ $svc->price }} ر.س</span>
                          @endif
                        </div>
                        <div class="text-muted mt-1"><small>عدد الطلبات: {{ $svc->orders }}</small></div>
                      </div>
                    </div>
                  </a>
                </div>
              @endforeach
            @else
              <div class="col-md-4 mb-4">
                <a href="/services/closet_cleaning" class="text-decoration-none text-reset">
                <div class="card h-100 border-0 shadow-sm">
                  <div class="card-body">
                    <h3 class="card-title h4 fw-bold">تنظيف الخزائن</h3>
                    <p class="card-text">خدمة شاملة لتنظيف وتعقيم جميع أنواع خزانات المياه، باستخدام مواد آمنة وفعالة لضمان مياه نقية وصحية.</p>
                  </div>
                </div>
                </a>
              </div>
              <div class="col-md-4 mb-4">
                 <a href="/services/sewage_maintenance" class="text-decoration-none text-reset">
                 <div class="card h-100 border-0 shadow-sm">
                  <div class="card-body">
                    <h3 class="card-title h4 fw-bold">صيانة الصرف الصحي</h3>
                    <p class="card-text">نقدم حلولاً متقدمة لمعالجة انسداد المجاري وتسليك شبكات الصرف الصحي بأحدث التقنيات لضمان عدم تكرار المشكلة.</p>
                  </div>
                </div>
                </a>
              </div>
              <div class="col-md-4 mb-4">
                <a href="/services/emergency" class="text-decoration-none text-reset">
                <div class="card h-100 border-0 shadow-sm">
                  <div class="card-body">
                    <h3 class="card-title h4 fw-bold">خدمات الطوارئ 24/7</h3>
                    <p class="card-text">فريقنا جاهز على مدار الساعة للتعامل مع الحالات الطارئة وتقديم الدعم السريع والفعال في أي وقت.</p>
                  </div>
                </div>
                </a>
              </div>
            @endif
          </div>
          <div class="text-center mt-3">
            <a href="/services" class="btn btn-outline-primary btn-lg">عرض كل الخدمات</a>
          </div>
        </div>
      </section>

      <!-- Gallery Section -->
      <section id="gallery" class="py-5 bg-white">
        <div class="container">
          <div class="text-center mb-5">
            <h2 class="fw-bold">معرض أعمالنا</h2>
            <p class="text-muted">شاهد بنفسك جودة ودقة عملنا في المشاريع السابقة.</p>
          </div>
          <!-- Gallery Grid -->
          <div class="row gy-4">
            <!-- Item 1 -->
            <div class="col-lg-3 col-md-6 gallery-item" data-category="closet">
              <div class="card shadow-sm h-100">
                <img src="https://picsum.photos/seed/closet-home-1/600/400" class="card-img-top" alt="تنظيف خزان مياه">
                <div class="card-body">
                  <h5 class="card-title fw-bold">تنظيف خزان فيلا</h5>
                  <p class="card-text">تنظيف وتعقيم كامل لخزان مياه أرضي لفيلا سكنية مع إزالة جميع الرواسب.</p>
                </div>
                <div class="card-footer bg-transparent border-0 text-muted">
                  <small>تاريخ الإنجاز: 25 أكتوبر 2023</small>
                </div>
              </div>
            </div>
            <!-- Item 2 -->
            <div class="col-lg-3 col-md-6 gallery-item" data-category="sewage">
              <div class="card shadow-sm h-100">
                <img src="https://picsum.photos/seed/sewage-home-1/600/400" class="card-img-top" alt="صيانة صرف صحي">
                <div class="card-body">
                  <h5 class="card-title fw-bold">تسليك مجاري رئيسية</h5>
                  <p class="card-text">معالجة انسداد في شبكة الصرف الصحي لمبنى تجاري باستخدام تقنية الضغط العالي.</p>
                </div>
                 <div class="card-footer bg-transparent border-0 text-muted">
                  <small>تاريخ الإنجاز: 12 سبتمبر 2023</small>
                </div>
              </div>
            </div>
            <!-- Item 3 -->
            <div class="col-lg-3 col-md-6 gallery-item" data-category="closet">
              <div class="card shadow-sm h-100">
                <img src="https://picsum.photos/seed/closet-home-2/600/400" class="card-img-top" alt="تنظيف خزان علوي">
                <div class="card-body">
                  <h5 class="card-title fw-bold">صيانة خزان علوي</h5>
                  <p class="card-text">فحص وتنظيف دوري لخزان مياه علوي لمجمع سكني لضمان جودة المياه.</p>
                </div>
                 <div class="card-footer bg-transparent border-0 text-muted">
                  <small>تاريخ الإنجاز: 18 أغسطس 2023</small>
                 </div>
              </div>
            </div>
             <!-- Item 4 -->
            <div class="col-lg-3 col-md-6 gallery-item" data-category="sewage">
              <div class="card shadow-sm h-100">
                <img src="https://picsum.photos/seed/sewage-home-2/600/400" class="card-img-top" alt="فحص صرف صحي">
                <div class="card-body">
                  <h5 class="card-title fw-bold">فحص بالكاميرا</h5>
                  <p class="card-text">استخدام كاميرات متخصصة لتحديد مكان الانسداد بدقة في أنابيب الصرف لمنزل.</p>
                </div>
                 <div class="card-footer bg-transparent border-0 text-muted">
                  <small>تاريخ الإنجاز: 05 يوليو 2023</small>
                 </div>
              </div>
            </div>
          </div>
          <div class="text-center mt-3">
            <a href="/gallery" class="btn btn-outline-primary btn-lg">عرض كل الأعمال</a>
          </div>
        </div>
      </section>

      <!-- Contact Section -->
      <section id="contact" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                     <div class="text-center mb-5">
                        <h2 class="fw-bold">اطلب خدمة الآن</h2>
                        <p class="text-muted">املأ النموذج وسنتواصل معك في أقرب وقت لتقديم عرض سعر مجاني.</p>
                    </div>
                    <div class="card border-0 shadow-sm p-4">
                      @if(session('success'))
                        <div class="alert alert-success text-center" role="alert">
                          {{ session('success') }}
                        </div>
                      @endif
                      <form id="contact-form" action="/request-service" method="POST">
                          @csrf
                          <div class="mb-3">
                              <input type="text" name="name" class="form-control" placeholder="الاسم الكامل" required>
                          </div>
                          <div class="mb-3">
                              <input type="tel" name="phone" class="form-control" placeholder="رقم الهاتف" required>
                          </div>
                          <div class="mb-3">
                              <select name="service_type" class="form-select" required>
                                  <option value="">اختر نوع الخدمة</option>
                                  @if(isset($allServices) && $allServices->count())
                                    @foreach($allServices as $svc)
                                      <option value="{{ $svc->slug }}">{{ $svc->name }}</option>
                                    @endforeach
                                  @endif
                                  <option value="other">أخرى</option>
                              </select>
                          </div>
                          <div class="mb-3">
                              <textarea name="message" class="form-control" placeholder="رسالة إضافية (اختياري)" rows="4"></textarea>
                          </div>
                          <div class="d-grid">
                              <button type="submit" id="submit-button" class="btn btn-primary btn-lg">إرسال الطلب</button>
                          </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
      </section>

    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-0">&copy; 2024 {{ $settings['site_name'] }}. جميع الحقوق محفوظة.</p>
              <p class="mb-0 text-white-50">رقم التواصل: {{ $settings['phone'] }}</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="module" src="/tsx/index.tsx"></script>
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
