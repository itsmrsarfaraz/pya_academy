<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Diploma;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class DiplomaController extends Controller
{
    public function index(): View
    {
        $diplomas = Diploma::with('category')->latest()->paginate(12);

        return view('admin.diplomas.index', compact('diplomas'));
    }

    public function create(): View
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.diplomas.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateDiploma($request);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('diplomas', 'public');
        }

        $validated['slug'] = $this->uniqueSlug($validated['title']);
        $validated['is_published'] = $request->boolean('is_published');

        Diploma::create($validated);

        return redirect()->route('admin.diplomas.index')->with('success', 'Diploma created.');
    }

    public function edit(Diploma $diploma): View
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.diplomas.edit', compact('diploma', 'categories'));
    }

    public function update(Request $request, Diploma $diploma): RedirectResponse
    {
        $validated = $this->validateDiploma($request);

        if ($request->hasFile('image')) {
            if ($diploma->image) {
                Storage::disk('public')->delete($diploma->image);
            }
            $validated['image'] = $request->file('image')->store('diplomas', 'public');
        }

        $validated['is_published'] = $request->boolean('is_published');
        $diploma->update($validated);

        return redirect()->route('admin.diplomas.index')->with('success', 'Diploma updated.');
    }

    public function destroy(Diploma $diploma): RedirectResponse
    {
        if ($diploma->image) {
            Storage::disk('public')->delete($diploma->image);
        }

        $diploma->delete();

        return redirect()->route('admin.diplomas.index')->with('success', 'Diploma deleted.');
    }

    private function validateDiploma(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'duration' => ['required', 'string', 'max:100'],
            'fee' => ['required', 'numeric', 'min:0'],
            'currency' => ['required', 'string', 'max:10'],
            'awarding_body' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'short_description' => ['required', 'string', 'max:600'],
            'description' => ['required', 'string'],
            'syllabus' => ['nullable', 'string'],
            'eligibility' => ['nullable', 'string'],
            'is_published' => ['nullable', 'boolean'],
        ]);
    }

    private function uniqueSlug(string $title): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i = 1;

        while (Diploma::where('slug', $slug)->exists()) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }
}