<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'phone' => ['required','string','max:50'],
            'service_type' => ['nullable','string','max:255'],
            'message' => ['nullable','string','max:2000'],
        ]);

        $service = null;
        if (!empty($data['service_type'])) {
            // Map select value to a service by slug
            $service = Service::where('slug', $data['service_type'])->first();
        }

        // Create the request record
        $req = ServiceRequest::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'service_id' => $service?->id,
            'message' => $data['message'] ?? null,
        ]);

        // Increment orders on the service if found
        if ($service) {
            $service->increment('orders');
        }

        return back()->with('success', 'تم استلام طلبك بنجاح! سنتواصل معك قريباً.');
    }
}
