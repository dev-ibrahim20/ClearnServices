<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(12);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'price' => ['required','numeric','min:0'],
            'discount' => ['nullable','integer','min:0','max:100'],
            'orders' => ['nullable','integer','min:0'],
            'excerpt' => ['nullable','string','max:255'],
            'description' => ['nullable','string'],
            'image' => ['required','image','mimes:jpg,jpeg,png,webp','max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/services');
            $data['image'] = str_replace('public/', '', $path); // store relative path like services/abc.jpg
        }

        $data['discount'] = $data['discount'] ?? 0;
        $data['orders'] = $data['orders'] ?? 0;

        $service = Service::create($data);

        return redirect()->route('services.index')->with('success', 'تم إنشاء الخدمة بنجاح');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'price' => ['required','numeric','min:0'],
            'discount' => ['nullable','integer','min:0','max:100'],
            'orders' => ['nullable','integer','min:0'],
            'excerpt' => ['nullable','string','max:255'],
            'description' => ['nullable','string'],
            'image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
        ]);

        if ($request->hasFile('image')) {
            // delete old if exists
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }
            $path = $request->file('image')->store('public/services');
            $data['image'] = str_replace('public/', '', $path);
        }

        $data['discount'] = $data['discount'] ?? 0;
        $data['orders'] = $data['orders'] ?? 0;

        $service->update($data);

        return redirect()->route('services.index')->with('success', 'تم تحديث الخدمة بنجاح');
    }

    public function destroy(Service $service)
    {
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();
        return redirect()->route('services.index')->with('success', 'تم حذف الخدمة');
    }
}
