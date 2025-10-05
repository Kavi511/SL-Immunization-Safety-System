
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=.0">
    <title>@yield('title', 'Sri Lankan Vaccine Safety Network')</title>
    <style>
        /* Global medical-themed color palette */
        :root {
            --primary-50: #eff6ff;
            --primary-100: #dbeafe;
            --primary-300: #93c5fd;
            --primary-500: #3b82f6; /* medical blue */
            --primary-600: #2563eb;
            --teal-100: #ccfbf1;
            --teal-300: #5eead4;
            --teal-500: #14b8a6; /* accent teal */
            --teal-600: #0d9488;
            --surface-50: #f8fafc;
            --surface-100: #f1f5f9;
            --surface-900: #0f172a; /* dark slate */
            --text-on-dark: #e2e8f0;
            --text-on-light: #0f172a;
        }
        /* Base styles */
   
        
        html, body { height: 100%; }
        body {
            font-family: Baskerville Old Face, sans-serif;
            margin: 0;                 /* remove default gaps */
            padding: 0;
            line-height: 1.5;
            display: flex;             /* enable sticky footer layout */
            flex-direction: column;
            min-height: 100vh;         /* full viewport height */
        }
        main { flex: 1 0 auto; }       /* push footer to the bottom when content is short */
        
        .header {
            background: rgba(79, 77, 77, 0.579); /* light glass header */
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 1rem 1.5rem;
            border-bottom: none;
            position: sticky;
            top: 0;
            z-index: 50;
            margin-bottom: 0;
        }
        
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1800px;
            margin: 0 auto;
        }
        
        .nav-links {
            display: flex;
            gap: 2rem;
        }
        .nav-links a {
            color: var(--text-on-light);
            text-decoration: none;
            font-weight: 500;
            position: relative;
            display: inline-flex;           /* vertical align like Register */
            align-items: center;
            height: 40px;                   /* same height as Register */
            padding: 0 .85rem;              /* horizontal spacing */
            border-radius: .5rem;           /* slight rounding to match glass look */
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background: var(--primary-300);
            bottom: 0;
            left: 0;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
        }

        .nav-links a:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        .brand-title {
            color: #111827; /* black text for brand */
            margin: 0;
            font-size: 3rem; /* bigger brand title */
            line-height: 1.2;
            font-weight: 900;
            letter-spacing: .5px;
        }

        .btn-primary-nav {
            color: #fff !important;
            background: linear-gradient(135deg, var(--primary-500) 0%, var(--primary-600) 100%);
            display: inline-flex;               /* align text vertically */
            align-items: center;                /* center text */
            justify-content: center;
            height: 40px;                       /* consistent height with header */
            padding: 0 1rem;                    /* horizontal padding only */
            border-radius: .75rem;              /* rounded pill */
            box-shadow: 0 6px 20px rgba(59,130,246,.35);
            transition: all .2s ease-in-out;
        }
        .btn-primary-nav:hover {
            background: linear-gradient(135deg, var(--primary-600) 0%, #1d4ed8 100%);
            transform: translateY(-1px);
            box-shadow: 0 10px 28px rgba(59,130,246,.45);
        }
        
        .logo-section {
            /* display: flex;
            align-items: center;
            gap: 1rem; */
        }
        
      
    
        .hero-section {
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.55) 0%, rgba(0,0,0,0.55) 100%),
                        url('/api/placeholder/1200/600') center/cover;
            padding: 6rem 2rem;
            color: var(--text-on-light);
            position: relative;
            overflow: hidden;
            margin-bottom: 10mm;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: repeating-linear-gradient(
                45deg,
                rgba(255,255,255,0.1),
                rgba(255,255,255,0.1) 10px,
                transparent 10px,
                transparent 20px
            );
        }
        
        .hero-content {
            max-width: 1300px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        
        .hero-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            max-width: 600px;
        }
        
        .features {
            display: grid;
            grid-template-columns: 1fr;
            gap: 3.5mm; 
            max-width: 1200px;
            margin: 3rem auto;
            padding: 0 1rem;
        }
        
        .feature-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5mm;  
            width: 100%;
        }
        
        .feature-card {
            text-align: center;
            padding: 0.8rem;
            background: linear-gradient(135deg, var(--primary-500) 0%, var(--teal-500) 100%);
            border-radius: 175px;
            transition: transform 0.3s ease;
            color: white;
        }
        
        .feature-card:hover {
            transform: translateY(-35px);
        }
        
        .feature-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 1rem;
            background: #00000076;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #091c2e;
            font-size: 1.5rem;
        }
        
        
        .info-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            max-width: 1350px;
            margin: 3rem auto;
            padding: 2rem 1rem;
            background: linear-gradient(135deg, var(--primary-100) 0%, var(--teal-100) 100%);
            border-radius: 8px;
            margin-top: 3.5mm;
        }
        .info-row {
            display: grid;
            grid-template-columns: 1fr 1fr;  
            gap: 3.5rem;
            padding: 1rem;
            background: #97afc8;
            border-radius: 4px;
        }
        
        .footer {
            /* Glass effect footer */
            background: rgba(61, 61, 61, 0.641);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-top: 1px solid rgba(15,23,42,0.08);
            box-shadow: 0 -10px 25px rgba(15, 23, 42, 0.08);
            color: #111827;
            padding: 2.5rem 0;
            margin-top: 3rem;
        }
        
        .footer-content {
            max-width: 800px;
            margin:  auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.2rem;
            padding: 0 1rem;
        }
        
        .footer a {
            color: white;
            text-decoration: none;
            transition: color 0.5s ease;
        }
        
        .footer a:hover {
            color: #000000;;
        }
        
        .search-box input {
            padding: 0.7rem 1rem;
            border: 1px solid #e3e8eb;
            border-radius: 4px;
            margin-right: 0.8rem;
        }
        
    .search-box button {
    padding: 0.7rem 1rem;
    background: #3498db;
    color: rgb(255, 255, 255);
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.search-box button:hover {
    background: #2980b9;  
    color: white;  
        }
   
        /* Add all other styles here */
    </style>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body>
    <header class="header">
        <nav class="nav">
            <div class="logo-section">
                {{-- <div> --}}
                {{-- <img src="{{asset('img/logo.png')}}" alt="" style="width: 4%;height=4% !important;"> --}}
                {{-- <svg viewBox="0 0 100 100" width="60" height="90">
                    <path d="M50 20 C 70 20, 80 40, 80 50 C 80 70, 60 80, 50 80 C 30 80, 20 70, 20 50 C 20 30, 30 20, 50 20" fill="none" stroke="white" stroke-width="2"/>
                </svg> --}}
                <h1 class="brand-title">Sri Lankan Vaccine Safety Network</h1>
                {{-- </div> --}}
                
                
            </div>
         
            <div class="nav-links">
                <a href="{{ url('/') }}">Home</a>
            
                <!-- Links visible only to logged-in users -->
                @auth
                    {{-- <a href="#about">About</a> --}}
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                    <a href="{{ url('/adverse_effects') }}">Report Adverse Events</a>
                    <a href="{{ url('/news') }}">News</a>
                @endauth
            
                <!-- Show Login and Register links for guests -->
                @guest
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}" class="btn-primary-nav">Register</a>
                @endguest
            
                <!-- Profile and Logout for logged-in users -->
                @auth
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
            
            {{-- <div class="search-box">
                <input type="search" placeholder="Search...">
                <button>Search</button>
            </div> --}}
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="footer">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
            <div class="row" style="display:grid; grid-template-columns: repeat(4, minmax(0,1fr)); gap: 2rem;">
                <!-- Brand / About -->
                <div>
                    <h4 style="margin:0; font-weight:700; color:#e5e7eb;">Sri Lankan Vaccine Safety Network</h4>
                    <p style="margin:.5rem 0 0 0; color:#cbd5e1; font-size:.9rem;">Leveraging Big Data Analytics to monitor and enhance vaccine safety and effectiveness across Sri Lanka.</p>
                    <p style="margin:.75rem 0 0 0; color:#94a3b8; font-size:.8rem;">© {{ date('Y') }} SLVSN · All Rights Reserved</p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h5 style="margin:0 0 .75rem 0; color:#e5e7eb;">Quick Links</h5>
                    <ul style="list-style:none; padding:0; margin:0; line-height:1.9;">
                        <li><a href="{{ url('/') }}" style="color:#cbd5e1; text-decoration:none;">Home</a></li>
                        @auth
                        <li><a href="{{ url('/dashboard') }}" style="color:#cbd5e1; text-decoration:none;">Dashboard</a></li>
                        <li><a href="{{ url('/adverse_effects') }}" style="color:#cbd5e1; text-decoration:none;">Report Adverse Events</a></li>
                        <li><a href="{{ route('profile.edit') }}" style="color:#cbd5e1; text-decoration:none;">Profile</a></li>
                        @endauth
                        @guest
                        <li><a href="{{ route('login') }}" style="color:#cbd5e1; text-decoration:none;">Login</a></li>
                        <li><a href="{{ route('register') }}" style="color:#cbd5e1; text-decoration:none;">Register</a></li>
                        @endguest
                    </ul>
                </div>

                <!-- Legal & Policies (placeholders for project) -->
                <div>
                    <h5 style="margin:0 0 .75rem 0; color:#e5e7eb;">Legal & Policies</h5>
                    <ul style="list-style:none; padding:0; margin:0; line-height:1.9;">
                        <li><a href="#" style="color:#cbd5e1; text-decoration:none;">Privacy Policy</a></li>
                        <li><a href="#" style="color:#cbd5e1; text-decoration:none;">Terms of Use</a></li>
                        <li><a href="#" style="color:#cbd5e1; text-decoration:none;">Data Licensing / Disclaimer</a></li>
                    </ul>
                </div>

                <!-- Contact & Support -->
                <div>
                    <h5 style="margin:0 0 .75rem 0; color:#e5e7eb;">Contact & Support</h5>
                    <ul style="list-style:none; padding:0; margin:0; line-height:1.9;">
                        <li><a href="mailto:info@slvsn.org" style="color:#cbd5e1; text-decoration:none;">info@slvsn.org</a></li>
                        <li><a href="https://www.epid.gov.lk" style="color:#cbd5e1; text-decoration:none;">Epidemiology Unit, Sri Lanka</a></li>
                        <li><a href="https://www.health.gov.lk" style="color:#cbd5e1; text-decoration:none;">Ministry of Health</a></li>
                    </ul>
                </div>
            </div>

            <hr style="border: none; border-top: 1px solid rgba(203,213,225,.2); margin: 1.5rem 0;" />

            <div class="row" style="display:grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                <div>
                    <h6 style="margin:0 0 .5rem 0; color:#e5e7eb;">Data Sources</h6>
                    <p style="margin:0; color:#94a3b8; font-size:.85rem;">Epidemiology Unit (Sri Lanka), Ministry of Health Sri Lanka, WHO public datasets.</p>
                </div>
                <div style="text-align:right;">
                    <h6 style="margin:0 0 .5rem 0; color:#e5e7eb;">Technical Info</h6>
                    <p style="margin:0; color:#94a3b8; font-size:.85rem;">Big Data analytics platform · Last updated: {{ now()->format('F Y') }}</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


