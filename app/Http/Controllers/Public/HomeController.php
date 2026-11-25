<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Diploma;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $latest = Diploma::with('category')
            ->where('is_published', true)
            ->latest()
            ->take(6)
            ->get();

        $achievements = Achievement::where('is_published', true)
            ->orderBy('sort_order')
            ->latest()
            ->take(3)
            ->get();

        return view('public.home', compact('latest', 'achievements'));
    }

    public function about(): View
    {
        return view('public.about');
    }

    public function achievements(): View
    {
        $achievements = Achievement::where('is_published', true)
            ->orderBy('sort_order')
            ->latest()
            ->paginate(9);

        return view('public.achievements', compact('achievements'));
    }
}