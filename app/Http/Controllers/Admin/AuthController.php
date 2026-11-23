<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin() { return view('admin.auth.login'); }
    public function login(Request $request) {
        $credentials = $request->validate(['email'=>'required|email','password'=>'required|string']);
        $admin = Admin::where('email', $credentials['email'])->first();
        if (!$admin || !Hash::check($credentials['password'], $admin->password)) {
            return back()->withErrors(['email'=>'The supplied credentials are incorrect.'])->onlyInput('email');
        }
        $request->session()->regenerate();
        $request->session()->put('admin_id', $admin->id);
        $request->session()->put('admin_name', $admin->name);
        return redirect()->intended(route('admin.dashboard'));
    }
    public function logout(Request $request) {
        $request->session()->forget(['admin_id','admin_name']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success','You have been signed out.');
    }
}
