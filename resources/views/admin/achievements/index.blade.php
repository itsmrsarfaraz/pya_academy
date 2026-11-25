@extends('layouts.admin')
@section('title', 'Achievements')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-0">Student Achievements</h2>
        <p class="text-muted small mb-0">Showcase certified graduates and milestone records.</p>
    </div>
    <a href="{{ route('admin.achievements.create') }}" class="btn btn-gold"><i class="bi bi-plus-lg me-1"></i> Add Achievement</a>
</div>

<div class="admin-panel">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Student</th>
                    <th>Diploma</th>
                    <th>Awarding Body</th>
                    <th>Year</th>
                    <th>Visibility</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($achievements as $a)
                    <tr>
                        <td class="fw-bold text-primary-brand">{{ $a->student_name }}</td>
                        <td>{{ $a->diploma_title }}</td>
                        <td>{{ $a->awarding_body }}</td>
                        <td class="font-mono">{{ $a->completion_year }}</td>
                        <td>
                            @if($a->is_published)
                                <span class="status status-confirmed">Published</span>
                            @else
                                <span class="status status-pending">Hidden</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.achievements.edit', $a) }}" class="btn btn-sm btn-outline-emerald">Edit</a>
                            <form method="POST" action="{{ route('admin.achievements.destroy', $a) }}" class="d-inline" onsubmit="return confirm('Delete this record?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted py-4">No achievements added yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $achievements->links() }}</div>
</div>
@endsection