@extends('admin.layout')

@section('title','تعديل خدمة')
@section('nav.services','active')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="fw-bold mb-0">تعديل خدمة</h4>
  <a href="{{ route('services.index') }}" class="btn btn-outline-secondary">رجوع</a>
</div>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="card border-0 shadow-sm">
  <div class="card-body">
    <form action="{{ route('services.update', $service) }}" method="POST" enctype="multipart/form-data" class="row g-3">
      @csrf
      @method('PUT')
      <div class="col-md-6">
        <label class="form-label">اسم الخدمة</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $service->name) }}" required>
      </div>
      <div class="col-md-3">
        <label class="form-label">السعر (ر.س)</label>
        <input type="number" step="0.01" min="0" name="price" class="form-control" value="{{ old('price', $service->price) }}" required>
      </div>
      <div class="col-md-3">
        <label class="form-label">الخصم (%)</label>
        <input type="number" min="0" max="100" name="discount" class="form-control" value="{{ old('discount', $service->discount) }}">
      </div>
      <div class="col-md-3">
        <label class="form-label">عدد الطلبات</label>
        <input type="number" min="0" name="orders" class="form-control" value="{{ old('orders', $service->orders) }}">
      </div>
      <div class="col-md-9">
        <label class="form-label">وصف مختصر</label>
        <input type="text" name="excerpt" class="form-control" value="{{ old('excerpt', $service->excerpt) }}" placeholder="نبذة سريعة عن الخدمة">
      </div>
      <div class="col-12">
        <label class="form-label">الوصف التفصيلي</label>
        <textarea name="description" rows="5" class="form-control" placeholder="تفاصيل الخدمة">{{ old('description', $service->description) }}</textarea>
      </div>
      <div class="col-md-6">
        <label class="form-label">صورة الخدمة</label>
        <input type="file" name="image" class="form-control" accept="image/*">
        <div class="form-text">اتركها فارغة للإبقاء على الصورة الحالية. الأنواع: jpg, jpeg, png, webp — حتى 2MB</div>
      </div>
      <div class="col-md-6">
        <label class="form-label d-block">الصورة الحالية</label>
        @if($service->image)
          <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->name }}" class="img-fluid rounded" style="max-height:140px;object-fit:cover;">
        @else
          <span class="text-muted">لا يوجد</span>
        @endif
      </div>
      <div class="col-12 d-grid">
        <button class="btn btn-primary" type="submit">حفظ التغييرات</button>
      </div>
    </form>
  </div>
</div>
@endsection
