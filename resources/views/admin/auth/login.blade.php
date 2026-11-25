<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Sign In | Professional Youth Academy</title>
    @include('partials.favicons')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="login-page">
    <div class="login-card">
        <a class="navbar-brand fw-bold text-primary-brand d-inline-flex align-items-center" href="{{ route('home') }}">
            <span class="brand-mark">P</span> Professional Youth Academy
        </a>
        <h2 class="mt-4 fw-bold">Admin Portal</h2>
        <p class="text-muted small">Sign in to manage diplomas, admissions, and student records.</p>
        @if($errors->any())<div class="alert alert-danger small">{{ $errors->first() }}</div>@endif
        @if(session('error'))<div class="alert alert-danger small">{{ session('error') }}</div>@endif
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
            </div>
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-emerald btn-lg w-100">Sign in</button>
        </form>
        <p class="small text-muted mt-4 mb-0 text-center">Authorized academy personnel only.</p>
    </div>
</body>
</html>