<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Diploma;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DiplomaController extends Controller
{
    public function index() { return view('admin.diplomas.index',['diplomas'=>Diploma::with('category')->latest()->paginate(15)]); }
    public function create() { return view('admin.diplomas.form',['diploma'=>new Diploma(),'categories'=>Category::orderBy('name')->get()]); }
    public function store(Request $request) {
        $data = $this->validated($request);
        if ($request->hasFile('image')) $data['image']=$request->file('image')->store('diplomas','public');
        $data['slug']=Str::slug($data['title']).'-'.Str::lower(Str::random(5));
        Diploma::create($data);
        return redirect()->route('admin.diplomas.index')->with('success','Diploma created.');
    }
    public function edit(Diploma $diploma) { return view('admin.diplomas.form',['diploma'=>$diploma,'categories'=>Category::orderBy('name')->get()]); }
    public function update(Request $request, Diploma $diploma) {
        $data=$this->validated($request);
        if ($request->hasFile('image')) { if ($diploma->image) Storage::disk('public')->delete($diploma->image); $data['image']=$request->file('image')->store('diplomas','public'); }
        $diploma->update($data);
        return redirect()->route('admin.diplomas.index')->with('success','Diploma updated.');
    }
    public function destroy(Diploma $diploma) {
        if ($diploma->enrollments()->exists()) return back()->with('error','This diploma has applications and cannot be deleted. Unpublish it instead.');
        if ($diploma->image) Storage::disk('public')->delete($diploma->image);
        $diploma->delete();
        return back()->with('success','Diploma deleted.');
    }
    private function validated(Request $request): array {
        return $request->validate([
            'category_id'=>'required|exists:categories,id','title'=>'required|string|max:180',
            'short_description'=>'nullable|string|max:300','description'=>'required|string',
            'duration'=>'required|string|max:100','fee'=>'required|numeric|min:0',
            'registration_fee'=>'nullable|numeric|min:0','currency'=>'required|string|max:8',
            'approval_type'=>'required|in:Local Board,International Institution,Academy Certificate,Other',
            'awarding_body'=>'nullable|string|max:180','approval_reference'=>'nullable|string|max:180',
            'certificate_type'=>'nullable|string|max:120','image'=>'nullable|image|max:3072',
            'is_published'=>'nullable|boolean','featured'=>'nullable|boolean',
        ]);
    }
}
