@extends('admin.layout')

@section('title','إضافة عنصر للمعرض')
@section('nav.gallery','active')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="fw-bold mb-0">إضافة عنصر</h4>
  <a href="{{ route('gallery.index') }}" class="btn btn-outline-secondary">رجوع</a>
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
    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
      @csrf
      <div class="col-md-6">
        <label class="form-label">العنوان</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label">ربط الخدمة (اختياري)</label>
        <select name="service_id" class="form-select">
          <option value="">— اختر خدمة —</option>
          @foreach($services as $svc)
            <option value="{{ $svc->id }}" @selected(old('service_id')==$svc->id)>{{ $svc->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">تاريخ الإنجاز</label>
        <input type="date" name="done_at" class="form-control" value="{{ old('done_at') }}">
      </div>
      <div class="col-12">
        <label class="form-label">وصف قصير</label>
        <input type="text" name="description" class="form-control" value="{{ old('description') }}" placeholder="نبذة عن هذا العمل (اختياري)">
      </div>
      <div class="col-md-6">
        <label class="form-label">صورة</label>
        <input type="file" name="image" class="form-control" accept="image/*" required>
        <div class="form-text">الأنواع المسموحة: jpg, jpeg, png, webp — حتى 2MB</div>
      </div>
      <div class="col-12 d-grid">
        <button class="btn btn-primary" type="submit">حفظ</button>
      </div>
    </form>
  </div>
</div>
@endsection
