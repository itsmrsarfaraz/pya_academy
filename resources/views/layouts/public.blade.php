<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Home') | Professional Youth Academy</title>
    <meta name="description" content="@yield('meta_description', 'Professional diploma and technical skills training at Professional Youth Academy, Parachinar.')">
    @include('partials.favicons')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/academy.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark site-nav sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/logo-white.png') }}" width="50px" alt="Professional Youth Academy logo">
            <span>Professional Youth Academy</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('diplomas.index') }}">Diplomas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('achievements') }}">Achievements</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                <li class="nav-item"><a class="btn btn-outline-warning ms-lg-2" href="{{ route('enroll.create') }}">Apply Now</a></li>
            </ul>
        </div>
    </div>
</nav>
<main>
    @if(session('success'))
        <div class="container mt-3"><div class="alert alert-success">{{ session('success') }}</div></div>
    @endif
    @if($errors->any())
        <div class="container mt-3">
            <div class="alert alert-danger">
                <strong>Please correct the following:</strong>
                <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        </div>
    @endif
    @yield('content')
</main>
<footer class="footer mt-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-5">
                <img src="{{ asset('images/logo-white.png') }}" width="150" alt="Professional Youth Academy logo">
                <h4 class="text-white">Professional Youth Academy</h4>
                <p class="text-white-50">Empowering youth through professional skills &amp; global certifications. Unlock your potential with skills.</p>
            </div>
            <div class="col-md-3">
                <h6 class="text-white">Explore</h6>
                <a href="{{ route('diplomas.index') }}" class="text-white-50 d-block">Diplomas</a>
                <a href="{{ route('achievements') }}" class="text-white-50 d-block">Achievements</a>
                <a href="{{ route('about') }}" class="text-white-50 d-block">About us</a>
                <a href="{{ route('contact') }}" class="text-white-50 d-block">Contact</a>
            </div>
            <div class="col-md-4">
                <h6 class="text-white">Contact</h6>
                <p class="text-white-50 mb-2">Office No. 04, 1st Floor, Militia Market near RP Chowk, Parachinar, District Kurram, KPK, Pakistan</p>
                <p class="text-white-50 mb-1">Phone / WhatsApp:</p>
                <a class="footer-contact-link" href="tel:+923205008288">+92 320 5008288</a>
                <a class="footer-contact-link" href="tel:+92512228123">051 2228123</a>
                <p class="text-white-50 mt-2 mb-1">Email:</p>
                <a class="footer-contact-link" href="mailto:professionalyouthacademy@gmail.com">professionalyouthacademy@gmail.com</a>
            </div>
        </div>
        <hr class="border-secondary">
        <div class="text-white-50 small">© {{ date('Y') }} Professional Youth Academy. All rights reserved.</div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
