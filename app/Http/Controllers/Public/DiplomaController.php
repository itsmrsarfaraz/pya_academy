<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Diploma;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DiplomaController extends Controller
{
    public function index(Request $request): View
    {
        $categories = Category::orderBy('name')->get();

        $diplomas = Diploma::with('category')
            ->where('is_published', true)
            ->when($request->filled('q'), function ($query) use ($request) {
                $q = $request->string('q');
                $query->where(function ($sub) use ($q) {
                    $sub->where('title', 'like', "%{$q}%")
                        ->orWhere('short_description', 'like', "%{$q}%")
                        ->orWhere('awarding_body', 'like', "%{$q}%");
                });
            })
            ->when($request->filled('category'), function ($query) use ($request) {
                $slug = $request->string('category');
                $query->whereHas('category', fn ($q) => $q->where('slug', $slug));
            })
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('public.diplomas.index', compact('diplomas', 'categories'));
    }

    public function show(Diploma $diploma): View
    {
        abort_unless($diploma->is_published, 404);
        $diploma->load('category');

        return view('public.diplomas.show', compact('diploma'));
    }
}