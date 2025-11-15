@extends('admin.layout')

@section('title','الإعدادات')
@section('nav.settings','active')

@section('content')
@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card border-0 shadow-sm">
  <div class="card-body">
    <form action="{{ route('admin.settings.update') }}" method="POST" class="row g-4">
      @csrf

      <div class="col-12">
        <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
          <li class="nav-item" role="presentation"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-general" type="button" role="tab">عام</button></li>
          <li class="nav-item" role="presentation"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-contact" type="button" role="tab">تواصل</button></li>
          <li class="nav-item" role="presentation"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-home" type="button" role="tab">الرئيسية</button></li>
          <li class="nav-item" role="presentation"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-seo" type="button" role="tab">SEO</button></li>
        </ul>
      </div>

      <div class="tab-content pt-3">
        <div class="tab-pane fade show active" id="tab-general" role="tabpanel">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">اسم الموقع</label>
              <input type="text" name="site_name" class="form-control" value="{{ $settings['site_name'] }}">
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="tab-contact" role="tabpanel">
          <div class="row g-3">
            <div class="col-md-4">
              <label class="form-label">الهاتف</label>
              <input type="text" name="phone" class="form-control" value="{{ $settings['phone'] }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">واتساب</label>
              <input type="text" name="whatsapp" class="form-control" value="{{ $settings['whatsapp'] }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">البريد الإلكتروني</label>
              <input type="email" name="email" class="form-control" value="{{ $settings['email'] }}">
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="tab-home" role="tabpanel">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">عنوان الرئيسية (Hero)</label>
              <input type="text" name="hero_title" class="form-control" value="{{ $settings['hero_title'] }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">نص فرعي (Hero)</label>
              <input type="text" name="hero_subtitle" class="form-control" value="{{ $settings['hero_subtitle'] }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">نص زر الدعوة (CTA)</label>
              <input type="text" name="cta_text" class="form-control" value="{{ $settings['cta_text'] }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">خدمات لكل صفحة</label>
              <input type="number" name="services_per_page" min="3" max="48" class="form-control" value="{{ $settings['services_per_page'] }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">أعمال المعرض لكل صفحة</label>
              <input type="number" name="gallery_per_page" min="4" max="48" class="form-control" value="{{ $settings['gallery_per_page'] }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">سنوات الخبرة</label>
              <input type="number" name="years_experience" min="1" max="50" class="form-control" value="{{ $settings['years_experience'] }}">
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="tab-seo" role="tabpanel">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">عنوان SEO الافتراضي</label>
              <input type="text" name="seo_title" class="form-control" value="{{ $settings['seo_title'] }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">وصف SEO الافتراضي</label>
              <input type="text" name="seo_description" class="form-control" value="{{ $settings['seo_description'] }}">
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 mt-4 d-grid">
        <button class="btn btn-primary">حفظ الإعدادات</button>
      </div>
    </form>
  </div>
</div>
@endsection
