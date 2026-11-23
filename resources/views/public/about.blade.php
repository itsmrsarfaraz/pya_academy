@extends('layouts.public')
@section('title', 'About Us')
@section('meta_description', 'Professional Youth Academy in Parachinar, District Kurram brings NEBOSH, OSHA, IOSH, IT training and career mentorship to local youth.')
@section('content')
<section class="page-hero"><div class="container">
    <span class="eyebrow">PARACHINAR · DISTRICT KURRAM · KPK, PAKISTAN</span>
    <h1>Empowering youth through professional skills &amp; global certifications.</h1>
    <p>World-class professional certifications, digital literacy and career mentorship, delivered locally.</p>
</div></section>

<section class="section-pad"><div class="container">
    <div class="row g-5 align-items-center">
        <div class="col-lg-7">
            <span class="eyebrow-dark">ABOUT US</span><h2>Quality training, right here in Parachinar</h2>
            <p class="text-muted">Located in the heart of Parachinar, District Kurram, <strong>Professional Youth Academy</strong> was founded with a clear mission: to bring world-class professional certifications, digital literacy, and career mentorship directly to our local youth.</p>
            <p class="text-muted">We believe that talent is everywhere, but opportunity requires the right guidance and credentials. Our experienced instructors combine theoretical knowledge with real-world industry practices so every student graduates confident and job-ready.</p>
            <ul class="list-unstyled mt-4">
                <li class="mb-3"><strong class="text-navy">Accessible Quality in Parachinar:</strong> <span class="text-muted">Access NEBOSH, OSHA, IOSH, and IT training locally without traveling to major cities.</span></li>
                <li class="mb-3"><strong class="text-navy">Supportive Learning Environment:</strong> <span class="text-muted">Small batch sizes ensuring personalized attention and mentorship for every student.</span></li>
                <li class="mb-3"><strong class="text-navy">End-to-End Career Support:</strong> <span class="text-muted">From enrollment to certification and job interview preparation.</span></li>
            </ul>
        </div>
        <div class="col-lg-5"><div class="about-panel about-logo-panel">
            <img src="{{ asset('images/logo.png') }}" alt="Professional Youth Academy logo">
            <h3>Unlock your potential with skills.</h3>
        </div></div>
    </div>
</div></section>

<section class="section-pad stats-band"><div class="container">
    <div class="section-heading"><span class="eyebrow-dark">COURSES &amp; PROGRAMS</span><h2>What we teach</h2></div>
    <div class="admin-panel table-responsive bg-white">
        <table class="table program-table align-middle mb-0">
            <thead><tr><th style="width:30%">Program</th><th>Key Focus Areas</th></tr></thead>
            <tbody>
                <tr><td class="fw-bold">HSE &amp; Safety Management</td><td>NEBOSH International General Certificate (IGC), OSHA 30-Hour General Industry &amp; Construction, IOSH Managing Safely &amp; Risk Assessment.</td></tr>
                <tr><td class="fw-bold">IT &amp; Digital Skills</td><td>Office Automation &amp; Productivity Suites, Digital Marketing, Freelancing &amp; E-Commerce Basics, Practical Hands-On Lab Sessions.</td></tr>
                <tr><td class="fw-bold">Academic &amp; Career Coaching</td><td>Entry Test &amp; Competitive Exam Preparation, CV Writing, Interview Skills, Spoken English &amp; Professional Communication.</td></tr>
                <tr><td class="fw-bold">Youth Consultancy</td><td>Personalized Career &amp; Degree Roadmaps, Scholarship &amp; University Application Guidance, National &amp; International Job Market Insights.</td></tr>
            </tbody>
        </table>
    </div>
    <div class="alert alert-info mt-4 mb-0">Accreditation and awarding-body recognition vary by program. Please review each diploma's listed awarding institution and approval details before enrolling.</div>
</div></section>

<section class="section-pad ceo-message-section" id="ceo-message"><div class="container">
    <div class="section-heading"><span class="eyebrow-dark">LEARN · GROW · SUCCEED</span><h2>A Message from Our CEO</h2></div>
    <div class="row justify-content-center"><div class="col-lg-9"><div class="ceo-message-copy">
        <blockquote class="ceo-quote">“Our youth are our greatest strength. When given the right skills, mentorship, and global certifications, there is no limit to what they can achieve.”</blockquote>
        <p>Welcome to <strong>Professional Youth Academy</strong>. When we established this institution in Parachinar, our vision was simple yet ambitious: to ensure that talented young men and women in District Kurram have direct access to international-standard training in HSE, Information Technology, and career development without having to leave their hometown.</p>
        <p>Today, we take pride in seeing our students step into rewarding careers both locally and abroad. I invite you to join us, invest in your future, and become part of a generation that leads with knowledge, integrity, and skill.</p>
        <div class="ceo-signature"><h3>Sayed Anwar Ali</h3><p>Founder &amp; CEO, Professional Youth Academy</p></div>
    </div></div></div>
</div></section>

<section class="section-pad"><div class="container">
    <div class="row g-4 align-items-start">
        <div class="col-lg-5">
            <span class="eyebrow-dark">CONTACT &amp; LOCATION</span><h2>Visit our campus</h2>
        </div>
        <div class="col-lg-7">
            <div class="contact-detail"><b>Campus Address</b><p>Office No. 04, 1st Floor, Militia Market near RP Chowk, Parachinar, District Kurram, KPK, Pakistan</p></div>
            <div class="contact-detail"><b>Phone</b><p><a href="tel:+923205008288">+92 320 5008288</a> | <a href="tel:+92512228123">051 2228123</a></p></div>
            <div class="contact-detail"><b>Email</b><p><a href="mailto:professionalyouthacademy@gmail.com">professionalyouthacademy@gmail.com</a></p></div>
        </div>
    </div>
</div></section>
@endsection
