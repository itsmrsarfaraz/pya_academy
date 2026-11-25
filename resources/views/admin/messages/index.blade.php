@extends('layouts.admin')
@section('title', 'Messages')
@section('content')
<h2 class="fw-bold mb-1">Contact Messages</h2>
<p class="text-muted small mb-4">Inquiries submitted through the public contact form.</p>

<div class="row g-3">
    @forelse($messages as $m)
        <div class="col-12">
            <div class="admin-panel">
                <div class="d-flex flex-wrap justify-content-between align-items-start gap-2">
                    <div>
                        <span class="fw-bold fs-6 text-primary-brand">{{ $m->name }}</span>
                        <span class="text-muted small ms-1">&lt;{{ $m->email }}&gt;</span>
                        @if($m->phone)
                            <span class="badge bg-light text-dark border ms-2 font-mono">{{ $m->phone }}</span>
                        @endif
                        <div class="fw-semibold mt-1">{{ $m->subject ?: 'General Inquiry' }}</div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="small text-muted">{{ $m->created_at->format('d M Y, h:i A') }}</span>
                        @if(!$m->is_read)
                            <form method="POST" action="{{ route('admin.messages.read', $m) }}">
                                @csrf @method('PATCH')
                                <button class="btn btn-sm btn-gold">Mark Read</button>
                            </form>
                        @else
                            <span class="status status-confirmed">Read</span>
                        @endif
                        <form method="POST" action="{{ route('admin.messages.destroy', $m) }}" onsubmit="return confirm('Delete message?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-muted border-top pt-3">{!! nl2br(e($m->message)) !!}</p>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="admin-panel text-center text-muted py-5">No messages received yet.</div>
        </div>
    @endforelse
</div>
<div class="mt-4">{{ $messages->links() }}</div>
@endsection