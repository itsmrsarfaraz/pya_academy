<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Admin') | Professional Youth Academy</title>
    @include('partials.favicons')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-body">
    <nav class="navbar navbar-dark site-nav">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
                <span class="brand-mark">P</span> PYA <span class="text-white-50 fw-normal">/ Management</span>
            </a>
            <div class="d-flex align-items-center gap-3 text-white">
                <span class="small"><i class="bi bi-person-circle text-gold me-1"></i> {{ session('admin_name') }}</span>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="btn btn-sm btn-gold">Sign out</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <aside class="col-lg-2 admin-sidebar p-3">
                <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="bi bi-grid"></i> Dashboard</a>
                <a class="{{ request()->routeIs('admin.diplomas.*') ? 'active' : '' }}" href="{{ route('admin.diplomas.index') }}"><i class="bi bi-mortarboard"></i> Diplomas</a>
                <a class="{{ request()->routeIs('admin.enrollments.*') ? 'active' : '' }}" href="{{ route('admin.enrollments.index') }}"><i class="bi bi-person-check"></i> Enrollments</a>
                <a class="{{ request()->routeIs('admin.achievements.*') ? 'active' : '' }}" href="{{ route('admin.achievements.index') }}"><i class="bi bi-award"></i> Achievements</a>
                <a class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}" href="{{ route('admin.messages.index') }}"><i class="bi bi-envelope"></i> Messages</a>
                <a class="nav-link {{ request()->routeIs('admin.consultancy.*') ? 'active' : '' }}" href="{{ route('admin.consultancy.index') }}">Consultancy</a>
                <a class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}" href="{{ route('admin.profile') }}"><i class="bi bi-shield-lock"></i> Security</a>
                <a href="{{ route('home') }}" target="_blank"><i class="bi bi-box-arrow-up-right"></i> Live Website</a>
            </aside>
            <section class="col-lg-10 p-4">
                @if(session('success'))<div class="alert alert-success border-0 shadow-sm">{{ session('success') }}</div>@endif
                @if(session('error'))<div class="alert alert-danger border-0 shadow-sm">{{ session('error') }}</div>@endif
                @if($errors->any())
                    <div class="alert alert-danger border-0 shadow-sm">
                        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                    </div>
                @endif
                @yield('content')
            </section>
        </div>
    </div>
</body>
</html>