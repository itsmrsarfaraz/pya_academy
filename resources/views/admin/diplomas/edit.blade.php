@extends('layouts.admin')
@section('title', 'Edit Diploma')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Edit Diploma</h2>
    <a href="{{ route('admin.diplomas.index') }}" class="btn btn-outline-emerald btn-sm">Back to List</a>
</div>

<div class="admin-panel">
    <form method="POST" action="{{ route('admin.diplomas.update', $diploma) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row g-3">
            <div class="col-md-8">
                <label class="form-label">Title *</label>
                <input type="text" name="title" value="{{ old('title', $diploma->title) }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Category *</label>
                <select name="category_id" class="form-select" required>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" @selected(old('category_id', $diploma->category_id) == $c->id)>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Duration *</label>
                <input type="text" name="duration" value="{{ old('duration', $diploma->duration) }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Fee *</label>
                <input type="number" step="0.01" name="fee" value="{{ old('fee', $diploma->fee) }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Currency *</label>
                <input type="text" name="currency" value="{{ old('currency', $diploma->currency) }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Awarding Body *</label>
                <input type="text" name="awarding_body" value="{{ old('awarding_body', $diploma->awarding_body) }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Replace Cover Image</label>
                <input type="file" name="image" accept="image/*" class="form-control">
                @if($diploma->image)
                    <img src="{{ asset('storage/'.$diploma->image) }}" class="mt-2 rounded-3 border" style="height: 64px; object-fit: cover;" alt="">
                @endif
            </div>
            <div class="col-12">
                <label class="form-label">Short Description *</label>
                <textarea name="short_description" rows="2" class="form-control" required>{{ old('short_description', $diploma->short_description) }}</textarea>
            </div>
            <div class="col-12">
                <label class="form-label">Full Description *</label>
                <textarea name="description" rows="4" class="form-control" required>{{ old('description', $diploma->description) }}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">Syllabus</label>
                <textarea name="syllabus" rows="4" class="form-control">{{ old('syllabus', $diploma->syllabus) }}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">Eligibility</label>
                <textarea name="eligibility" rows="4" class="form-control">{{ old('eligibility', $diploma->eligibility) }}</textarea>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input type="checkbox" name="is_published" value="1" class="form-check-input" id="pub" @checked(old('is_published', $diploma->is_published))>
                    <label class="form-check-label fw-medium" for="pub">Publish on public website</label>
                </div>
            </div>
        </div>
        <button class="btn btn-gold mt-4 px-4">Update Diploma</button>
    </form>
</div>
@endsection