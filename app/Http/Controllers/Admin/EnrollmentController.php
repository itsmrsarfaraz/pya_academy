<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EnrollmentController extends Controller
{
    public function index(Request $request): View
    {
        $enrollments = Enrollment::with('diploma')
            ->when($request->filled('q'), function ($query) use ($request) {
                $q = $request->string('q');
                $query->where(function ($sub) use ($q) {
                    $sub->where('reference_code', 'like', "%{$q}%")
                        ->orWhere('full_name', 'like', "%{$q}%")
                        ->orWhere('phone', 'like', "%{$q}%");
                });
            })
            ->when($request->filled('status'), fn ($query) => $query->where('status', $request->string('status')))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.enrollments.index', compact('enrollments'));
    }

    public function show(Enrollment $enrollment): View
    {
        $enrollment->load('diploma');

        return view('admin.enrollments.show', compact('enrollment'));
    }

    public function update(Request $request, Enrollment $enrollment): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,confirmed,rejected'],
            'admin_notes' => ['nullable', 'string', 'max:3000'],
        ]);

        $enrollment->update($validated);

        return back()->with('success', 'Enrollment status updated.');
    }
}