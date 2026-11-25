@extends('layouts.admin')
@section('title', 'Enrollments')
@section('content')
<h2 class="fw-bold mb-1">Enrollments</h2>
<p class="text-muted small mb-4">Review incoming student applications and update admission status.</p>

<form class="admin-panel mb-4 row g-2" method="GET">
    <div class="col-md-5">
        <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Search by reference, name, phone...">
    </div>
    <div class="col-md-4">
        <select name="status" class="form-select">
            <option value="">All Statuses</option>
            @foreach(['pending','confirmed','rejected'] as $st)
                <option value="{{ $st }}" @selected(request('status') === $st)>{{ ucfirst($st) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 d-grid">
        <button class="btn btn-emerald">Filter</button>
    </div>
</form>

<div class="admin-panel">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Reference</th>
                    <th>Applicant</th>
                    <th>Diploma</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($enrollments as $e)
                    <tr>
                        <td class="font-mono fw-semibold text-primary-brand">{{ $e->reference_code }}</td>
                        <td class="fw-medium">{{ $e->full_name }}</td>
                        <td>{{ $e->diploma?->title }}</td>
                        <td class="font-mono small">{{ $e->phone }}</td>
                        <td><span class="status status-{{ $e->status }}">{{ ucfirst($e->status) }}</span></td>
                        <td class="small text-muted">{{ $e->created_at->format('d M Y') }}</td>
                        <td class="text-end"><a href="{{ route('admin.enrollments.show', $e) }}" class="btn btn-sm btn-outline-emerald">Review</a></td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted py-4">No enrollments found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $enrollments->links() }}</div>
</div>
@endsection