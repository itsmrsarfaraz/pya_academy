@extends('layouts.public')
@section('title', 'Contact')
@section('meta_description', 'Contact Professional Youth Academy about diplomas, fees, duration and admissions.')
@section('content')
<section class="page-hero"><div class="container">
    <span class="eyebrow">GET IN TOUCH</span><h1>Let's talk about your next step.</h1>
    <p>Ask us about course options, fees, duration and admission requirements.</p>
</div></section>
<section class="section-pad"><div class="container"><div class="row g-5">
    <div class="col-lg-5">
        <h2>Contact Professional Youth Academy</h2>
        <p class="text-muted">Our team can guide you through available programs and the application process.</p>
        <div class="contact-detail"><b>Phone / WhatsApp</b>
            <p class="mb-1"><a href="tel:+923205008288">+92 320 5008288</a></p>
            <p><a href="tel:+92512228123">051 2228123</a></p>
        </div>
        <div class="contact-detail"><b>Email</b><p><a href="mailto:professionalyouthacademy@gmail.com">professionalyouthacademy@gmail.com</a></p></div>
        <div class="contact-detail"><b>Campus Address</b><p>Office No. 04, 1st Floor, Militia Market near RP Chowk, Parachinar, District Kurram, KPK, Pakistan</p></div>
    </div>
    <div class="col-lg-7"><div class="form-shell">
        <form method="POST" action="{{ route('contact.store') }}">@csrf
            <div class="row g-3">
                <div class="col-md-6"><label class="form-label">Name *</label><input name="name" class="form-control" required value="{{ old('name') }}"></div>
                <div class="col-md-6"><label class="form-label">Email *</label><input type="email" name="email" class="form-control" required value="{{ old('email') }}"></div>
                <div class="col-md-6"><label class="form-label">Phone</label><input name="phone" class="form-control" value="{{ old('phone') }}"></div>
                <div class="col-md-6"><label class="form-label">Subject *</label><input name="subject" class="form-control" required value="{{ old('subject') }}"></div>
                <div class="col-12"><label class="form-label">Message *</label><textarea name="message" class="form-control" rows="5" required>{{ old('message') }}</textarea></div>
                <div class="col-12"><button class="btn btn-warning btn-lg">Send message</button></div>
            </div>
        </form>
    </div></div>
</div></div></section>
@endsection
