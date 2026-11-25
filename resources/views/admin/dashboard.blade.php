@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
    <div>
        <h2 class="fw-bold mb-1">Dashboard Overview</h2>
        <p class="text-muted small mb-0">Summary of diplomas, admissions, student achievements, and inquiries.</p>
    </div>
    <a href="{{ route('admin.diplomas.create') }}" class="btn btn-gold btn-sm">
        <i class="bi bi-plus-lg me-1"></i> New Diploma
    </a>
</div>

<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3"><div class="metric-card"><span>Total Diplomas</span><strong>{{ $stats['diplomas'] }}</strong></div></div>
    <div class="col-sm-6 col-xl-3"><div class="metric-card"><span>Pending Enrollments</span><strong>{{ $stats['pending_enrollments'] }}</strong></div></div>
    <div class="col-sm-6 col-xl-3"><div class="metric-card"><span>Achievements</span><strong>{{ $stats['achievements'] }}</strong></div></div>
    <div class="col-sm-6 col-xl-3"><div class="metric-card"><span>Unread Messages</span><strong>{{ $stats['unread_messages'] }}</strong></div></div>
</div>

<div class="admin-panel">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Recent Enrollments</h5>
        <a href="{{ route('admin.enrollments.index') }}" class="btn btn-sm btn-outline-emerald">View All</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Reference</th>
                    <th>Student</th>
                    <th>Diploma</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentEnrollments as $e)
                    <tr>
                        <td>
                            <a href="{{ route('admin.enrollments.show', $e) }}" class="font-mono fw-semibold text-primary-brand text-decoration-none">
                                {{ $e->reference ?? $e->reference_code ?? $e->id }}
                            </a>
                        </td>
                        <td class="fw-medium">{{ $e->full_name }}</td>
                        <td>{{ $e->diploma?->title }}</td>
                        <td class="font-mono small">{{ $e->phone }}</td>
                        <td><span class="status status-{{ $e->status }}">{{ ucfirst($e->status) }}</span></td>
                        <td class="small text-muted">{{ $e->created_at?->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted py-4">No enrollments yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection