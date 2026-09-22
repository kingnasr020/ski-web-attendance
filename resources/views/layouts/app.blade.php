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
        body { font-family: sans-serif; overflow-x: hidden; } 
        
        /* NAVBAR STYLING */
        .navbar { border-bottom: 4px solid #0078D4; }
        .navbar-brand { font-weight: 800; color: #0078D4 !important; display: flex; align-items: center; }
        .nav-link { font-weight: 700; text-transform: uppercase; color: #003459 !important; font-size: 0.9rem; }
        .nav-link:hover { color: #F37021 !important; }
        
        /* Active Menu Highlight */
        .nav-link.active-menu { color: #0078D4 !important; background-color: rgba(0, 120, 212, 0.05); border-radius: 8px; }
        .nav-link.active-admin { background-color: #e3f2fd; color: #0078D4 !important; border-radius: 50px; }

        /* FULL WIDTH CONTAINER */
        .container-fluid-custom { padding-left: 1rem; padding-right: 1rem; }
        @media (min-width: 992px) {
            .container-fluid-custom { padding-left: 2rem; padding-right: 2rem; }
        }
        
        /* KHUSUS HP */
        @media (max-width: 576px) {
            .navbar-brand img { width: 35px !important; }
            .navbar-brand .fw-bold { font-size: 0.75rem !important; }
            .navbar-brand .lh-1 { padding-left: 6px !important; }
        }

        /* FIX STICKY NAVBAR */
        main { padding-top: 20px; } 
        @media (max-width: 991px) {
            main { padding-top: 110px !important; } 
        }

        /* FOOTER */
        .footer { background-color: #001b2e; color: white; padding: 3rem 0; margin-top: 4rem; }
        .footer h5 { color: #F37021; }
        
        /* WA BUTTON */
        .float-wa {
            position: fixed; bottom: 30px; right: 30px; background-color: #25d366; color: white;
            padding: 12px 25px; border-radius: 50px; font-weight: bold; text-decoration: none;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.2); z-index: 999; transition: 0.3s;
        }
        @media (max-width: 576px) {
            .float-wa { padding: 8px 15px; font-size: 0.8rem; bottom: 15px; right: 15px; }
        }
        .float-wa:hover { transform: scale(1.05); color: white; }

        /* WARNA BOOTSTRAP CUSTOM */
        .btn-success, .bg-success { 
            background-color: #0078D4 !important; 
            border-color: #0078D4 !important; 
            color: white !important;
        }
        .btn-success:hover { 
            background-color: #F37021 !important; 
            border-color: #F37021 !important; 
        }
        .btn-outline-success { 
            color: #0078D4 !important; 
            border-color: #0078D4 !important; 
        }
        .btn-outline-success:hover { 
            background-color: #0078D4 !important; 
            color: white !important; 
        }
        .text-success, .text-primary { color: #0078D4 !important; }
        .dropdown-item:hover { background-color: #f8f9fa; color: #F37021; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-xl navbar-light bg-white shadow-sm sticky-top py-2">
        <div class="container-fluid container-fluid-custom">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="45" class="me-2">
                <div class="lh-1" style="border-left: 2px solid #ddd; padding-left: 10px;">
                    <span class="fw-bold d-block" style="color: #0078D4; font-size: 0.95rem; letter-spacing: 0.5px;">PT. SERTIFIKASI KOMPETENSI</span>
                    <span class="fw-bold d-block" style="color: #333; font-size: 0.95rem; letter-spacing: 0.5px;">INDONESIA</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
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
                <ul class="navbar-nav gap-2 mt-3 mt-xl-0">
                    @guest
                        <li class="nav-item">
                            <a href="{{ route('register.form') }}" class="btn btn-success rounded-pill fw-bold px-4 w-100">Daftar Online</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-outline-success rounded-pill fw-bold px-4 w-100">Login</a>
                        </li>
                    @else
                        <li class="nav-item dropdown text-center text-xl-start">
                            <a class="nav-link dropdown-toggle fw-bold text-primary" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">Logout</button>
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
            <div class="row g-4 text-center text-md-start">
                <div class="col-md-6">
                    <h5 class="fw-bold mb-3">PT. SKI INDONESIA</h5>
                    <p class="small opacity-75">Hotel Nirvana Inn Wahid Hasyim, Jl. Wahid Hasyim No.60A, Sleman, DIY 55281.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-2 fw-bold">Ikuti Kami:</p>
                    <div class="d-flex justify-content-center justify-content-md-end gap-3">
                        <a href="https://www.facebook.com/share/1D7yWsataF/" class="text-white fs-5"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/sertifikasi_kompetensi" class="text-white fs-5"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.tiktok.com/@skiindonesia" class="text-white fs-5"><i class="bi bi-tiktok"></i></a>
                        <a href="https://youtube.com/@skiindonesia" class="text-white fs-5"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4 opacity-25">
            <p class="mb-0 text-center small opacity-50">&copy; {{ date('Y') }} PT. SKI INDONESIA (Sertifikasi Kompetensi Indonesia).</p>
        </div>
    </footer>

    <a href="https://wa.me/6289514692974" class="float-wa" target="_blank">
        <i class="bi bi-whatsapp me-2"></i> Hubungi Kami
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>