@extends('layouts.public')
@section('title', 'Contact')
@section('meta_description', 'Get in touch with Professional Youth Academy.')
@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow"><i class="bi bi-geo-alt-fill"></i> CONTACT US</span>
        <h1>Get in touch</h1>
        <p>Have questions about diplomas, schedules, or admissions? Send us a message or reach out directly.</p>
    </div>
</section>

<section class="section-pad">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="bg-white border rounded-4 p-4 shadow-sm">
                    <h4 class="fw-bold mb-2">Academy Contact</h4>
                    <div class="contact-detail">
                        <b>Campus Address</b>
                        <p>Office No. 04, 1st Floor, Militia Market near RP Chowk, Parachinar, District Kurram, KPK</p>
                    </div>
                    <div class="contact-detail">
                        <b>Phone / WhatsApp</b>
                        <p><a href="tel:+923205008288">+92 320 5008288</a></p>
                        <p><a href="tel:+92512228123">051 2228123</a></p>
                    </div>
                    <div class="contact-detail">
                        <b>Email</b>
                        <p><a href="mailto:professionalyouthacademy@gmail.com">professionalyouthacademy@gmail.com</a></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="bg-white border rounded-4 p-4 p-md-5 shadow-sm">
                    <h4 class="fw-bold mb-4">Send a Message</h4>
                    <form method="POST" action="{{ route('contact.store') }}" novalidate>
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Your Name *</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email *</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Subject</label>
                                <input type="text" name="subject" value="{{ old('subject') }}" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Message *</label>
                                <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                                @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <button class="btn btn-emerald btn-lg mt-4">
                            Send Message <i class="bi bi-send ms-1"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection