@extends('layouts.public')
@section('title', 'About')
@section('meta_description', 'Learn about Professional Youth Academy, our mission, and our leadership.')
@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow"><i class="bi bi-building"></i> ABOUT THE ACADEMY</span>
        <h1>Practical education built for real careers</h1>
        <p>Equipping students with industry-relevant skills, recognized diplomas, and clear guidance from enrollment to employment.</p>
    </div>
</section>

<section class="section-pad">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <span class="eyebrow-dark">OUR MISSION</span>
                <h2 class="fw-bold mb-3">Bridging ambition and employable skills</h2>
                <p class="text-muted">Professional Youth Academy prepares learners for workplace demands through structured coursework, hands-on practice, and transparent academic standards.</p>
                <p class="text-muted">Whether advancing in health and safety, computing, quality assurance, or technical trades, students gain practical competence backed by clear credential pathways.</p>
                <div class="row g-3 mt-3">
                    <div class="col-sm-6">
                        <div class="p-3 bg-white border rounded-3 h-100 shadow-sm">
                            <i class="bi bi-check2-circle text-gold fs-5"></i>
                            <div class="fw-bold text-primary-brand mt-1">Structured Syllabi</div>
                            <div class="small text-muted">Step-by-step modules aligned with exam boards and employers.</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-white border rounded-3 h-100 shadow-sm">
                            <i class="bi bi-people-fill text-gold fs-5"></i>
                            <div class="fw-bold text-primary-brand mt-1">Dedicated Mentorship</div>
                            <div class="small text-muted">Direct instructor support and admissions counseling.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-panel">
                    <img src="{{ asset('images/logo-dark.png') }}" alt="Professional Youth Academy emblem">
                    <h3>Professional Youth Academy</h3>
                    <p class="text-white-50 mb-4">Learn · Grow · Succeed</p>
                    <a href="{{ route('diplomas.index') }}" class="btn btn-gold">View Diplomas</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="ceo-message" class="section-pad pt-0">
    <div class="container">
        <div class="section-heading">
            <span class="eyebrow-dark">LEADERSHIP</span>
            <h2>Message from the CEO</h2>
            <p>Words of guidance and vision for students, families, and aspiring professionals.</p>
        </div>
        <div class="row g-4 g-lg-5 align-items-start">
            <div class="col-lg-4 text-center">
                <img src="{{ asset('images/ceo-message.jpeg') }}" class="ceo-home-image" alt="Sayed Anwar Ali, Chief Executive Officer of Professional Youth Academy">
                <div class="mt-3 small text-muted">Sayed Anwar Ali · Founder &amp; CEO</div>
            </div>
            <div class="col-lg-8">
                <div class="ceo-message-copy">
                    <blockquote class="ceo-quote">“Dear Students, Parents, and Well-Wishers, Assalam-o-Alaikum.”</blockquote>
                    <p>It is both an honor and a profound responsibility to welcome you to <strong>Professional Youth Academy</strong>. When we established this institution, our vision was clear: to create a center of excellence where young people are equipped not merely with theoretical notes, but with practical competence, ethical character, confidence, and market-ready skills.</p>
                    <p>In today’s fast-changing world, opportunities belong to those who continuously learn, adapt, and apply their knowledge with discipline. Whether a student chooses information technology, health and safety, quality control, technical trades, or professional development, true education must open doors to meaningful livelihood and service to society.</p>
                    <p>At Professional Youth Academy, we are committed to maintaining a disciplined, respectful, and encouraging learning environment. Our aim is to guide every learner step by step—helping them discover their strengths, overcome challenges, and build a future they and their families can be proud of.</p>
                    <p>To our students, I say: believe in your potential, value your time, stay honest in your effort, and never stop learning. Your hard work today is the foundation of your independence tomorrow.</p>
                    <p class="mb-0">To parents and guardians, thank you for placing your trust in us. Together, as educators, families, and mentors, we can shape a capable, resilient, and self-reliant generation.</p>
                    <div class="ceo-signature">
                        <h3>Sayed Anwar Ali</h3>
                        <p>Chief Executive Officer</p>
                        <p>Professional Youth Academy</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection