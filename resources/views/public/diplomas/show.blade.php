@extends('layouts.public')
@section('title', $diploma->title)
@section('meta_description', $diploma->short_description)
@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow"><i class="bi bi-award"></i> {{ $diploma->category?->name }}</span>
        <h1>{{ $diploma->title }}</h1>
        <p>{{ $diploma->short_description }}</p>
    </div>
</section>

<section class="section-pad">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                @if($diploma->image)
                    <img src="{{ asset('storage/'.$diploma->image) }}" class="w-100 rounded-4 mb-4 shadow-sm" style="max-height: 400px; object-fit: cover;" alt="{{ $diploma->title }}">
                @endif

                <div class="bg-white border rounded-4 p-4 p-md-5 shadow-sm">
                    <h3 class="fw-bold mb-3">Program Overview</h3>
                    <div class="text-muted">{!! nl2br(e($diploma->description)) !!}</div>

                    @if($diploma->syllabus)
                        <hr class="my-4">
                        <h4 class="fw-bold mb-3"><i class="bi bi-list-check text-gold me-2"></i>Syllabus &amp; Modules</h4>
                        <div class="text-muted">{!! nl2br(e($diploma->syllabus)) !!}</div>
                    @endif

                    @if($diploma->eligibility)
                        <hr class="my-4">
                        <h4 class="fw-bold mb-3"><i class="bi bi-person-check text-gold me-2"></i>Eligibility Requirements</h4>
                        <div class="text-muted">{!! nl2br(e($diploma->eligibility)) !!}</div>
                    @endif
                </div>
            </div>

            <div class="col-lg-4">
                <div class="enroll-card">
                    <span class="eyebrow-dark">PROGRAM SUMMARY</span>
                    <h4 class="fw-bold mt-1 mb-4">Admission Details</h4>
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted">Duration</span>
                        <strong class="text-primary-brand">{{ $diploma->duration }}</strong>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted">Awarding Body</span>
                        <strong class="text-end text-primary-brand">{{ $diploma->awarding_body }}</strong>
                    </div>
                    <div class="d-flex justify-content-between py-3 border-bottom">
                        <span class="text-muted">Tuition Fee</span>
                        <strong class="font-mono fs-5 text-primary-brand">{{ $diploma->currency }} {{ number_format($diploma->fee) }}</strong>
                    </div>
                    <a href="{{ route('enroll.create', ['diploma' => $diploma->slug]) }}" class="btn btn-gold btn-lg w-100 mt-4">
                        Apply for This Diploma <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                    <a href="{{ route('diplomas.index') }}" class="btn btn-outline-emerald w-100 mt-2">
                        Back to All Diplomas
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection