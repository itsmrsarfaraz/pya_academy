@extends('layouts.public')
@section('title', 'Achievements')
@section('meta_description', 'Student achievements and certified graduates at Professional Youth Academy.')
@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow"><i class="bi bi-trophy-fill"></i> STUDENT ACHIEVEMENTS</span>
        <h1>Certified graduates &amp; milestones</h1>
        <p>Recognizing students who completed accredited training and earned industry credentials.</p>
    </div>
</section>

<section class="section-pad">
    <div class="container">
        <div class="row g-4">
            @forelse($achievements as $a)
                <div class="col-md-6 col-lg-4">
                    <div class="achievement-card h-100">
                        @if($a->student_photo)
                            <img src="{{ asset('storage/'.$a->student_photo) }}" alt="{{ $a->student_name }}">
                        @else
                            <div class="achievement-placeholder"><i class="bi bi-award-fill"></i></div>
                        @endif
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <span class="tag tag-gold align-self-start mb-2">{{ $a->completion_year }}</span>
                            <h5 class="fw-bold mb-1">{{ $a->student_name }}</h5>
                            <p class="fw-semibold text-primary-brand mb-1">{{ $a->diploma_title }}</p>
                            <small class="text-muted mb-3">{{ $a->awarding_body }}</small>
                            @if($a->remarks)
                                <p class="small text-muted border-top pt-3 mt-auto mb-0">{{ $a->remarks }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">No student achievements published yet.</p>
                </div>
            @endforelse
        </div>
        <div class="mt-5 d-flex justify-content-center">{{ $achievements->links() }}</div>
    </div>
</section>
@endsection