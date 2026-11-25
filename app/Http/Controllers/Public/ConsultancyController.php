<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ConsultancyController extends Controller
{
    public function create(): View
    {
        return view('public.consultancy');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:40'],
            'email' => ['nullable', 'email', 'max:255'],
            'topic' => ['required', 'string', 'max:255'],
            'details' => ['required', 'string', 'max:4000'],
        ]);

        ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'] ?? 'no-email@academy.local',
            'phone' => $validated['phone'],
            'subject' => '[Consultancy] ' . $validated['topic'],
            'message' => $validated['details'],
            'is_read' => false,
        ]);

        return back()->with('success', 'Thank you. Your consultancy request has been submitted.');
    }
}