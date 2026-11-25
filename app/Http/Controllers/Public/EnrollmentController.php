<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Diploma;
use App\Models\Enrollment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EnrollmentController extends Controller
{
    public function create(Request $request): View
    {
        $diplomas = Diploma::where('is_published', true)->orderBy('title')->get();
        $selectedDiploma = null;

        if ($request->filled('diploma')) {
            $selectedDiploma = $diplomas->firstWhere('slug', $request->string('diploma'));
        }

        return view('public.enroll', compact('diplomas', 'selectedDiploma'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'diploma_id' => ['required', 'exists:diplomas,id'],
            'full_name' => ['required', 'string', 'max:255'],
            'father_name' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:40'],
            'email' => ['nullable', 'email', 'max:255'],
            'cnic' => ['nullable', 'string', 'max:40'],
            'qualification' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:500'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);

        $enrollment = Enrollment::create([
            ...$validated,
            'status' => 'pending',
        ]);

        return redirect()->route('enroll.success', ['enrollment' => $enrollment->reference ?: $enrollment->id]);
    }

    public function success(string $enrollment): View
    {
        $record = Enrollment::with('diploma')
            ->where('reference', $enrollment)
            ->orWhere('id', $enrollment)
            ->firstOrFail();

        return view('public.enroll-success', ['enrollment' => $record]);
    }
}