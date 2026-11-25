@extends('layouts.admin')
@section('title', 'Add Diploma')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Add Diploma</h2>
    <a href="{{ route('admin.diplomas.index') }}" class="btn btn-outline-emerald btn-sm">Back to List</a>
</div>

<div class="admin-panel">
    <form method="POST" action="{{ route('admin.diplomas.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-md-8">
                <label class="form-label">Title *</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Category *</label>
                <select name="category_id" class="form-select" required>
                    <option value="">Select category...</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" @selected(old('category_id') == $c->id)>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Duration *</label>
                <input type="text" name="duration" value="{{ old('duration') }}" class="form-control" placeholder="e.g., 6 Months" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Fee *</label>
                <input type="number" step="0.01" name="fee" value="{{ old('fee', 0) }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Currency *</label>
                <input type="text" name="currency" value="{{ old('currency', 'PKR') }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Awarding Body *</label>
                <input type="text" name="awarding_body" value="{{ old('awarding_body', 'Professional Youth Academy') }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Cover Image (JPG/PNG/WEBP, max 2MB)</label>
                <input type="file" name="image" accept="image/*" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label">Short Description *</label>
                <textarea name="short_description" rows="2" class="form-control" required>{{ old('short_description') }}</textarea>
            </div>
            <div class="col-12">
                <label class="form-label">Full Description *</label>
                <textarea name="description" rows="4" class="form-control" required>{{ old('description') }}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">Syllabus</label>
                <textarea name="syllabus" rows="4" class="form-control">{{ old('syllabus') }}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">Eligibility</label>
                <textarea name="eligibility" rows="4" class="form-control">{{ old('eligibility') }}</textarea>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input type="checkbox" name="is_published" value="1" class="form-check-input" id="pub" @checked(old('is_published', true))>
                    <label class="form-check-label fw-medium" for="pub">Publish on public website</label>
                </div>
            </div>
        </div>
        <button class="btn btn-gold mt-4 px-4">Save Diploma</button>
    </form>
</div>
@endsection