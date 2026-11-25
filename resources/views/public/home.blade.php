@extends('layouts.public')
@section('title', 'Home')
@section('meta_description', 'Professional Youth Academy offers career-focused diplomas and professional skills training in Parachinar.')
@section('content')
<section class="hero">
    <div class="container position-relative">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="eyebrow"><i class="bi bi-stars"></i> LEARN · GROW · SUCCEED</span>
                <h1 class="display-4 mt-3">Build real skills.<br><span class="text-gold">Shape your future.</span></h1>
                <p class="lead text-white-50 mt-3 mb-4 pe-lg-4">Career-focused diplomas and internationally recognized training in Health &amp; Safety (NEBOSH/IOSH), Information Technology, Quality Control, and Technical Trades.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('diplomas.index') }}" class="btn btn-gold btn-lg">
                        Explore Diplomas <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                    <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg">Discover Academy</a>
                </div>
                <div class="hero-points mt-5 pt-2">
                    <span><i class="bi bi-patch-check-fill"></i> Industry-Aligned Syllabi</span>
                    <span><i class="bi bi-cash-coin"></i> Transparent Fee Structure</span>
                    <span><i class="bi bi-person-lines-fill"></i> 1-on-1 Admission Guidance</span>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-glass-card">
                    <div class="hero-icon-badge"><i class="bi bi-mortarboard-fill"></i></div>
                    <h3>Admissions Open {{ date('Y') }}</h3>
                    <p class="text-white-50 small mb-4">Fast-track your employability with accredited local and international credentials right here in Parachinar.</p>
                    <div class="d-flex flex-column gap-2 small text-white mb-4">
                        <div class="d-flex justify-content-between py-2 border-bottom border-white border-opacity-10">
                            <span class="text-white-50">HSE &amp; Safety</span>
                            <span class="fw-semibold">NEBOSH · IOSH · OSHA</span>
                        </div>
                        <div class="d-flex justify-content-between py-2 border-bottom border-white border-opacity-10">
                            <span class="text-white-50">Computing</span>
                            <span class="fw-semibold">DIT · Office · Freelancing</span>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <span class="text-white-50">Campus</span>
                            <span class="fw-semibold">Militia Market, Parachinar</span>
                        </div>
                    </div>
                    <a href="{{ route('enroll.create') }}" class="btn btn-light w-100 fw-bold text-primary-brand">Start Online Application</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-pad">
    <div class="container">
        <div class="row g-4 g-lg-5 align-items-center ceo-home-card">
            <div class="col-lg-7">
                <span class="eyebrow-dark">A MESSAGE FROM LEADERSHIP</span>
                <h2 class="fw-bold mb-3">Empowering the Youth of District Kurram</h2>
                <blockquote class="ceo-quote">“Every young person holds immense potential. With practical skills, mentorship, and global credentials, there is no limit to what they can achieve.”</blockquote>
                <p class="text-muted">At <strong>Professional Youth Academy</strong>, we bring accredited training, hands-on computer labs, and career coaching directly to Parachinar—so students can build competitive careers locally and abroad.</p>
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-4 pt-3 border-top">
                    <div>
                        <strong class="d-block fs-5 text-primary-brand">Sayed Anwar Ali</strong>
                        <span class="small text-muted">Founder &amp; Chief Executive Officer</span>
                    </div>
                    <a href="{{ route('about') }}#ceo-message" class="btn btn-outline-emerald">Read Full Message</a>
                </div>
            </div>
            <div class="col-lg-5 text-center">
                <a href="{{ route('about') }}#ceo-message" aria-label="Read the full message from the CEO">
                    <img src="{{ asset('images/ceo-message.jpeg') }}" class="ceo-home-image" alt="Sayed Anwar Ali, Chief Executive Officer of Professional Youth Academy">
                </a>
            </div>
        </div>
    </div>
</section>

