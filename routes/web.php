<?php

use App\Http\Controllers\ProfileController;
use App\Models\Service;
use App\Models\GalleryItem;
use App\Http\Controllers\Front\RequestController;
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
    return view('home', compact('latestServices','allServices'));
});

// Gallery route (public) using DB
Route::get('/gallery', function () {
    $items = GalleryItem::with('service')->latest('done_at')->latest()->paginate(12);
    return view('gallery', compact('items'));
})->name('gallery');

// Services listing (public)
Route::get('/services', function () {
    $services = Service::latest()->paginate(12);
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

Route::prefix('admin')->middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Services CRUD
    Route::resource('/services', \App\Http\Controllers\Admin\ServiceController::class);

    // Gallery CRUD
    Route::resource('/gallery', \App\Http\Controllers\Admin\GalleryController::class);

    // Requests (list/show/delete)
    Route::get('/requests', [\App\Http\Controllers\Admin\RequestController::class, 'index'])->name('admin.requests.index');
    Route::get('/requests/{request}', [\App\Http\Controllers\Admin\RequestController::class, 'show'])->name('admin.requests.show');
    Route::delete('/requests/{request}', [\App\Http\Controllers\Admin\RequestController::class, 'destroy'])->name('admin.requests.destroy');
});
