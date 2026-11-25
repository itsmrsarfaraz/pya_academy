<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AchievementController extends Controller
{
    public function index(): View
    {
        $achievements = Achievement::orderBy('sort_order')->latest()->paginate(12);

        return view('admin.achievements.index', compact('achievements'));
    }

    public function create(): View
    {
        return view('admin.achievements.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateAchievement($request);

        if ($request->hasFile('student_photo')) {
            $validated['student_photo'] = $request->file('student_photo')->store('achievements', 'public');
        }

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_published'] = $request->boolean('is_published');

        Achievement::create($validated);

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement added.');
    }

    public function edit(Achievement $achievement): View
    {
        return view('admin.achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement): RedirectResponse
    {
        $validated = $this->validateAchievement($request);

        if ($request->hasFile('student_photo')) {
            if ($achievement->student_photo) {
                Storage::disk('public')->delete($achievement->student_photo);
            }
            $validated['student_photo'] = $request->file('student_photo')->store('achievements', 'public');
        }

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_published'] = $request->boolean('is_published');

        $achievement->update($validated);

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement updated.');
    }

    public function destroy(Achievement $achievement): RedirectResponse
    {
        if ($achievement->student_photo) {
            Storage::disk('public')->delete($achievement->student_photo);
        }

        $achievement->delete();

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement deleted.');
    }

    private function validateAchievement(Request $request): array
    {
        return $request->validate([
            'student_name' => ['required', 'string', 'max:255'],
            'diploma_title' => ['required', 'string', 'max:255'],
            'awarding_body' => ['required', 'string', 'max:255'],
            'completion_year' => ['required', 'string', 'max:20'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'student_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'remarks' => ['nullable', 'string', 'max:2000'],
            'is_published' => ['nullable', 'boolean'],
        ]);
    }
}