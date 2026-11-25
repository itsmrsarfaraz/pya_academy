<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Home') | Professional Youth Academy</title>
    <meta name="description" content="@yield('meta_description', 'Professional diploma and technical skills training at Professional Youth Academy, Parachinar.')">
    @include('partials.favicons')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark site-nav sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <img src="{{ asset('images/logo-white.png') }}" width="44" height="44" class="object-fit-contain" alt="Professional Youth Academy logo">
            <span>Professional Youth Academy</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('diplomas.*') ? 'active' : '' }}" href="{{ route('diplomas.index') }}">Diplomas</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('achievements') ? 'active' : '' }}" href="{{ route('achievements') }}">Achievements</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('consultancy') ? 'active' : '' }}" href="{{ route('consultancy') }}">Consultancy</a></li>
                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                    <a class="btn btn-gold btn-sm px-3 py-2" href="{{ route('enroll.create') }}">
                        Apply Now <i class="bi bi-arrow-right-short"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    @if(session('success'))
        <div class="container mt-4">
            <div class="alert alert-success border-0 shadow-sm rounded-3 d-flex align-items-center gap-2">
                <i class="bi bi-check-circle-fill fs-5"></i>
                <div>{{ session('success') }}</div>
            </div>
        </div>
    @endif
    @if($errors->any())
        <div class="container mt-4">
            <div class="alert alert-danger border-0 shadow-sm rounded-3">
                <strong>Please correct the following:</strong>
                <ul class="mb-0 mt-1">@foreach($errors->all() as $error)<li>{{$error }}</li>@endforeach</ul>
            </div>
        </div>
    @endif
    @yield('content')
</main>

<footer class="footer mt-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-5">
                <img src="{{ asset('images/logo-white.png') }}" width="130" class="mb-3" alt="Professional Youth Academy logo">
                <h4 class="fw-bold">Professional Youth Academy</h4>
                <p class="mb-0 pe-lg-4">Empowering youth through internationally recognized certifications, practical IT mastery, and dedicated career mentorship in Parachinar.</p>
            </div>
            <div class="col-6 col-lg-3">
                <h6 class="text-uppercase small fw-bold letter-spacing-1 mb-3">Quick Links</h6>
                <a href="{{ route('diplomas.index') }}" class="d-block">Diploma Programs</a>
                <a href="{{ route('achievements') }}" class="d-block">Student Achievements</a>
                <a href="{{ route('about') }}" class="d-block">About the Academy</a>
                <a href="{{ route('enroll.create') }}" class="d-block">Online Admission</a>
                <a href="{{ route('contact') }}" class="d-block">Contact Campus</a>
            </div>
            <div class="col-6 col-lg-4">
                <h6 class="text-uppercase small fw-bold mb-3">Campus &amp; Admissions</h6>
                <p class="small mb-2"><i class="bi bi-geo-alt text-gold me-1"></i> Office No. 04, 1st Floor, Militia Market near RP Chowk, Parachinar, District Kurram, KPK</p>
                <a class="footer-contact-link small" href="tel:+923205008288"><i class="bi bi-telephone text-gold me-1"></i> +92 320 5008288</a>
                <a class="footer-contact-link small" href="tel:+92512228123"><i class="bi bi-telephone text-gold me-1"></i> 051 2228123</a>
                <a class="footer-contact-link small mt-1" href="mailto:professionalyouthacademy@gmail.com"><i class="bi bi-envelope text-gold me-1"></i> professionalyouthacademy@gmail.com</a>
            </div>
        </div>
        <hr class="border-secondary opacity-25 my-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small gap-2">
            <div>© {{ date('Y') }} Professional Youth Academy. All rights reserved.</div>
            <div>Designed &amp; Engineered by <a href="https://craftingcolons.com" target="_blank" rel="noopener" class="text-gold fw-semibold">Crafting Colons</a></div>
        </div>
    </div>
</footer>
@include('partials.whatsapp-float')
</body>
</html>