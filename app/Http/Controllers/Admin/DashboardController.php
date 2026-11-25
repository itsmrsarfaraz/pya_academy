<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\ContactMessage;
use App\Models\Diploma;
use App\Models\Enrollment;
use App\Models\Message;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'diplomas' => Diploma::count(),
            'pending_enrollments' => Enrollment::where('status', 'pending')->count(),
            'achievements' => Achievement::count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
        ];

        $recentEnrollments = Enrollment::with('diploma')->latest()->take(8)->get();

        return view('admin.dashboard', compact('stats', 'recentEnrollments'));
    }
}