<?php

namespace App\Http\Controllers;

use App\Models\Diploma;
use App\Models\Category;
use App\Models\Achievement;
use App\Models\ContactMessage;

class PublicController extends Controller
{
    public function home() {
        return view('public.home', [
            'featured' => Diploma::with('category')->where('is_published', true)->where('featured', true)->latest()->take(3)->get(),
            'latest' => Diploma::with('category')->where('is_published', true)->latest()->take(6)->get(),
            'achievements' => Achievement::where('is_published', true)->latest()->take(3)->get(),
        ]);
    }
    public function about() { return view('public.about'); }
    public function diplomas() {
        $query = Diploma::with('category')->where('is_published', true);
        if (request('category')) $query->whereHas('category', fn($q) => $q->where('slug', request('category')));
        if (request('q')) $query->where('title', 'like', '%'.request('q').'%');
        return view('public.diplomas', ['diplomas'=>$query->latest()->paginate(9)->withQueryString(), 'categories'=>Category::orderBy('name')->get()]);
    }
    public function diploma(Diploma $diploma) {
        abort_unless($diploma->is_published, 404);
        return view('public.diploma', compact('diploma'));
    }
    public function achievements() {
        return view('public.achievements', ['achievements'=>Achievement::where('is_published', true)->latest()->paginate(12)]);
    }
    public function contact() { return view('public.contact'); }
}
