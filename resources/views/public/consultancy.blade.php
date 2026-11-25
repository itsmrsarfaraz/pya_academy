@extends('layouts.public')
@section('title', 'Consultancy')
@section('meta_description', 'Career counseling, admissions guidance, and institutional training consultancy at Professional Youth Academy.')
@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow"><i class="bi bi-compass-fill"></i> ADVISORY &amp; GUIDANCE</span>
        <h1>Career &amp; Academic Consultancy</h1>
        <p>Personalized guidance on selecting the right diploma, overseas/local career pathways, and institutional training.</p>
    </div>
</section>

<section class="section-pad">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="stat-item">
                    <i class="bi bi-signpost-split-fill"></i>
                    <h4 class="fw-bold mb-1">Career Pathway Counseling</h4>
                    <p class="text-muted small mb-0">Match your background and goals with HSE, IT, quality control, or technical trades.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item">
                    <i class="bi bi-file-earmark-check-fill"></i>
                    <h4 class="fw-bold mb-1">Credential &amp; Exam Guidance</h4>
                    <p class="text-muted small mb-0">Clear information on course requirements, durations, and awarding body standards.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item">
                    <i class="bi bi-buildings-fill"></i>
                    <h4 class="fw-bold mb-1">Institutional &amp; Group Advisory</h4>
                    <p class="text-muted small mb-0">Tailored training and skill-development planning for schools, teams, and organizations.</p>
                </div>
            </div>
        </div>

        <div class="row g-5 align-items-start">
            <div class="col-lg-5">
                <div class="bg-white border rounded-4 p-4 shadow-sm">
                    <span class="eyebrow-dark">HOW IT WORKS</span>
                    <h4 class="fw-bold mt-1 mb-3">Book a Consultation</h4>
                    <p class="text-muted small">Unsure which diploma fits your current qualification or job target? Share your goals in the form and our team will follow up by phone or email.</p>
                    <div class="contact-detail">
                        <b>Walk-In Counseling</b>
                        <p>Office No. 04, 1st Floor, Militia Market near RP Chowk, Parachinar, District Kurram, KPK</p>
                    </div>
                    <div class="contact-detail">
                        <b>Direct Phone / WhatsApp</b>
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
                    <h4 class="fw-bold mb-4">Request Consultancy</h4>
                    <form method="POST" action="{{ route('consultancy.store') }}" novalidate>
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name *</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone / WhatsApp *</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="+92 3XX XXXXXXX" required>
                                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Consultancy Topic *</label>
                                <select name="topic" class="form-select @error('topic') is-invalid @enderror" required>
                                    <option value="">Select topic...</option>
                                    <option value="Career & Diploma Selection" @selected(old('topic') === 'Career & Diploma Selection')>Career &amp; Diploma Selection</option>
                                    <option value="HSE / Safety Certification Guidance" @selected(old('topic') === 'HSE / Safety Certification Guidance')>HSE / Safety Certification Guidance</option>
                                    <option value="IT & Technical Skills Roadmap" @selected(old('topic') === 'IT & Technical Skills Roadmap')>IT &amp; Technical Skills Roadmap</option>
                                    <option value="Institutional / Group Training" @selected(old('topic') === 'Institutional / Group Training')>Institutional / Group Training</option>
                                </select>
                                @error('topic')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Your Background &amp; Questions *</label>
                                <textarea name="details" rows="5" class="form-control @error('details') is-invalid @enderror" placeholder="Tell us your qualification, work/study goals, or any questions..." required>{{ old('details') }}</textarea>
                                @error('details')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <button class="btn btn-gold btn-lg mt-4">
                            Submit Consultancy Request <i class="bi bi-arrow-right ms-1"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection