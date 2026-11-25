<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ConsultancyController extends Controller
{
    public function index(): View
    {
        $consultancies = ContactMessage::where('subject', 'like', '[Consultancy]%')
            ->latest()
            ->paginate(12);

        return view('admin.consultancy.index', compact('consultancies'));
    }

    public function markRead(ContactMessage $message): RedirectResponse
    {
        $message->update(['is_read' => true]);

        return back()->with('success', 'Consultancy request marked as read.');
    }

    public function destroy(ContactMessage $message): RedirectResponse
    {
        $message->delete();

        return back()->with('success', 'Consultancy request deleted.');
    }
}