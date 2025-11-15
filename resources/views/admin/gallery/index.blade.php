@extends('admin.layout')

@section('title','معرض الأعمال')
@section('nav.gallery','active')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="fw-bold mb-0">معرض الأعمال</h4>
  <a href="{{ route('gallery.create') }}" class="btn btn-primary">إضافة عنصر</a>
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
          <th>العنوان</th>
          <th>الخدمة</th>
          <th>الفئة</th>
          <th>التاريخ</th>
          <th>إجراءات</th>
        </tr>
      </thead>
      <tbody>
        @forelse($items as $item)
          <tr>
            <td style="width:100px">
              @if($item->image)
                <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" class="img-fluid rounded" style="height:60px;object-fit:cover;">
              @endif
            </td>
            <td class="fw-semibold">{{ $item->title }}</td>
            <td>{{ optional($item->service)->name ?? '—' }}</td>
            <td>{{ $item->category === 'closet' ? 'تنظيف خزائن' : 'صيانة صرف صحي' }}</td>
            <td>{{ optional($item->done_at)->format('d M Y') }}</td>
            <td>
              <div class="d-flex gap-2">
                <a href="{{ route('gallery.edit', $item) }}" class="btn btn-sm btn-outline-secondary">تعديل</a>
                <form action="{{ route('gallery.destroy', $item) }}" method="POST" onsubmit="return confirm('تأكيد الحذف؟');">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger" type="submit">حذف</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="5" class="text-center text-muted py-4">لا توجد عناصر بعد.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<div class="mt-3">
  {{ $items->links() }}
</div>
@endsection
