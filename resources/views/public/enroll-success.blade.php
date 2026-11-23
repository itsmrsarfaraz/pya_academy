@extends('layouts.public')
@section('title','Application Received')
@section('content')
<section class="section-pad"><div class="container"><div class="success-panel text-center"><div class="success-check">✓</div><span class="eyebrow-dark">APPLICATION RECEIVED</span><h1 class="mt-3">Thank you, {{ $application->full_name }}.</h1><p class="text-muted">Your application has been submitted successfully. The academy team will contact you using the phone number provided.</p><div class="reference-box"><small>APPLICATION REFERENCE</small><h3>{{ $application->reference }}</h3><span class="badge text-bg-warning">Pending review</span></div><p class="small text-muted mt-4">Your admission is not confirmed yet. Please keep your reference number for follow-up.</p><a href="{{ route('home') }}" class="btn btn-navy mt-2">Back to home</a></div></div></section>
@endsection
