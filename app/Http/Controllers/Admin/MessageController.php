<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class MessageController extends Controller
{
    public function index() { return view('admin.messages.index',['messages'=>ContactMessage::latest()->paginate(20)]); }
    public function show(ContactMessage $message) { return view('admin.messages.show',compact('message')); }
    public function read(ContactMessage $message) { $message->update(['is_read'=>true]); return back()->with('success','Message marked as read.'); }
    public function destroy(ContactMessage $message) { $message->delete(); return redirect()->route('admin.messages.index')->with('success','Message deleted.'); }
}
