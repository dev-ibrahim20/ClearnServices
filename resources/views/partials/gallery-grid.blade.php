<div id="gallery-grid" class="row gy-4">
  @forelse($items as $it)
    <div class="col-lg-3 col-md-6 gallery-item" data-category="{{ $it->category }}">
      <div class="card shadow-sm h-100">
        @if($it->image)
          <img src="{{ asset('storage/'.$it->image) }}" class="card-img-top" alt="{{ $it->title }}">
        @endif
        <div class="card-body">
          <h5 class="card-title fw-bold">{{ $it->title }}</h5>
          @if($it->service)
            <div class="text-primary small mb-2">الخدمة: {{ $it->service->name }}</div>
          @endif
          @if($it->description)
            <p class="card-text">{{ $it->description }}</p>
          @endif
        </div>
        <div class="card-footer bg-transparent border-0 text-muted">
          <small>
            @if($it->done_at)
              تاريخ الإنجاز: {{ $it->done_at->format('d M Y') }}
            @endif
          </small>
        </div>
      </div>
    </div>
  @empty
    <div class="col-12 text-center text-muted py-5">لا توجد عناصر لعرضها.</div>
  @endforelse
</div>
<div id="gallery-pagination" class="mt-4">
  {{ $items->appends(request()->query())->links() }}
</div>
