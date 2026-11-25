@extends('layouts.admin')
@section('title', 'Add Achievement')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Add Achievement</h2>
    <a href="{{ route('admin.achievements.index') }}" class="btn btn-outline-emerald btn-sm">Back to List</a>
</div>

<div class="admin-panel">
    <form method="POST" action="{{ route('admin.achievements.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Student Name *</label>
                <input type="text" name="student_name" value="{{ old('student_name') }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Diploma Title *</label>
                <input type="text" name="diploma_title" value="{{ old('diploma_title') }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Awarding Body *</label>
                <input type="text" name="awarding_body" value="{{ old('awarding_body') }}" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Completion Year *</label>
                <input type="text" name="completion_year" value="{{ old('completion_year', date('Y')) }}" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Display Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Student Photo</label>
                <input type="file" name="student_photo" accept="image/*" class="form-control">
            </div>
            <div class="col-md-6 d-flex align-items-end">
                <div class="form-check mb-2">
                    <input type="checkbox" name="is_published" value="1" class="form-check-input" id="apub" @checked(old('is_published', true))>
                    <label class="form-check-label fw-medium" for="apub">Publish on public website</label>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Remarks</label>
                <textarea name="remarks" rows="3" class="form-control">{{ old('remarks') }}</textarea>
            </div>
        </div>
        <button class="btn btn-gold mt-4 px-4">Save Achievement</button>
    </form>
</div>
@endsection