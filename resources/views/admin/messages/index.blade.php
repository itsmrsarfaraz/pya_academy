@extends('layouts.admin')
@section('title','Messages')
@section('content')
<h1 class="h3">Contact messages</h1><p class="text-muted">Inbox for enquiries submitted through the website.</p><div class="admin-panel table-responsive"><table class="table align-middle"><thead><tr><th>From</th><th>Subject</th><th>Received</th><th>Status</th><th></th></tr></thead><tbody>@forelse($messages as $m)<tr><td>{{ $m->name }}<div class="small text-muted">{{ $m->email }}</div></td><td>{{ $m->subject }}</td><td>{{ $m->created_at->format('d M Y') }}</td><td>{{ $m->is_read?'Read':'<strong>Unread</strong>' }}</td><td><a href="{{ route('admin.messages.show',$m) }}" class="btn btn-sm btn-outline-primary">Open</a></td></tr>@empty<tr><td colspan="5">No messages yet.</td></tr>@endforelse</tbody></table>{{ $messages->links() }}</div>
@endsection
