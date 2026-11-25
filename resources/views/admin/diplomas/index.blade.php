@extends('layouts.admin')
@section('title', 'Diplomas')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-0">Diplomas</h2>
        <p class="text-muted small mb-0">Manage published and draft academic programs.</p>
    </div>
    <a href="{{ route('admin.diplomas.create') }}" class="btn btn-gold"><i class="bi bi-plus-lg me-1"></i> Add Diploma</a>
</div>

<div class="admin-panel">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Duration</th>
                    <th>Fee</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($diplomas as $d)
                    <tr>
                        <td>
                            <div class="fw-bold text-primary-brand">{{ $d->title }}</div>
                            <div class="small text-muted">{{ $d->awarding_body }}</div>
                        </td>
                        <td><span class="tag">{{ $d->category?->name }}</span></td>
                        <td>{{ $d->duration }}</td>
                        <td class="font-mono fw-semibold">{{ $d->currency }} {{ number_format($d->fee) }}</td>
                        <td>
                            @if($d->is_published)
                                <span class="status status-confirmed">Published</span>
                            @else
                                <span class="status status-pending">Draft</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.diplomas.edit', $d) }}" class="btn btn-sm btn-outline-emerald" title="Edit">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('admin.diplomas.destroy', $d) }}" class="d-inline" onsubmit="return confirm('Delete this diploma?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" title="Delete"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted py-4">No diplomas created yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $diplomas->links() }}</div>
</div>
@endsection