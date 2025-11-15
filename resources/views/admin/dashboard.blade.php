@extends('admin.layout')

@section('title','الملخص')
@section('nav.dashboard','active')

@section('content')
<div class="row g-4">
  <div class="col-xl-3 col-md-6">
    <div class="card stat-card shadow-sm">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="text-muted">إجمالي الخدمات</div>
            <div class="h4 fw-bold">{{ $stats['total_services'] ?? 0 }}</div>
          </div>
          <div class="display-6 text-primary">🧰</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card stat-card shadow-sm">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="text-muted">معرض الأعمال</div>
            <div class="h4 fw-bold">{{ $stats['total_gallery_items'] ?? 0 }}</div>
          </div>
          <div class="display-6 text-success">📦</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card stat-card shadow-sm">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="text-muted">إجمالي الطلبات</div>
            <div class="h4 fw-bold">{{ $stats['total_requests'] ?? 0 }}</div>
          </div>
          <div class="display-6 text-warning">�</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card stat-card shadow-sm">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="text-muted">الطلبات الجديدة</div>
            <div class="h4 fw-bold">{{ $stats['recent_requests'] ?? 0 }}</div>
          </div>
          <div class="display-6 text-danger">⏰</div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card border-0 shadow-sm mt-4">
  <div class="card-body">
    <h5 class="fw-bold mb-3">نظرة عامة</h5>
    <p class="text-muted mb-0">هنا سنعرض مخططات ورسوم بيانية لاحقاً.</p>
  </div>
</div>
@endsection