<section class="section-pad pt-2">
    <div class="container">
        <div class="section-heading">
            <span class="eyebrow-dark">ACADEMIC CATALOG</span>
            <h2>Explore Our Diplomas</h2>
            <p>Clear duration, awarding body verification, and transparent fee details for every track.</p>
        </div>
        <div class="row g-4">
            @forelse($latest as $d)
                <div class="col-md-6 col-lg-4">
                    <div class="course-card h-100 position-relative">
                        @if($d->image)
                            <img src="{{ asset('storage/'.$d->image) }}" class="course-image" alt="{{ $d->title }}">
                        @else
                            <div class="course-placeholder"><span>{{ strtoupper(substr($d->title, 0, 1)) }}</span></div>
                        @endif
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
                                <span class="tag">{{ $d->category?->name }}</span>
                                <span class="small text-muted"><i class="bi bi-clock me-1"></i>{{ $d->duration }}</span>
                            </div>
                            <h5 class="fw-bold mt-1">{{ $d->title }}</h5>
                            <p class="text-muted small flex-grow-1">{{ $d->short_description }}</p>
                            <div class="d-flex justify-content-between align-items-center border-top pt-3 mt-2">
                                <span class="font-mono fw-bold text-primary-brand">{{ $d->currency }} {{ number_format($d->fee) }}</span>
                                <span class="small fw-semibold text-gold">View Details <i class="bi bi-arrow-right"></i></span>
                            </div>
                            <a class="stretched-link" href="{{ route('diplomas.show', $d) }}" aria-label="View {{ $d->title }}"></a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-4"><p>No published diplomas yet.</p></div>
            @endforelse
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('diplomas.index') }}" class="btn btn-outline-emerald btn-lg">Browse All Programs</a>
        </div>
    </div>
</section>

<section class="stats-band py-5">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-4">
                <div class="stat-item">
                    <i class="bi bi-briefcase-fill"></i>
                    <h4 class="fw-bold mb-1">Career-Focused</h4>
                    <p class="text-muted small mb-0">Curricula designed around local and Gulf/international employer standards.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item">
                    <i class="bi bi-laptop-fill"></i>
                    <h4 class="fw-bold mb-1">Practical Labs</h4>
                    <p class="text-muted small mb-0">Hands-on equipment, safety workshops, and supervised computing sessions.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item">
                    <i class="bi bi-award-fill"></i>
                    <h4 class="fw-bold mb-1">Verified Credentials</h4>
                    <p class="text-muted small mb-0">Clear awarding-body references and step-by-step admission counseling.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@if($achievements->isNotEmpty())
<section class="section-pad">
    <div class="container">
        <div class="section-heading">
            <span class="eyebrow-dark">ALUMNI MILESTONES</span>
            <h2>Achievements That Inspire</h2>
            <p>Celebrating graduates who turned training into certified qualifications.</p>
        </div>
        <div class="row g-4">
            @foreach($achievements as $a)
                <div class="col-md-4">
                    <div class="achievement-card h-100">
                        @if($a->student_photo)
                            <img src="{{ asset('storage/'.$a->student_photo) }}" alt="{{ $a->student_name }}">
                        @else
                            <div class="achievement-placeholder"><i class="bi bi-trophy-fill"></i></div>
                        @endif
                        <div class="p-4">
                            <span class="tag tag-gold mb-2">{{ $a->completion_year }}</span>
                            <h5 class="fw-bold mb-1">{{ $a->student_name }}</h5>
                            <p class="fw-medium text-primary-brand mb-1">{{ $a->diploma_title }}</p>
                            <small class="text-muted">{{ $a->awarding_body }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('achievements') }}" class="btn btn-outline-emerald">See All Achievements</a>
        </div>
    </div>
</section>
@endif

<section class="cta-strip py-5">
    <div class="container d-md-flex align-items-center justify-content-between gap-4">
        <div>
            <h2 class="text-white fw-bold mb-1">Ready to take the next step?</h2>
            <p class="text-white-50 mb-md-0">Submit an online admission inquiry in under two minutes—no upfront online payment required.</p>
        </div>
        <a href="{{ route('enroll.create') }}" class="btn btn-gold btn-lg flex-shrink-0">Start Your Application</a>
    </div>
</section>
@endsection