<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $items = GalleryItem::with('service')->latest('done_at')->latest()->paginate(12);
        return view('admin.gallery.index', compact('items'));
    }

    public function create()
    {
        $services = \App\Models\Service::orderBy('name')->get(['id','name']);
        return view('admin.gallery.create', compact('services'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string','max:255'],
            'done_at' => ['nullable','date'],
            'service_id' => ['nullable','exists:services,id'],
            'image' => ['required','image','mimes:jpg,jpeg,png,webp','max:2048'],
        ]);

        // derive category automatically from the selected service (if any)
        if (!empty($data['service_id'])) {
            $svc = \App\Models\Service::find($data['service_id']);
            if ($svc) {
                $slug = (string) $svc->slug;
                $data['category'] = str_contains($slug, 'sewage') ? 'sewage' : 'closet';
            }
        } else {
            // default category when no service linked
            $data['category'] = 'closet';
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/gallery');
            $data['image'] = str_replace('public/', '', $path);
        }

        $item = GalleryItem::create($data);

        return redirect()->route('gallery.index')->with('success', 'تم إضافة العمل للمعرض بنجاح');
    }

    public function edit(GalleryItem $gallery)
    {
        $services = \App\Models\Service::orderBy('name')->get(['id','name']);
        return view('admin.gallery.edit', ['item' => $gallery, 'services' => $services]);
    }

    public function update(Request $request, GalleryItem $gallery)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string','max:255'],
            'done_at' => ['nullable','date'],
            'service_id' => ['nullable','exists:services,id'],
            'image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
        ]);

        // derive category automatically when a service is present
        if (!empty($data['service_id'])) {
            $svc = \App\Models\Service::find($data['service_id']);
            if ($svc) {
                $slug = (string) $svc->slug;
                $data['category'] = str_contains($slug, 'sewage') ? 'sewage' : 'closet';
            }
        } elseif (!$gallery->service_id) {
            // if still no service linked, keep existing category or default
            $data['category'] = $gallery->category ?? 'closet';
        }

        if ($request->hasFile('image')) {
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }
            $path = $request->file('image')->store('public/gallery');
            $data['image'] = str_replace('public/', '', $path);
        }

        $gallery->update($data);

        return redirect()->route('gallery.index')->with('success', 'تم تحديث العنصر بنجاح');
    }

    public function destroy(GalleryItem $gallery)
    {
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }
        $gallery->delete();
        return redirect()->route('gallery.index')->with('success', 'تم حذف العنصر من المعرض');
    }
}
