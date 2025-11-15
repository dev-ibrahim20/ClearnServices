<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        $requests = ServiceRequest::with('service')->latest()->paginate(20);
        return view('admin.requests.index', compact('requests'));
    }

    public function show(ServiceRequest $request)
    {
        $request->load('service');
        return view('admin.requests.show', compact('request'));
    }

    public function destroy(ServiceRequest $request)
    {
        $request->delete();
        return redirect()->route('admin.requests.index')->with('success', 'تم حذف الطلب بنجاح');
    }
}
