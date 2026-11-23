@extends('layouts.admin')
@section('title','Achievements')
@section('content')
<div class="d-flex justify-content-between mb-4"><div><h1 class="h3">Student achievements</h1><p class="text-muted">Publish verified student milestones.</p></div><a class="btn btn-orange" href="{{ route('admin.achievements.create') }}">+ Add achievement</a></div>
<div class="admin-panel table-responsive"><table class="table align-middle"><thead><tr><th>Student</th><th>Diploma</th><th>Year</th><th>Published</th><th></th></tr></thead><tbody>@forelse($achievements as $a)<tr><td>{{ $a->student_name }}</td><td>{{ $a->diploma_title }}</td><td>{{ $a->completion_year }}</td><td>{{ $a->is_published?'Yes':'No' }}</td><td class="text-end"><a class="btn btn-sm btn-outline-primary" href="{{ route('admin.achievements.edit',$a) }}">Edit</a><form class="d-inline" method="POST" action="{{ route('admin.achievements.destroy',$a) }}" onsubmit="return confirm('Delete achievement?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Delete</button></form></td></tr>@empty<tr><td colspan="5">No achievements yet.</td></tr>@endforelse</tbody></table>{{ $achievements->links() }}</div>
@endsection
