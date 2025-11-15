@extends('admin.layout')

@section('title','طلبات العملاء')
@section('nav.requests','active')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="fw-bold mb-0">طلبات الخدمات</h4>
</div>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card border-0 shadow-sm">
  <div class="table-responsive">
    <table class="table align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th>الاسم</th>
          <th>الهاتف</th>
          <th>الخدمة</th>
          <th>الرسالة</th>
          <th>التاريخ</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse($requests as $r)
          <tr>
            <td class="fw-semibold">{{ $r->name }}</td>
            <td dir="ltr">{{ $r->phone }}</td>
            <td>{{ optional($r->service)->name ?? '—' }}</td>
            <td class="text-truncate" style="max-width: 260px;">{{ $r->message }}</td>
            <td><small class="text-muted">{{ $r->created_at->format('Y-m-d H:i') }}</small></td>
            <td class="text-nowrap">
              <a href="{{ route('admin.requests.show',$r) }}" class="btn btn-sm btn-outline-secondary">عرض</a>
              <form action="{{ route('admin.requests.destroy',$r) }}" method="POST" class="d-inline" onsubmit="return confirm('تأكيد الحذف؟');">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" type="submit">حذف</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="text-center text-muted py-4">لا توجد طلبات بعد.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<div class="mt-3">
  {{ $requests->links() }}
</div>
@endsection
