<!doctype html><html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title','Admin') | Academy</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/academy.css') }}" rel="stylesheet">@vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body class="admin-body">
    <nav class="navbar navbar-dark site-nav">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">Academy <span class="text-white-50 fw-normal">/ Admin</span></a>
            <div class="d-flex align-items-center gap-3 text-white">
                <span>{{ session('admin_name') }}</span>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="btn btn-sm btn-outline-warning">Sign out</button>
                </form>
            </div>
        </div>
    </nav>
<div class="container-fluid">
    <div class="row">
        <aside class="col-lg-2 admin-sidebar p-3">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.diplomas.index') }}">Diplomas</a>
            <a href="{{ route('admin.enrollments.index') }}">Enrollments</a>
            <a href="{{ route('admin.achievements.index') }}">Achievements</a>
            <a href="{{ route('admin.messages.index') }}">Messages</a><a href="{{ route('admin.profile') }}">Profile & Security</a>
            <a href="{{ route('home') }}" target="_blank">View Website ↗</a>
        </aside>
        <section class="col-lg-10 p-4">@if(session('success'))<div class="alert alert-success">
            {{ session('success') }}</div>@endif @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}
                </div>
                @endif @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">@foreach($errors->all() as $e)
                        <li>{{ $e }}</li>@endforeach</ul>
                    </div>
                    @endif @yield('content')
                </section>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
