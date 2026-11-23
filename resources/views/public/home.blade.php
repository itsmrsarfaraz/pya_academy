@extends('layouts.public')
@section('title', 'Home')
@section('meta_description', 'Professional Youth Academy offers career-focused diplomas and professional skills training.')
@section('content')
<section class="hero">
    <div class="container">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-7 py-5">
                <span class="eyebrow">LEARN · GROW · SUCCEED</span>
                <h1 class="display-3 fw-bold text-white mt-3">Build skills.<br><span class="text-orange">Build your future.</span></h1>
                <p class="lead text-white-50 mt-3">Career-focused diplomas and professional training in IT, health &amp; safety, quality control and technical skills.</p>
                <div class="d-flex gap-3 flex-wrap mt-4">
                    <a href="{{ route('diplomas.index') }}" class="btn btn-warning btn-lg">Explore Diplomas</a>
                    <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg">Discover Academy</a>
                </div>
                <div class="hero-points mt-5"><span>✓ Practical learning</span><span>✓ Clear course fees</span><span>✓ Personal admission support</span></div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <div class="hero-panel"><div class="hero-icon">P</div><h3>Skills that move you forward</h3><p>Choose a learning path that matches your career goals.</p><div class="hero-panel-line"></div><small>Admissions open — enquire today</small></div>
            </div>
        </div>
    </div>
</section>

<section class="section-pad">
    <div class="container">
        <div class="row g-4 align-items-center ceo-home-card">
            <div class="col-lg-7">
                <div class="section-heading mt-0">
                    <span class="eyebrow-dark text-start">A MESSAGE FROM OUR LEADERSHIP</span>
                    <h2 class="text-start">Message from the CEO</h2>
                </div>
                <h4 class="text-warning">Welcome to Professional Youth Academy.</h4>
                <p class="text-muted">At Professional Youth Academy, we believe every young person has the potential to achieve greatness. We are committed to quality education, practical skills development and a supportive learning environment.</p>
                <p class="fw-semibold mb-4">With best wishes for a successful and inspiring future.</p>
                <p class="mb-3"><strong class="text-warning">Sayed Anwar Ali</strong><br>Chief Executive Officer (CEO)</p>
                <a href="{{ route('about') }}#ceo-message" class="btn btn-outline-secondary">Read the full CEO message</a>
            </div>
            <div class="col-lg-5 text-center">
                <a href="{{ route('about') }}#ceo-message" aria-label="Read the full message from the CEO">
                    <img src="{{ asset('images/ceo-message.jpeg') }}" class="ceo-home-image" alt="Message from Sayed Anwar Ali, Chief Executive Officer of Professional Youth Academy">
                </a>
            </div>
        </div>
    </div>
</section>

<section class="section-pad">
    <div class="container">
        <div class="section-heading"><span class="eyebrow-dark">OUR PROGRAMS</span><h2>Explore our diplomas</h2><p>Transparent course information, duration and fee details.</p></div>
        <div class="row g-4">
            @forelse($latest as $d)
                <div class="col-md-6 col-lg-4">
                    <div class="course-card h-100">
                        @if($d->image)
                            <img src="{{ asset('storage/'.$d->image) }}" class="course-image" alt="{{ $d->title }}">
                        @else
                            <div class="course-placeholder"><span>{{ strtoupper(substr($d->title, 0, 1)) }}</span></div>
                        @endif
                        <div class="p-4">
                            <span class="tag">{{ $d->category?->name }}</span><h5 class="mt-3">{{ $d->title }}</h5>
                            <p class="text-muted small">{{ $d->short_description }}</p>
                            <div class="d-flex justify-content-between small border-top pt-3"><span>Duration: <b>{{ $d->duration }}</b></span><span class="fw-bold text-navy">{{ $d->currency }} {{ number_format($d->fee) }}</span></div>
                            <a class="stretched-link" href="{{ route('diplomas.show', $d) }}" aria-label="View {{ $d->title }}"></a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12"><p>No published diplomas yet.</p></div>
            @endforelse
        </div>
        <div class="text-center mt-4"><a href="{{ route('diplomas.index') }}" class="btn btn-outline-navy">View all diplomas</a></div>
    </div>
</section>

<section class="stats-band"><div class="container py-5"><div class="row text-center g-4">
    <div class="col-4"><h2>Career</h2><p>Focused learning</p></div><div class="col-4"><h2>Practical</h2><p>Skills development</p></div><div class="col-4"><h2>Support</h2><p>Admission guidance</p></div>
</div></div></section>

<section class="section-pad">
    <div class="container">
        <div class="section-heading"><span class="eyebrow-dark">STUDENT SUCCESS</span><h2>Achievements that inspire</h2><p>Celebrating learners and their completed qualifications.</p></div>
        <div class="row g-4">
            @foreach($achievements as $a)
                <div class="col-md-4"><div class="achievement-card h-100">
                    @if($a->student_photo)<img src="{{ asset('storage/'.$a->student_photo) }}" alt="{{ $a->student_name }}">@else<div class="achievement-placeholder">★</div>@endif
                    <div class="p-3"><h5>{{ $a->student_name }}</h5><p class="mb-1">{{ $a->diploma_title }}</p><small class="text-muted">{{ $a->completion_year }} · {{ $a->awarding_body }}</small></div>
                </div></div>
            @endforeach
        </div>
        <div class="text-center mt-4"><a href="{{ route('achievements') }}" class="btn btn-outline-navy">See all achievements</a></div>
    </div>
</section>

<section class="cta-strip"><div class="container py-5 d-md-flex align-items-center justify-content-between">
    <div><h2 class="text-white">Ready to take the next step?</h2><p class="text-white-50 mb-md-0">Find a diploma that fits your ambitions.</p></div>
    <a href="{{ route('enroll.create') }}" class="btn btn-outline-warning btn-lg">Start your application</a>
</div></section>
@endsection
