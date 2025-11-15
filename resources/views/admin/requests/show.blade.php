@extends('admin.layout')

@section('title','عرض الطلب')
@section('nav.requests','active')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold mb-0">تفاصيل الطلب</h4>
    <a href="{{ route('admin.requests.index') }}" class="btn btn-outline-secondary">رجوع</a>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-body">
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label text-muted">الاسم</label>
          <div class="fw-semibold">{{ $request->name }}</div>
        </div>
        <div class="col-md-6">
          <label class="form-label text-muted">رقم الهاتف</label>
          <div class="fw-semibold" dir="ltr">{{ $request->phone }}</div>
        </div>
        <div class="col-md-6">
          <label class="form-label text-muted">الخدمة</label>
          <div class="fw-semibold">{{ optional($request->service)->name ?? '—' }}</div>
        </div>
        <div class="col-md-6">
          <label class="form-label text-muted">تاريخ الإنشاء</label>
          <div class="fw-semibold">{{ $request->created_at->format('Y-m-d H:i') }}</div>
        </div>
        <div class="col-12">
          <label class="form-label text-muted">الرسالة</label>
          <div class="fw-semibold">{{ $request->message ?: '—' }}</div>
        </div>
      </div>
      <div class="mt-4">
        <form action="{{ route('admin.requests.destroy',$request) }}" method="POST" onsubmit="return confirm('تأكيد الحذف؟');">
          @csrf
          @method('DELETE')
          <button class="btn btn-outline-danger">حذف الطلب</button>
        </form>
      </div>
    </div>
  </div>
@endsection
