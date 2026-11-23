<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    public function index() { return view('admin.achievements.index',['achievements'=>Achievement::latest()->paginate(15)]); }
    public function create() { return view('admin.achievements.form',['achievement'=>new Achievement()]); }
    public function store(Request $request) {
        $data=$this->validated($request);
        if ($request->hasFile('student_photo')) $data['student_photo']=$request->file('student_photo')->store('achievements/students','public');
        if ($request->hasFile('certificate_image')) $data['certificate_image']=$request->file('certificate_image')->store('achievements/certificates','public');
        Achievement::create($data);
        return redirect()->route('admin.achievements.index')->with('success','Achievement created.');
    }
    public function edit(Achievement $achievement) { return view('admin.achievements.form',compact('achievement')); }
    public function update(Request $request, Achievement $achievement) {
        $data=$this->validated($request);
        foreach (['student_photo','certificate_image'] as $field) if ($request->hasFile($field)) {
            if ($achievement->$field) Storage::disk('public')->delete($achievement->$field);
            $data[$field]=$request->file($field)->store($field==='student_photo'?'achievements/students':'achievements/certificates','public');
        }
        $achievement->update($data);
        return redirect()->route('admin.achievements.index')->with('success','Achievement updated.');
    }
    public function destroy(Achievement $achievement) {
        foreach (['student_photo','certificate_image'] as $field) if ($achievement->$field) Storage::disk('public')->delete($achievement->$field);
        $achievement->delete();
        return back()->with('success','Achievement deleted.');
    }
    private function validated(Request $request): array {
        return $request->validate([
            'student_name'=>'required|string|max:150','diploma_title'=>'required|string|max:180',
            'awarding_body'=>'nullable|string|max:180','completion_year'=>'required|integer|min:1980|max:'.(date('Y')+1),
            'story'=>'nullable|string|max:2000','student_photo'=>'nullable|image|max:3072',
            'certificate_image'=>'nullable|image|max:5120','is_published'=>'nullable|boolean',
        ]);
    }
}
