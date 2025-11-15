<?php

use App\Http\Controllers\ProfileController;
use App\Models\Service;
use App\Models\GalleryItem;
use App\Http\Controllers\Front\RequestController;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $latestServices = Service::latest()->take(3)->get();
    $allServices = Service::orderBy('name')->get(['slug','name']);
    
    // Get real gallery items (4 items)
    $galleryItems = GalleryItem::with('service')->latest('done_at')->latest()->take(4)->get();
    
    // Get real statistics from database
    $stats = [
        'completed_projects' => GalleryItem::count(),
        'service_requests' => \App\Models\ServiceRequest::count(),
        'services_offered' => Service::count(),
        'years_experience' => \App\Models\Setting::getValue('years_experience', 5),
    ];
    
    return view('home', compact('latestServices','allServices','galleryItems','stats'));
});

// Gallery route (public) using DB with optional service filter
Route::get('/gallery', function (Request $request) {
    $query = GalleryItem::with('service')->latest('done_at')->latest();
    $currentService = null;
    if ($slug = $request->query('service')) {
        $currentService = Service::where('slug', $slug)->first();
        if ($currentService) {
            $query->where('service_id', $currentService->id);
        }
    }
    $perPage = (int) (Setting::getValue('gallery_per_page', 12));
    $items = $query->paginate($perPage > 0 ? $perPage : 12);
    $services = Service::orderBy('name')->get(['name','slug']);
    if ($request->ajax()) {
        return view('partials.gallery-grid', compact('items'));
    }
    return view('gallery', compact('items','services','currentService'));
})->name('gallery');

// Services listing (public)
Route::get('/services', function () {
    $perPage = (int) (Setting::getValue('services_per_page', 12));
    $services = Service::latest()->paginate($perPage > 0 ? $perPage : 12);
    return view('services', compact('services'));
})->name('services');

// Service detail (public)
Route::get('/services/{slug}', function ($slug) {
    $service = Service::where('slug', $slug)->firstOrFail();
    return view('service', compact('service'));
})->name('service.show');

// Public service request endpoint (increments service orders if matched)
Route::post('/request-service', [RequestController::class, 'store'])->name('request.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Admin (Blade) Dashboard//////////

Route::prefix('kasc')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $stats = [
            'total_services' => Service::count(),
            'total_gallery_items' => GalleryItem::count(),
            'total_requests' => \App\Models\ServiceRequest::count(),
            'recent_requests' => \App\Models\ServiceRequest::where('created_at', '>=', now()->subDay())->count(),
        ];
        return view('admin.dashboard', compact('stats'));
    })->name('kasc.dashboard');

    // Services CRUD
    Route::resource('/services', \App\Http\Controllers\Admin\ServiceController::class);

    // Gallery CRUD
    Route::resource('/gallery', \App\Http\Controllers\Admin\GalleryController::class);

    // Requests (list/show/delete)
    Route::get('/requests', [\App\Http\Controllers\Admin\RequestController::class, 'index'])->name('admin.requests.index');
    Route::get('/requests/{request}', [\App\Http\Controllers\Admin\RequestController::class, 'show'])->name('admin.requests.show');
    Route::delete('/requests/{request}', [\App\Http\Controllers\Admin\RequestController::class, 'destroy'])->name('admin.requests.destroy');

    // Settings
    Route::get('/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('admin.settings.index');
    Route::post('/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('admin.settings.update');
});
