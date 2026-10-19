<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    <title>@yield('title') - PT. SKI INDONESIA</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            overflow-x: hidden; 
            background-color: #f8fafc;
            color: #0f172a;
        } 
        
        /* ==========================================================
           FLOATING PILL NAVBAR (GLOBAL)
           ========================================================== */
        nav.navbar {
            max-width: 1260px;
            margin: 14px auto 0 !important;
            padding: 0.6rem 1.25rem !important;
            border-radius: 999px !important;
            background: rgba(10, 25, 47, 0.9) !important;
            backdrop-filter: blur(16px) !important;
            -webkit-backdrop-filter: blur(16px) !important;
            border: 1px solid rgba(255, 255, 255, 0.14) !important;
            box-shadow: 0 14px 35px rgba(10, 25, 47, 0.18) !important;
            position: sticky !important;
            top: 14px !important;
            z-index: 1050 !important;
            transition: all 0.3s ease;
        }

        nav.navbar .navbar-brand {
            font-weight: 800;
            display: flex;
            align-items: center;
            color: #ffffff !important;
        }

        nav.navbar .navbar-brand img {
            background: #ffffff;
            padding: 3px;
            border-radius: 50%;
        }

        nav.navbar .nav-link {
            font-weight: 600 !important;
            color: rgba(255, 255, 255, 0.82) !important;
            font-size: 0.88rem !important;
            padding: 0.5rem 1rem !important;
            border-radius: 999px !important;
            transition: all 0.25s ease !important;
        }

        nav.navbar .nav-link:hover,
        nav.navbar .nav-link.active-menu {
            color: #ffffff !important;
            background: rgba(255, 255, 255, 0.13) !important;
        }

        nav.navbar .nav-link.active-admin {
            background-color: #38bdf8 !important;
            color: #0a192f !important;
        }

        /* Tombol Kanan Navbar */
        nav.navbar .btn-success, 
        nav.navbar .bg-success { 
            background-color: #38bdf8 !important; 
            border-color: #38bdf8 !important; 
            color: #0a192f !important;
            font-weight: 800 !important;
            border-radius: 999px !important;
            padding: 0.5rem 1.35rem !important;
            box-shadow: 0 4px 15px rgba(56, 189, 248, 0.3) !important;
        }

        nav.navbar .btn-success:hover { 
            background-color: #7dd3fc !important; 
            border-color: #7dd3fc !important; 
        }

        nav.navbar .btn-outline-success { 
            color: #ffffff !important; 
            border-color: rgba(255, 255, 255, 0.35) !important; 
            border-radius: 999px !important;
            padding: 0.5rem 1.35rem !important;
            font-weight: 700 !important;
            background: rgba(255, 255, 255, 0.06) !important;
        }

        nav.navbar .btn-outline-success:hover { 
            background-color: #ffffff !important; 
            color: #0a192f !important; 
        }

        nav.navbar .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.3) !important;
            filter: invert(1) brightness(2);
        }

        /* Dropdown Menu */
        nav.navbar .dropdown-menu {
            border-radius: 20px !important;
            border: 1px solid #e2e8f0 !important;
            box-shadow: 0 15px 35px rgba(10, 25, 47, 0.15) !important;
            padding: 0.6rem !important;
            margin-top: 0.75rem !important;
        }

        nav.navbar .dropdown-item {
            border-radius: 12px !important;
            padding: 0.55rem 1rem !important;
            font-weight: 600 !important;
            font-size: 0.88rem !important;
        }
        nav.navbar .dropdown-item:hover { 
            background-color: #eff6ff !important; 
            color: #0066cc !important; 
        }

        /* CONTAINER CUSTOM */
        .container-fluid-custom { padding-left: 1.5rem; padding-right: 1.5rem; }
        @media (min-width: 992px) {
            .container-fluid-custom { padding-left: 2.5rem; padding-right: 2.5rem; }
        }
        
        @media (max-width: 576px) {
            .navbar-brand img { width: 35px !important; }
            .navbar-brand .fw-bold { font-size: 0.75rem !important; }
            .navbar-brand .lh-1 { padding-left: 6px !important; }
            nav.navbar { margin: 10px 10px 0 !important; border-radius: 20px !important; }
        }

        main { padding-top: 10px; } 

        /* FOOTER MODERN */
        .footer { 
            background: linear-gradient(135deg, #071527 0%, #0a192f 100%); 
            color: white; 
            padding: 4rem 0 2.5rem; 
            margin-top: 5rem; 
            border-top: 1px solid rgba(255,255,255,0.08);
        }
        .footer h5 { color: #38bdf8; font-weight: 700; }
        
        /* WA FLOATING BUTTON */
        .float-wa {
            position: fixed; bottom: 30px; right: 30px; background-color: #25d366; color: white;
            padding: 12px 24px; border-radius: 50px; font-weight: bold; text-decoration: none;
            box-shadow: 0 10px 25px rgba(37, 211, 102, 0.35); z-index: 999; transition: all 0.3s ease;
            display: inline-flex; align-items: center;
        }
        @media (max-width: 576px) {
            .float-wa { padding: 8px 16px; font-size: 0.82rem; bottom: 15px; right: 15px; }
        }
        .float-wa:hover { transform: translateY(-3px); color: white; box-shadow: 0 14px 30px rgba(37, 211, 102, 0.45); }
    </style>
    @stack('styles')
</head>
<body>

    <nav class="navbar navbar-expand-xl navbar-dark">
        <div class="container-fluid container-fluid-custom">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="42" class="me-2">
                <div class="lh-1" style="border-left: 2px solid rgba(255,255,255,0.25); padding-left: 10px;">
                    <span class="fw-bold d-block text-white" style="font-size: 0.9rem; letter-spacing: 0.5px;">PT. SERTIFIKASI KOMPETENSI</span>
                    <span class="fw-bold d-block text-white opacity-75" style="font-size: 0.9rem; letter-spacing: 0.5px;">INDONESIA</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto align-items-xl-center gap-1">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active-admin' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.participants.index') ? 'active-admin' : '' }}" href="{{ route('admin.participants.index') }}">Kelola Peserta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.webinar.index') ? 'active-admin' : '' }}" href="{{ route('admin.webinar.index') }}">Data Webinar</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active-menu' : '' }}" href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('pelatihan.*') ? 'active-menu' : '' }}" href="{{ route('pelatihan.index') }}">Pelatihan</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ (request()->routeIs('program.bnsp') || request()->routeIs('program.kemnaker')) ? 'active-menu' : '' }}" href="#" data-bs-toggle="dropdown">Sertifikasi</a>
                            <ul class="dropdown-menu shadow border-0">
                                <li><a class="dropdown-item fw-bold" href="{{ route('program.bnsp') }}">BNSP</a></li>
                                <li><a class="dropdown-item fw-bold" href="{{ route('program.kemnaker') }}">Kemnaker</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('about') ? 'active-menu' : '' }}" href="{{ route('about') }}">Tentang Kami</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('info.*') ? 'active-menu' : '' }}" href="#" data-bs-toggle="dropdown">Informasi</a>
                            <ul class="dropdown-menu shadow border-0">
                                <li><a class="dropdown-item" href="{{ route('info.guide') }}">Panduan Pendaftaran</a></li>
                                <li><a class="dropdown-item" href="{{ route('info.contact') }}">Kontak Kami</a></li>
                            </ul>
                        </li>
                    @endauth
                </ul>
                <ul class="navbar-nav gap-2 mt-3 mt-xl-0 align-items-xl-center">
                    @guest
                        <li class="nav-item">
                            <a href="{{ route('register.form') }}" class="btn btn-success rounded-pill fw-bold px-4 w-100">Daftar Online</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-outline-success rounded-pill fw-bold px-4 w-100">Login</a>
                        </li>
                    @else
                        <li class="nav-item dropdown text-center text-xl-start">
                            <a class="nav-link dropdown-toggle fw-bold text-white" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle text-info"></i> {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger fw-bold">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main style="min-height: 70vh;">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container-fluid container-fluid-custom">
            <div class="row g-4 align-items-center text-center text-md-start">
                <div class="col-md-6">
                    <h5 class="fw-bold mb-2">PT. SKI INDONESIA</h5>
                    <p class="small opacity-75 mb-0">Hotel Nirvana Inn Wahid Hasyim, Jl. Wahid Hasyim No.60A, Sleman, DIY 55281.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-2 fw-semibold small text-uppercase" style="letter-spacing: 1px;">Ikuti Sosial Media Kami:</p>
                    <div class="d-flex justify-content-center justify-content-md-end gap-3">
                        <a href="https://www.facebook.com/share/1D7yWsataF/" target="_blank" class="text-white fs-5 opacity-75 hover-opacity"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/sertifikasi_kompetensi" target="_blank" class="text-white fs-5 opacity-75 hover-opacity"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.tiktok.com/@skiindonesia" target="_blank" class="text-white fs-5 opacity-75 hover-opacity"><i class="bi bi-tiktok"></i></a>
                        <a href="https://youtube.com/@skiindonesia" target="_blank" class="text-white fs-5 opacity-75 hover-opacity"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4" style="border-color: rgba(255,255,255,0.15);">
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <p class="mb-0 small opacity-60">&copy; {{ date('Y') }} PT. SERTIFIKASI KOMPETENSI INDONESIA. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <a href="https://wa.me/6289514692974" class="float-wa" target="_blank">
        <i class="bi bi-whatsapp me-2 fs-5"></i> Hubungi Kami
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>