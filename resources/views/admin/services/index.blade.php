@extends('admin.layout')

@section('title','الخدمات')
@section('nav.services','active')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="fw-bold mb-0">الخدمات</h4>
  <a href="{{ route('services.create') }}" class="btn btn-primary">إضافة خدمة</a>
</div>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card border-0 shadow-sm">
  <div class="table-responsive">
    <table class="table align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th>الصورة</th>
          <th>الاسم</th>
          <th>السعر</th>
          <th>الخصم</th>
          <th>الطلبات</th>
          <th>إجراءات</th>
        </tr>
      </thead>
      <tbody>
        @forelse($services as $service)
          <tr>
            <td style="width:100px">
              @if($service->image)
                <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->name }}" class="img-fluid rounded" style="height:60px;object-fit:cover;">
              @else
                <span class="text-muted">لا يوجد</span>
              @endif
            </td>
            <td class="fw-semibold">{{ $service->name }}</td>
            <td>{{ number_format($service->price, 2) }} ر.س</td>
            <td>{{ (int)$service->discount }}%</td>
            <td>{{ (int)$service->orders }}</td>
            <td>
              <div class="d-flex gap-2">
                <a href="{{ route('services.edit', $service) }}" class="btn btn-sm btn-outline-secondary">تعديل</a>
                <form action="{{ route('services.destroy', $service) }}" method="POST" onsubmit="return confirm('تأكيد الحذف؟');">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger" type="submit">حذف</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="text-center text-muted py-4">لا توجد خدمات بعد.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<div class="mt-3">
  {{ $services->links() }}
</div>
@endsection
