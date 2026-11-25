@extends('layouts.admin')
@section('title', 'Admin Security')
@section('content')
<h2 class="fw-bold mb-1">Admin Account Security</h2>
<p class="text-muted small mb-4">Update your administrator sign-in credentials.</p>

<div class="admin-panel" style="max-width: 540px;">
    <form method="POST" action="{{ route('admin.profile.update') }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name *</label>
            <input type="text" name="name" value="{{ old('name', $admin->name) }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email *</label>
            <input type="email" name="email" value="{{ old('email', $admin->email) }}" class="form-control" required>
        </div>
        <hr class="my-4">
        <div class="mb-3">
            <label class="form-label">New Password <span class="text-muted fw-normal">(leave blank to keep current)</span></label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-4">
            <label class="form-label">Confirm New Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <button class="btn btn-gold px-4">Save Changes</button>
    </form>
</div>
@endsection