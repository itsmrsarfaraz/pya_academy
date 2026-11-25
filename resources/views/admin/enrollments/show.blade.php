@extends('layouts.admin')
@section('title', 'Enrollment '.$enrollment->reference_code)
@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
    <div>
        <h2 class="fw-bold mb-0 font-mono">{{ $enrollment->reference_code }}</h2>
        <span class="text-muted small">Submitted {{ $enrollment->created_at->format('d M Y, h:i A') }}</span>
    </div>
    <a href="{{ route('admin.enrollments.index') }}" class="btn btn-outline-emerald btn-sm">Back to Enrollments</a>
</div>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="admin-panel">
            <h5 class="fw-bold mb-3">Applicant Information</h5>
            <dl class="row mb-0">
                <dt class="col-sm-4 text-muted">Full Name</dt><dd class="col-sm-8 fw-semibold">{{ $enrollment->full_name }}</dd>
                <dt class="col-sm-4 text-muted">Father / Guardian</dt><dd class="col-sm-8">{{ $enrollment->father_name ?: '—' }}</dd>
                <dt class="col-sm-4 text-muted">Phone</dt><dd class="col-sm-8 font-mono">{{ $enrollment->phone }}</dd>
                <dt class="col-sm-4 text-muted">Email</dt><dd class="col-sm-8">{{ $enrollment->email ?: '—' }}</dd>
                <dt class="col-sm-4 text-muted">CNIC</dt><dd class="col-sm-8 font-mono">{{ $enrollment->cnic ?: '—' }}</dd>
                <dt class="col-sm-4 text-muted">Qualification</dt><dd class="col-sm-8">{{ $enrollment->qualification ?: '—' }}</dd>
                <dt class="col-sm-4 text-muted">Address</dt><dd class="col-sm-8">{{ $enrollment->address ?: '—' }}</dd>
                <dt class="col-sm-4 text-muted">Diploma</dt><dd class="col-sm-8 fw-bold text-primary-brand">{{ $enrollment->diploma?->title }}</dd>
                <dt class="col-sm-4 text-muted">Applicant Notes</dt><dd class="col-sm-8">{{ $enrollment->notes ?: '—' }}</dd>
            </dl>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="admin-panel">
            <h5 class="fw-bold mb-3">Admission Decision</h5>
            <p>Current Status: <span class="status status-{{ $enrollment->status }}">{{ ucfirst($enrollment->status) }}</span></p>
            <form method="POST" action="{{ route('admin.enrollments.update', $enrollment) }}">
                @csrf @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        @foreach(['pending','confirmed','rejected'] as $st)
                            <option value="{{ $st }}" @selected($enrollment->status === $st)>{{ ucfirst($st) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Internal Admin Remarks</label>
                    <textarea name="admin_notes" rows="4" class="form-control">{{ old('admin_notes', $enrollment->admin_notes) }}</textarea>
                </div>
                <button class="btn btn-gold w-100">Save Decision</button>
            </form>
        </div>
    </div>
</div>
@endsection