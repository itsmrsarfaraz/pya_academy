<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit() { return view('admin.profile'); }
    public function update(Request $request) {
        $data=$request->validate([
            'name'=>'required|string|max:120','email'=>'required|email|max:150|unique:admins,email,'.session('admin_id'),
            'current_password'=>'required|string','password'=>'nullable|string|min:12|confirmed',
        ]);
        $admin=Admin::findOrFail(session('admin_id'));
        if (!Hash::check($data['current_password'],$admin->password)) return back()->withErrors(['current_password'=>'Current password is incorrect.']);
        $admin->name=$data['name']; $admin->email=$data['email'];
        if (!empty($data['password'])) $admin->password=$data['password'];
        $admin->save();
        session(['admin_name'=>$admin->name]);
        return back()->with('success','Profile updated.');
    }
}
