<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $settings['site_name'] }} | الرئيسية</title>
    
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
      
      /* Footer Hover Effects */
      .hover-white {
        transition: color 0.3s ease;
      }
      .hover-white:hover {
        color: #fff !important;
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
          <!-- Logo -->
          <div class="mb-4">
            <img src="{{ asset('image/0.jpg') }}" alt="{{ $settings['site_name'] }} Logo" class="hero-logo img-fluid" style="max-height: 120px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.3);">
          </div>
          <h1 class="display-4 fw-bolder mb-3">{{ $settings['hero_title'] ?: 'خدمات التنظيف المتخصصة بأعلى معايير الجودة' }}</h1>
          <p class="lead mb-4">{{ $settings['hero_subtitle'] ?: 'نقدم حلولاً متكاملة لأعمال النظافة والصيانة لمنزلك أو شركتك' }}</p>
          <a href="/gallery" class="btn btn-light btn-lg">شاهد أعمالنا</a>
        </div>
      </section>
      
      <!-- Statistics Section -->
      <section class="py-6 bg-primary text-white">
        <div class="container">
          <div class="row text-center">
            <div class="col-md-3 mb-4">
              <div class="stat-item">
                <h2 class="fw-bold display-4 counter" data-target="+{{ $stats['completed_projects'] }}">0</h2>
                <p class="mb-0">مشروع منجز</p>
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="stat-item">
                <h2 class="fw-bold display-4 counter" data-target="+{{ $stats['service_requests'] }}">0</h2>
                <p class="mb-0">طلب خدمة</p>
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="stat-item">
                <h2 class="fw-bold display-4 counter" data-target="+{{ $stats['services_offered'] }}">0</h2>
                <p class="mb-0">خدمة متاحة</p>
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="stat-item">
                <h2 class="fw-bold display-4 counter" data-target="+{{ $stats['years_experience'] }}">0</h2>
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
            @if(isset($galleryItems) && $galleryItems->count())
              @foreach($galleryItems as $item)
                <div class="col-lg-3 col-md-6 gallery-item" data-category="{{ $item->service?->slug ?? 'general' }}">
                  <div class="card shadow-sm h-100">
                    <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                    <div class="card-body">
                      <h5 class="card-title fw-bold">{{ $item->title }}</h5>
                      <p class="card-text">{{ Str::limit($item->description, 100) }}</p>
                      <small>{{ $item->done_at->format('d F Y') }}</small>
                    </div>
                  </div>
                </div>
              @endforeach
            @else
              <!-- Show placeholder if no items -->
              <div class="col-12 text-center">
                <p class="text-muted">لا توجد أعمال حالياً</p>
              </div>
            @endif
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
                if (filter === 'all' || category === filter) {
                  item.style.display = 'block';
                } else {
                  item.style.display = 'none';
                }
              });
            });
          });

          // Counter Animation for Statistics - Trigger on scroll
          const counters = document.querySelectorAll('.counter');
          const speed = 50; // Slower animation speed for better visibility
          let hasAnimated = false;

          const countUp = (counter) => {
            const target = +counter.getAttribute('data-target');
            const increment = target / speed;
            
            const updateCount = () => {
              const current = +counter.innerText;
              
              if (current < target) {
                counter.innerText = Math.ceil(current + increment);
                setTimeout(updateCount, 50); // Slower update frequency
              } else {
                counter.innerText = target + (counter.getAttribute('data-target') === counter.innerText ? '' : '+');
              }
            };
            
            updateCount();
          };

          // Intersection Observer to trigger animation when section is visible
          const observerOptions = {
            threshold: 0.5, // Start animation when 50% of section is visible
            rootMargin: '0px 0px -100px 0px' // Start a bit earlier
          };

          const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
              if (entry.isIntersecting && !hasAnimated) {
                hasAnimated = true;
                counters.forEach(counter => countUp(counter));
              }
            });
          }, observerOptions);

          // Observe the statistics section
          const statsSection = document.querySelector('.bg-primary.text-white.py-6');
          if (statsSection) {
            observer.observe(statsSection);
          }
        });
      </script>
  </body>
</html>
