@extends('layouts.public')
@section('title', 'Application Submitted')
@section('content')
<section class="section-pad">
    <div class="container">
        <div class="success-panel text-center">
            <div class="success-check"><i class="bi bi-check-lg"></i></div>
            <h2 class="fw-bold">Application Received</h2>
            <p class="text-muted">Thank you, <strong>{{ $enrollment->full_name }}</strong>. Your admission request for <strong>{{ $enrollment->diploma?->title }}</strong> has been recorded.</p>
            <div class="reference-box">
                <small class="text-muted text-uppercase fw-semibold">Reference Number</small>
                <h3 class="text-primary-brand">{{ $enrollment->reference }}</h3>
                <small class="text-muted">Save this code for future follow-up with the academy.</small>
            </div>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ route('diplomas.index') }}" class="btn btn-emerald">Browse More Diplomas</a>
                <a href="{{ route('home') }}" class="btn btn-outline-emerald">Return Home</a>
            </div>
        </div>
    </div>
</section>
@endsection