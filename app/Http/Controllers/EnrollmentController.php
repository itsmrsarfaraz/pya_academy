<?php

namespace App\Http\Controllers;

use App\Models\Diploma;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function create(?Diploma $diploma = null) {
        $diplomas = Diploma::where('is_published', true)->orderBy('title')->get();
        return view('public.enroll', compact('diplomas','diploma'));
    }
    public function store(Request $request) {
        $data = $request->validate([
            'diploma_id'=>'required|exists:diplomas,id',
            'full_name'=>'required|string|max:150',
            'father_name'=>'nullable|string|max:150',
            'phone'=>'required|string|max:30',
            'email'=>'nullable|email|max:150',
            'cnic'=>'nullable|string|max:30',
            'education'=>'nullable|string|max:150',
            'address'=>'nullable|string|max:1000',
        ]);
        $diploma = Diploma::where('is_published', true)->findOrFail($data['diploma_id']);
        $application = Enrollment::create($data + ['status'=>'pending']);
        return redirect()->route('enroll.success', $application->reference);
    }
    public function success(string $reference) {
        $application = Enrollment::where('reference', $reference)->firstOrFail();
        return view('public.enroll-success', compact('application'));
    }
}
