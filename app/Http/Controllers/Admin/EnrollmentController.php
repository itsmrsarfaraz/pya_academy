<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index() {
        $query=Enrollment::with('diploma')->latest();
        if (request('status') && in_array(request('status'),['pending','confirmed','rejected'])) $query->where('status',request('status'));
        if (request('q')) $query->where(fn($q)=>$q->where('full_name','like','%'.request('q').'%')->orWhere('phone','like','%'.request('q').'%')->orWhere('reference','like','%'.request('q').'%'));
        return view('admin.enrollments.index',['enrollments'=>$query->paginate(15)->withQueryString()]);
    }
    public function show(Enrollment $enrollment) { $enrollment->load('diploma'); return view('admin.enrollments.show',compact('enrollment')); }
    public function status(Request $request, Enrollment $enrollment) {
        $data=$request->validate(['status'=>'required|in:confirmed,rejected,pending','admin_note'=>'nullable|string|max:3000']);
        $enrollment->update($data);
        return back()->with('success','Application status updated.');
    }
}
