@extends('layouts.public')
@section('title', 'Diplomas')
@section('meta_description', 'Browse diploma and certification programs at Professional Youth Academy.')
@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow"><i class="bi bi-journal-bookmark-fill"></i> PROGRAMS</span>
        <h1>Diplomas &amp; Certifications</h1>
        <p>Filter programs by category or search by keyword to find the right course for your goals.</p>
    </div>
</section>

<section class="section-pad">
    <div class="container">
        <form class="row g-3 filter-bar mb-5" method="GET" action="{{ route('diplomas.index') }}">
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                    <input type="text" name="q" value="{{ request('q') }}" class="form-control border-start-0 ps-0" placeholder="Search diplomas...">
                </div>
            </div>
            <div class="col-md-4">
                <select name="category" class="form-select">
                    <option value="">All Categories</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->slug }}" @selected(request('category') === $c->slug)>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 d-grid">
                <button class="btn btn-emerald">Apply Filter</button>
            </div>
        </form>

        <div class="row g-4">
            @forelse($diplomas as $d)
                <div class="col-md-6 col-lg-4">
                    <div class="course-card h-100 position-relative">
                        @if($d->image)
                            <img src="{{ asset('storage/'.$d->image) }}" class="course-image" alt="{{ $d->title }}">
                        @else
                            <div class="course-placeholder"><span>{{ strtoupper(substr($d->title, 0, 1)) }}</span></div>
                        @endif
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
                                <span class="tag">{{ $d->category?->name }}</span>
                                <span class="small text-muted"><i class="bi bi-clock me-1"></i>{{ $d->duration }}</span>
                            </div>
                            <h5 class="fw-bold mt-1">{{ $d->title }}</h5>
                            <p class="text-muted small flex-grow-1">{{ $d->short_description }}</p>
                            <div class="d-flex justify-content-between align-items-center border-top pt-3 mt-2">
                                <span class="font-mono fw-bold text-primary-brand">{{ $d->currency }} {{ number_format($d->fee) }}</span>
                                <span class="small fw-semibold text-gold">View Details <i class="bi bi-arrow-right"></i></span>
                            </div>
                            <a class="stretched-link" href="{{ route('diplomas.show', $d) }}" aria-label="View {{ $d->title }}"></a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-folder-x fs-1 text-muted d-block mb-2"></i>
                    <p class="text-muted mb-3">No matching diplomas found.</p>
                    <a href="{{ route('diplomas.index') }}" class="btn btn-outline-emerald btn-sm">Reset Filters</a>
                </div>
            @endforelse
        </div>

        <div class="mt-5 d-flex justify-content-center">{{ $diplomas->links() }}</div>
    </div>
</section>
@endsection