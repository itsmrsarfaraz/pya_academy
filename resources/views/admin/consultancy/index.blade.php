@extends('layouts.admin')
@section('title', 'Consultancy Requests')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-1">Consultancy Requests</h3>
        <p class="text-muted small mb-0">Review career, certification, and institutional advisory inquiries.</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Status</th>
                    <th>Applicant</th>
                    <th>Contact</th>
                    <th>Topic</th>
                    <th>Details</th>
                    <th>Received</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($consultancies as $item)
                    <tr class="{{ $item->is_read ? '' : 'table-warning' }}">
                        <td>
                            @if($item->is_read)
                                <span class="badge bg-secondary">Read</span>
                            @else
                                <span class="badge bg-success">New</span>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $item->name }}</td>
                        <td class="small">
                            <div>{{ $item->phone }}</div>
                            @if($item->email && $item->email !== 'no-email@academy.local')
                                <div class="text-muted">{{ $item->email }}</div>
                            @endif
                        </td>
                        <td class="small fw-semibold">{{ \Illuminate\Support\Str::after($item->subject, '[Consultancy] ') }}</td>
                        <td class="small" style="max-width: 340px;">{{ $item->message }}</td>
                        <td class="small text-muted">{{ $item->created_at?->format('d M Y, h:i A') }}</td>
                        <td class="text-end text-nowrap">
                            @unless($item->is_read)
                                <form method="POST" action="{{ route('admin.consultancy.read', $item) }}" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-outline-success">Mark Read</button>
                                </form>
                            @endunless
                            <form method="POST" action="{{ route('admin.consultancy.destroy', $item) }}" class="d-inline" onsubmit="return confirm('Delete this consultancy request?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">No consultancy requests yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    {{ $consultancies->links() }}
</div>
@endsection