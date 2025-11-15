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
            <div class="h4 fw-bold">3</div>
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
            <div class="text-muted">طلبات هذا الشهر</div>
            <div class="h4 fw-bold">18</div>
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
            <div class="text-muted">أعمال المعرض</div>
            <div class="h4 fw-bold">12</div>
          </div>
          <div class="display-6 text-warning">🖼️</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card stat-card shadow-sm">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="text-muted">الرسائل الجديدة</div>
            <div class="h4 fw-bold">5</div>
          </div>
          <div class="display-6 text-danger">✉️</div>
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
