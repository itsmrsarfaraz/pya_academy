@extends('layouts.public')
@section('title','Student Enrollment')
@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow">APPLICATION FORM</span>
        <h1>Start your enrollment.</h1>
        <p>Submit your details. Our admissions team will contact you to discuss the next steps.</p>
    </div>
</section>
<section class="section-pad">
    <div class="container">
        <div class="form-shell">
            <form method="POST" action="{{ route('enroll.store') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Select diploma *</label>
                        <select name="diploma_id" class="form-select" required>
                            <option value="">Choose a diploma</option>
                            @foreach($diplomas as $d)
                            <option value="{{ $d->id }}" @selected(old('diploma_id',optional($diploma)->id)==$d->id)>{{ $d->title }} — {{ $d->currency }} {{ number_format($d->fee) }}</option>
                            @endforeach</select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Full name *</label>
                            <input name="full_name" class="form-control" value="{{ old('full_name') }}" required maxlength="150">
                        </div><div class="col-md-6">
                            <label class="form-label">Father's name</label>
                            <input name="father_name" class="form-control" value="{{ old('father_name') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone / WhatsApp *</label>
                            <input name="phone" class="form-control" value="{{ old('phone') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div><div class="col-md-6">
                            <label class="form-label">CNIC (optional)</label>
                            <input name="cnic" class="form-control" value="{{ old('cnic') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last education</label>
                            <input name="education" class="form-control" value="{{ old('education') }}" placeholder="e.g. Intermediate">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="3">{{ old('address') }}</textarea>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" required id="consent">
                                <label class="form-check-label small" for="consent">
                                    I agree that Academy may contact me about this application.
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-warning btn-lg">Submit application</button>
                            <p class="small text-muted mt-3 mb-0">
                                No online payment is collected. Admission is confirmed only after the academy contacts and approves your application.
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
