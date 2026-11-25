@extends('layouts.public')
@section('title', 'Enroll')
@section('meta_description', 'Submit an online admission inquiry for Professional Youth Academy.')
@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow"><i class="bi bi-pencil-square"></i> ADMISSIONS</span>
        <h1>Student Enrollment</h1>
        <p>Complete the form below. Our admissions team will review your inquiry and contact you with next steps.</p>
    </div>
</section>

<section class="section-pad">
    <div class="container">
        <div class="form-shell">
            <form method="POST" action="{{ route('enroll.store') }}" novalidate>
                @csrf
                <h4 class="fw-bold mb-3">1. Program Selection</h4>
                <div class="mb-4">
                    <label class="form-label">Select Diploma *</label>
                    <select name="diploma_id" class="form-select @error('diploma_id') is-invalid @enderror" required>
                        <option value="">Choose a diploma program...</option>
                        @foreach($diplomas as $d)
                            <option value="{{ $d->id }}" @selected((string) old('diploma_id', $selectedDiploma?->id) === (string) $d->id)>
                                {{ $d->title }} — {{ $d->duration }} ({{ $d->currency }} {{ number_format($d->fee) }})
                            </option>
                        @endforeach
                    </select>
                    @error('diploma_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <h4 class="fw-bold mb-3">2. Applicant Details</h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Full Name *</label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control @error('full_name') is-invalid @enderror" required>
                        @error('full_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Father / Guardian Name</label>
                        <input type="text" name="father_name" value="{{ old('father_name') }}" class="form-control">
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
                        <label class="form-label">CNIC / ID Number</label>
                        <input type="text" name="cnic" value="{{ old('cnic') }}" class="form-control" placeholder="XXXXX-XXXXXXX-X">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Highest Qualification</label>
                        <input type="text" name="qualification" value="{{ old('qualification') }}" class="form-control" placeholder="e.g., Matric, FA/FSc, BS">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Residential Address</label>
                        <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Additional Notes</label>
                        <textarea name="notes" rows="3" class="form-control" placeholder="Preferred batch timing, questions, or background...">{{ old('notes') }}</textarea>
                    </div>
                </div>

                <button class="btn btn-gold btn-lg w-100 mt-4">
                    Submit Application <i class="bi bi-send-check ms-1"></i>
                </button>
                <p class="small text-muted text-center mt-3 mb-0">No payment is collected online. Admission confirmation is handled directly by the academy.</p>
            </form>
        </div>
    </div>
</section>
@endsection