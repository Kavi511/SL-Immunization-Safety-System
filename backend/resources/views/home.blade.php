
@extends('layouts.master')

@section('title', 'Home -SLVSN ')

@section('content')
<style>
/* Remove diagonal stripe pattern from hero on home page */
.hero-section::before { background: none !important; }
</style>
<section class="hero-section" style="background-image: url('{{ asset('img/Pic01.jpg') }}'); background-size: cover; background-position: center; position: relative; margin-top:0;">
    <div style="position:absolute; inset:0; background: radial-gradient(ellipse at top left, rgba(30,58,138,.55), rgba(0,0,0,.55));"></div>
    <div class="hero-content" style="position: relative; z-index: 1; color: #eef2ff;">
        <h1 style="color:#ffffff; font-size: 2.1rem; font-weight: 800; letter-spacing:.3px; margin-bottom: .75rem; max-width: 1000px;">
            Utilizing Big Data Analytics to Monitor and Enhance Vaccine Safety and Effectiveness Across Sri Lanka's Population
        </h1>
        <p style="max-width: 1000px; color:#e5e7eb; font-size: .95rem; margin-bottom: .25rem;">
            The Sri Lankan Vaccine Safety Network (SLVSN) uses Big Data Analytics to monitor and enhance vaccine safety and effectiveness across the country. It provides real-time insights, identifies potential issues early, and supports public health efforts by optimizing vaccination processes and ensuring vaccines meet safety standards.
        </p>
        
    </div>
</section>

<div class="features" style="grid-template-columns: repeat(4,minmax(0,1fr));">
    <div class="feature-card">
        <div class="feature-icon">
            <!-- Bar chart icon (SVG) -->
            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <rect x="3" y="10" width="3" height="10" rx="1" fill="white"/>
                <rect x="9" y="6" width="3" height="14" rx="1" fill="white" opacity="0.9"/>
                <rect x="15" y="3" width="3" height="17" rx="1" fill="white" opacity="0.8"/>
                <path d="M2 21.5h20" stroke="white" stroke-width="1.5" stroke-linecap="round" opacity="0.8"/>
            </svg>
        </div>
        <h3>Research & Data</h3>
        <p>Explore studies and dashboards</p>
    </div>
    <div class="feature-card">
        <div class="feature-icon">
            <!-- Stethoscope icon (SVG) -->
            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M6 3v4a4 4 0 1 0 8 0V3" stroke="#0f172a" stroke-width="0"/>
                <path d="M6 3v4a4 4 0 1 0 8 0V3" stroke="white" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M10 11v3a5 5 0 0 0 10 0v-1" stroke="white" stroke-width="1.8" stroke-linecap="round"/>
                <circle cx="20" cy="13" r="2" fill="white"/>
            </svg>
        </div>
        <h3>Healthcare</h3>
        <p>Medical expertise</p>
    </div>
    <div class="feature-card">
        <div class="feature-icon">
            <!-- Shield with check icon (SVG) -->
            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M12 3l7 3v5c0 5.25-3.5 8.75-7 10-3.5-1.25-7-4.75-7-10V6l7-3z" stroke="white" stroke-width="1.6" fill="none"/>
                <path d="M9 12.5l2 2 4-4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <h3>Vaccine Info</h3>
        <p>Trusted information</p>
    </div>
    <div class="feature-card">
        <div class="feature-icon">
            <!-- Network/people icon (SVG) -->
            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <circle cx="6" cy="8" r="3" fill="white"/>
                <circle cx="18" cy="8" r="3" fill="white" opacity="0.9"/>
                <circle cx="12" cy="18" r="3" fill="white" opacity="0.85"/>
                <path d="M6 11v3l6 2 6-2v-3" stroke="white" stroke-width="1.4" stroke-linecap="round" opacity="0.85"/>
            </svg>
        </div>
        <h3>Community</h3>
        <p>Engage & collaborate</p>
    </div>
</div>

<section
    style="
        max-width: 1350px;
        margin: 2rem auto 3rem auto;
        padding: 1.75rem 2rem;
        border-radius: 18px;
        background: linear-gradient(90deg, rgba(219,234,254,0.9) 0%, rgba(204,251,241,0.9) 100%);
        box-shadow: 0 10px 30px rgba(15,23,42,.12);
    "
>
    <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 2rem; align-items:start;">
        <div>
            <h3 style="margin:0 0 .75rem 0; font-size: 1.6rem; font-weight: 700; color:#0f172a;">Our Mission</h3>
            <p style="margin:0; color:#111827; line-height:1.7; font-size:1rem;">
                We explore Big Data and visualization to improve the vaccination process in Sri Lanka with
                evidence‑driven insights and transparent reporting.
            </p>
        </div>
        <div>
            <h3 style="margin:0 0 .75rem 0; font-size: 1.6rem; font-weight: 700; color:#0f172a;">Our Impact</h3>
            <p style="margin:0; color:#111827; line-height:1.7; font-size:1rem;">
                At population scale, advanced analytics help monitor safety signals, inform policy,
                and strengthen public health outcomes.
            </p>
        </div>
    </div>

    <style>
        @media (max-width: 768px) {
            section[style*="grid"] > div { grid-template-columns: 1fr !important; }
        }
    </style>
</section>
@endsection
