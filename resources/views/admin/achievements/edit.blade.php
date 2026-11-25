@extends('layouts.admin')
@section('title', 'Edit Achievement')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Edit Achievement</h2>
    <a href="{{ route('admin.achievements.index') }}" class="btn btn-outline-emerald btn-sm">Back to List</a>
</div>

<div class="admin-panel">
    <form method="POST" action="{{ route('admin.achievements.update', $achievement) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Student Name *</label>
                <input type="text" name="student_name" value="{{ old('student_name', $achievement->student_name) }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Diploma Title *</label>
                <input type="text" name="diploma_title" value="{{ old('diploma_title', $achievement->diploma_title) }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Awarding Body *</label>
                <input type="text" name="awarding_body" value="{{ old('awarding_body', $achievement->awarding_body) }}" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Completion Year *</label>
                <input type="text" name="completion_year" value="{{ old('completion_year', $achievement->completion_year) }}" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Display Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $achievement->sort_order) }}" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Replace Student Photo</label>
                <input type="file" name="student_photo" accept="image/*" class="form-control">
                @if($achievement->student_photo)
                    <img src="{{ asset('storage/'.$achievement->student_photo) }}" class="mt-2 rounded-3 border" style="height: 64px; object-fit: cover;" alt="">
                @endif
            </div>
            <div class="col-md-6 d-flex align-items-end">
                <div class="form-check mb-2">
                    <input type="checkbox" name="is_published" value="1" class="form-check-input" id="apub" @checked(old('is_published', $achievement->is_published))>
                    <label class="form-check-label fw-medium" for="apub">Publish on public website</label>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Remarks</label>
                <textarea name="remarks" rows="3" class="form-control">{{ old('remarks', $achievement->remarks) }}</textarea>
            </div>
        </div>
        <button class="btn btn-gold mt-4 px-4">Update Achievement</button>
    </form>
</div>
@endsection