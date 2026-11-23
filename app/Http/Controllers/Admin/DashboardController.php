<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Diploma;
use App\Models\Enrollment;
use App\Models\Achievement;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index() {
        return view('admin.dashboard', [
            'diplomas'=>Diploma::count(),
            'pending'=>Enrollment::where('status','pending')->count(),
            'confirmed'=>Enrollment::where('status','confirmed')->count(),
            'messages'=>ContactMessage::where('is_read',false)->count(),
            'recent'=>Enrollment::with('diploma')->latest()->take(7)->get(),
            'achievements'=>Achievement::count(),
        ]);
    }
}
