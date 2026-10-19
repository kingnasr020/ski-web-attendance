@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    .ski-modern-wrap {
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #0f172a;
        background-color: #ffffff;
        overflow-x: hidden;
    }

    .font-serif-italic {
        font-family: 'Instrument Serif', Georgia, serif;
        font-style: italic;
        font-weight: 400;
        letter-spacing: 0;
    }

    /* ==========================================================
       0. FLOATING PILL NAVBAR (ALA REFERENSI LYNK)
       ========================================================== */
    body {
        background-color: #eff6ff;
    }

    nav.navbar {
        max-width: 1260px;
        margin: 14px auto 0 !important;
        padding: 0.6rem 1.25rem !important;
        border-radius: 999px !important;
        background: rgba(10, 25, 47, 0.88) !important;
        backdrop-filter: blur(16px) !important;
        -webkit-backdrop-filter: blur(16px) !important;
        border: 1px solid rgba(255, 255, 255, 0.14) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.14) !important;
        box-shadow: 0 14px 35px rgba(10, 25, 47, 0.18) !important;
        position: sticky !important;
        top: 14px !important;
        z-index: 1050 !important;
        transition: all 0.3s ease;
    }

    /* Warna teks & logo di dalam Floating Pill Navbar */
    nav.navbar .navbar-brand,
    nav.navbar .navbar-brand span,
    nav.navbar .navbar-brand div,
    nav.navbar .navbar-brand strong {
        color: #ffffff !important;
    }

    nav.navbar .navbar-brand img {
        background: #ffffff;
        padding: 3px;
        border-radius: 50%;
    }

    nav.navbar .nav-link {
        color: rgba(255, 255, 255, 0.82) !important;
        font-weight: 600 !important;
        font-size: 0.88rem !important;
        padding: 0.5rem 1rem !important;
        border-radius: 999px !important;
        background: transparent !important;
        transition: all 0.25s ease !important;
    }

    nav.navbar .nav-link:hover,
    nav.navbar .nav-link.active {
        color: #ffffff !important;
        background: rgba(255, 255, 255, 0.13) !important;
    }

    /* Tombol kanan di Navbar (Daftar Online & Login) */
    nav.navbar .btn-primary {
        background: #38bdf8 !important;
        border-color: #38bdf8 !important;
        color: #0a192f !important;
        font-weight: 800 !important;
        border-radius: 999px !important;
        padding: 0.5rem 1.35rem !important;
        box-shadow: 0 4px 15px rgba(56, 189, 248, 0.3) !important;
    }

    nav.navbar .btn-primary:hover {
        background: #7dd3fc !important;
        transform: translateY(-1px);
    }

    nav.navbar .btn-outline-primary {
        color: #ffffff !important;
        border-color: rgba(255, 255, 255, 0.35) !important;
        border-radius: 999px !important;
        padding: 0.5rem 1.35rem !important;
        font-weight: 700 !important;
        background: rgba(255, 255, 255, 0.06) !important;
    }

    nav.navbar .btn-outline-primary:hover {
        background: #ffffff !important;
        color: #0a192f !important;
    }

    nav.navbar .navbar-toggler {
        border-color: rgba(255, 255, 255, 0.3) !important;
        filter: invert(1) brightness(2);
    }

    /* Dropdown di dalam Navbar */
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

    @media (max-width: 991.98px) {
        nav.navbar {
            margin: 10px 12px 0 !important;
            border-radius: 24px !important;
        }
        nav.navbar .navbar-collapse {
            padding-top: 1rem;
        }
    }

    /* ==========================================================
       1. HERO MESH & BENTO
       ========================================================== */
    .ski-hero {
        margin-top: -5.5rem;
        padding: 8.5rem 0 4rem;
        background: 
            radial-gradient(circle at 12% 18%, rgba(56, 189, 248, 0.25) 0%, transparent 45%),
            radial-gradient(circle at 88% 22%, rgba(0, 120, 212, 0.20) 0%, transparent 50%),
            linear-gradient(180deg, #dbeafe 0%, #eff6ff 55%, #ffffff 100%);
        position: relative;
    }

    .ski-pill-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.45rem 1rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(0, 120, 212, 0.2);
        box-shadow: 0 4px 15px rgba(0, 120, 212, 0.06);
        font-size: 0.8rem;
        font-weight: 700;
        color: #005fb8;
    }

    .ski-hero-title {
        font-size: clamp(2.25rem, 4.5vw, 3.75rem);
        font-weight: 800;
        line-height: 1.12;
        letter-spacing: -0.03em;
        color: #0a192f;
    }

    .ski-hero-title .accent {
        color: #0066cc;
        font-size: 1.08em;
    }

    .ski-btn-primary {
        background: #0a192f;
        color: #ffffff !important;
        border-radius: 999px;
        padding: 0.9rem 1.85rem;
        font-weight: 700;
        font-size: 0.95rem;
        border: none;
        box-shadow: 0 10px 25px rgba(10, 25, 47, 0.18);
        transition: all 0.25s ease;
    }

    .ski-btn-primary:hover {
        background: #0066cc;
        transform: translateY(-3px);
        box-shadow: 0 14px 30px rgba(0, 102, 204, 0.28);
    }

    .ski-btn-secondary {
        background: #ffffff;
        color: #0a192f !important;
        border-radius: 999px;
        padding: 0.9rem 1.75rem;
        font-weight: 700;
        font-size: 0.95rem;
        border: 1.5px solid #cbd5e1;
        transition: all 0.25s ease;
    }

    .ski-btn-secondary:hover {
        border-color: #0066cc;
        color: #0066cc !important;
        transform: translateY(-3px);
    }

    /* Hero Right Bento Collage */
    .hero-bento-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 1rem;
    }

    .bento-main-img {
        grid-column: span 7;
        border-radius: 24px;
        overflow: hidden;
        position: relative;
        min-height: 280px;
        box-shadow: 0 15px 35px rgba(15, 23, 42, 0.1);
    }

    .bento-main-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .bento-side-col {
        grid-column: span 5;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .bento-stat-blue {
        background: linear-gradient(135deg, #0066cc 0%, #004494 100%);
        color: #ffffff;
        border-radius: 24px;
        padding: 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 12px 30px rgba(0, 102, 204, 0.2);
    }

    .bento-stat-dark {
        background: #0a192f;
        color: #ffffff;
        border-radius: 24px;
        padding: 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .bento-bottom-bar {
        grid-column: span 12;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 1rem 1.5rem;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
    }

    /* ==========================================================
       2. BENTO VALUE PROPOSITIONS
       ========================================================== */
    .bento-feature-card {
        border-radius: 24px;
        padding: 2rem;
        height: 100%;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .bento-feature-card:hover {
        transform: translateY(-5px);
    }

    .bento-feature-primary {
        background: linear-gradient(145deg, #0a192f 0%, #0f294a 100%);
        color: #ffffff;
        box-shadow: 0 18px 40px rgba(10, 25, 47, 0.15);
    }

    .bento-feature-light {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        color: #0f172a;
    }

    .bento-feature-softblue {
        background: linear-gradient(145deg, #eff6ff 0%, #dbeafe 100%);
        border: 1px solid #bfdbfe;
        color: #0a192f;
    }

    .bento-icon-pill {
        width: 52px;
        height: 52px;
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1.25rem;
    }

    /* ==========================================================
       3. CEO BENTO SECTION
       ========================================================== */
    .ceo-bento-wrapper {
        background: #f8fafc;
        border-radius: 32px;
        border: 1px solid #e2e8f0;
        padding: 2rem;
    }

    .ceo-photo-card {
        background: linear-gradient(180deg, #dbeafe 0%, #eff6ff 100%);
        border-radius: 24px;
        overflow: hidden;
        position: relative;
        max-width: 340px;
        margin: 0 auto;
        border: 4px solid #ffffff;
        box-shadow: 0 15px 35px rgba(15, 23, 42, 0.08);
    }

    .ceo-photo-card img {
        width: 100%;
        height: 370px;
        object-fit: cover;
        object-position: top center;
    }

    .ceo-floating-badge {
        position: absolute;
        bottom: 12px;
        left: 12px;
        right: 12px;
        background: rgba(10, 25, 47, 0.9);
        backdrop-filter: blur(8px);
        color: #ffffff;
        padding: 0.75rem 1rem;
        border-radius: 16px;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    /* ==========================================================
       4. WEBINAR DARK SHOWCASE
       ========================================================== */
    .webinar-showcase {
        background: 
            radial-gradient(circle at 85% 15%, rgba(56, 189, 248, 0.25) 0%, transparent 45%),
            linear-gradient(135deg, #071527 0%, #004694 100%);
        border-radius: 32px;
        overflow: hidden;
        color: #ffffff;
        box-shadow: 0 22px 45px rgba(7, 21, 39, 0.22);
    }

    .webinar-meta-box {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 18px;
        padding: 1rem 1.25rem;
    }

    .btn-lime-accent {
        background: #d9f99d;
        color: #0a192f !important;
        font-weight: 800;
        border-radius: 999px;
        padding: 0.9rem 1.8rem;
        border: none;
        transition: all 0.25s ease;
    }

    .btn-lime-accent:hover {
        background: #bef264;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(190, 242, 100, 0.3);
    }

    /* ==========================================================
       5. AUTO-SLIDING CAROUSEL SKEMA (GERAK TIAP 2 DETIK)
       ========================================================== */
    .ski-carousel-viewport {
        overflow: hidden;
        position: relative;
        padding: 0.75rem 0.25rem 1.25rem;
    }

    .ski-carousel-track {
        display: flex;
        gap: 1.25rem;
        transition: transform 0.65s cubic-bezier(0.22, 1, 0.36, 1);
        will-change: transform;
    }

    .ski-carousel-slide {
        flex: 0 0 calc(25% - 0.94rem);
        min-width: calc(25% - 0.94rem);
    }

    @media (max-width: 1199.98px) {
        .ski-carousel-slide {
            flex: 0 0 calc(33.333% - 0.84rem);
            min-width: calc(33.333% - 0.84rem);
        }
    }

    @media (max-width: 991.98px) {
        .ski-carousel-slide {
            flex: 0 0 calc(50% - 0.63rem);
            min-width: calc(50% - 0.63rem);
        }
    }

    @media (max-width: 575.98px) {
        .ski-carousel-slide {
            flex: 0 0 86%;
            min-width: 86%;
        }
    }

    .carousel-nav-btn {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: 1.5px solid #cbd5e1;
        background: #ffffff;
        color: #0a192f;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .carousel-nav-btn:hover {
        background: #0066cc;
        border-color: #0066cc;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 102, 204, 0.22);
    }

    .carousel-dots {
        display: flex;
        justify-content: center;
        gap: 0.45rem;
        margin-top: 0.5rem;
    }

    .carousel-dot {
        width: 8px;
        height: 8px;
        border-radius: 999px;
        background: #cbd5e1;
        border: none;
        padding: 0;
        transition: all 0.3s ease;
    }

    .carousel-dot.active {
        width: 28px;
        background: #0066cc;
    }

    .edtech-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 24px;
        padding: 0.65rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: all 0.25s ease;
        box-shadow: 0 6px 20px rgba(15, 23, 42, 0.04);
    }

    .edtech-card:hover {
        border-color: #93c5fd;
        transform: translateY(-6px);
        box-shadow: 0 18px 35px rgba(15, 23, 42, 0.09);
    }

    .edtech-thumb-wrap {
        position: relative;
        height: 185px;
        border-radius: 18px;
        overflow: hidden;
        background: #f1f5f9;
    }

    .edtech-thumb-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .edtech-card:hover .edtech-thumb-wrap img {
        transform: scale(1.06);
    }

    .edtech-badge-floating {
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(4px);
        color: #0066cc;
        font-weight: 800;
        font-size: 0.72rem;
        padding: 0.3rem 0.75rem;
        border-radius: 999px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }

    /* ==========================================================
       6. FLOATING CTA FOOTER BANNER
       ========================================================== */
    .cta-floating-box {
        background: 
            radial-gradient(circle at 20% 20%, rgba(56, 189, 248, 0.35) 0%, transparent 50%),
            linear-gradient(135deg, #0052cc 0%, #0a192f 100%);
        border-radius: 32px;
        padding: 4rem 2rem;
        color: #ffffff;
        box-shadow: 0 20px 45px rgba(0, 82, 204, 0.2);
    }

    @media (max-width: 991.98px) {
        .ski-hero {
            padding: 7rem 0 3rem;
        }
        .bento-main-img, .bento-side-col {
            grid-column: span 12;
        }
        .bento-side-col {
            flex-direction: row;
        }
        .ceo-bento-wrapper {
            padding: 1.5rem 1.25rem;
        }
    }

    @media (max-width: 575.98px) {
        .bento-side-col {
            flex-direction: column;
        }
        .ceo-photo-card img {
            height: 310px;
        }
    }
</style>

<div class="ski-modern-wrap">

    {{-- 1. HERO SECTION (CLEAN BLUE MESH + BENTO COLLAGE) --}}
    <section class="ski-hero">
        <div class="container">
            <div class="row align-items-center g-5">
                {{-- Left Column: Copywriting & CTA --}}
                <div class="col-lg-6">
                    <div class="ski-pill-badge mb-3">
                        <i class="bi bi-patch-check-fill text-primary"></i>
                        <span>OFFICIAL TRAINING CENTER • KEMNAKER RI & BNSP</span>
                    </div>

                    <h1 class="ski-hero-title mb-3">
                        Bangun Karir & Kompetensi K3 yang <span class="font-serif-italic accent">Diakui Industri.</span>
                    </h1>

                    <p class="text-secondary mb-4" style="font-size: 1.05rem; line-height: 1.75;">
                        Selamat datang di <strong>PT. Sertifikasi Kompetensi Indonesia (SKI)</strong>. Tingkatkan kualifikasi profesional dan standar keselamatan kerja perusahaan Anda melalui 25 skema sertifikasi berlisensi resmi negara.
                    </p>

                    <div class="d-flex flex-column flex-sm-row gap-3 mb-4">
                        <a href="{{ route('register.form') }}" class="ski-btn-primary text-decoration-none d-inline-flex align-items-center justify-content-center gap-2">
                            <span>Daftar Pelatihan</span>
                            <i class="bi bi-arrow-up-right-circle-fill fs-5"></i>
                        </a>

                        <a href="https://wa.me/6289514692974?text={{ urlencode('Halo Admin PT. SKI, saya ingin konsultasi mengenai jadwal pelatihan sertifikasi K3 terdekat. Boleh minta katalog lengkapnya?') }}" 
                           target="_blank" 
                           class="ski-btn-secondary text-decoration-none d-inline-flex align-items-center justify-content-center gap-2">
                            <i class="bi bi-whatsapp text-success fs-5"></i>
                            <span>Konsultasi Gratis</span>
                        </a>
                    </div>

                    <div class="d-flex align-items-center gap-4 pt-2 flex-wrap">
                        <div class="d-flex align-items-center gap-2 small fw-semibold text-secondary">
                            <i class="bi bi-check-circle-fill text-primary"></i> Syarat Min. SMA/SMK
                        </div>
                        <div class="d-flex align-items-center gap-2 small fw-semibold text-secondary">
                            <i class="bi bi-check-circle-fill text-primary"></i> Sertifikat Resmi Negara
                        </div>
                    </div>
                </div>

                {{-- Right Column: Bento Grid Visual --}}
                <div class="col-lg-6">
                    <div class="hero-bento-grid">
                        <div class="bento-main-img">
                            <img src="{{ asset('images/foto skema/k3umum.png') }}" alt="Pelatihan Ahli K3 Umum PT SKI">
                            <div style="position: absolute; bottom: 12px; left: 12px; right: 12px; background: rgba(10, 25, 47, 0.85); backdrop-filter: blur(6px); color: #fff; padding: 0.75rem 1rem; border-radius: 16px;">
                                <div class="badge bg-warning text-dark fw-bold mb-1" style="font-size: 0.7rem;">BEST SELLER</div>
                                <div class="fw-bold small">Sertifikasi Ahli K3 Umum & Spesialis</div>
                            </div>
                        </div>

                        <div class="bento-side-col">
                            <div class="bento-stat-blue">
                                <div class="d-flex justify-content-between align-items-start">
                                    <span class="badge bg-white text-primary rounded-pill fw-bold">SKEMA</span>
                                    <i class="bi bi-layers-fill fs-4 text-white opacity-75"></i>
                                </div>
                                <div class="mt-3">
                                    <div class="display-5 fw-extrabold mb-0" style="font-weight: 800;">25+</div>
                                    <div class="small text-white opacity-90">Program Sertifikasi BNSP</div>
                                </div>
                            </div>

                            <div class="bento-stat-dark">
                                <div class="d-flex justify-content-between align-items-start">
                                    <span class="badge rounded-pill fw-bold" style="background: #d9f99d; color: #0a192f;">RESMI</span>
                                    <i class="bi bi-shield-fill-check fs-4" style="color: #d9f99d;"></i>
                                </div>
                                <div class="mt-3">
                                    <div class="h3 fw-bold mb-0 text-white">100%</div>
                                    <div class="small text-white opacity-75">Terverifikasi Kemnaker & BNSP</div>
                                </div>
                            </div>
                        </div>

                        <div class="bento-bottom-bar">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; background: #eff6ff; color: #0066cc;">
                                    <i class="bi bi-building-check fs-5"></i>
                                </div>
                                <div>
                                    <div class="fw-bold small text-dark">Mitra Pelatihan Korporasi & Individu</div>
                                    <div class="text-muted" style="font-size: 0.78rem;">Metode Online & Tatap Muka Terstruktur</div>
                                </div>
                            </div>
                            <a href="{{ route('pelatihan.index') }}" class="btn btn-sm btn-light rounded-pill fw-bold px-3 border">
                                Lihat Katalog <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. BENTO VALUE PROPOSITIONS --}}
    <section class="py-5">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-7">
                    <span class="text-primary fw-bold small text-uppercase" style="letter-spacing: 1.5px;">Keunggulan Utama</span>
                    <h2 class="fw-bold mt-1 mb-0" style="font-size: clamp(1.65rem, 3vw, 2.4rem);">
                        Standar Pelatihan Tinggi untuk <span class="font-serif-italic text-primary" style="font-size: 1.1em;">Karir Nyata</span>
                    </h2>
                </div>
                <div class="col-lg-5 text-lg-end mt-2 mt-lg-0">
                    <p class="text-secondary small mb-0">Dirancang agar peserta lulus uji kompetensi dengan pemahaman praktis yang siap diterapkan di lapangan.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bento-feature-card bento-feature-primary d-flex flex-column justify-content-between">
                        <div>
                            <div class="bento-icon-pill" style="background: rgba(255,255,255,0.12); color: #38bdf8;">
                                <i class="bi bi-patch-check-fill"></i>
                            </div>
                            <h4 class="fw-bold text-white mb-2">Resmi & Terakreditasi</h4>
                            <p class="text-white opacity-75 mb-4" style="line-height: 1.7; font-size: 0.95rem;">
                                PT SKI merupakan PJK3 resmi dengan izin Kemnaker RI serta Tempat Uji Kompetensi (TUK) terverifikasi BNSP. Seluruh sertifikat tercatat resmi dan diakui secara nasional.
                            </p>
                        </div>
                        <div class="d-flex align-items-center gap-2 pt-3 border-top" style="border-color: rgba(255,255,255,0.12) !important;">
                            <span class="badge rounded-pill" style="background: #d9f99d; color: #0a192f;">Legalitas 100% Terjamin</span>
                            <span class="small text-white opacity-75">Standar SKKNI</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="bento-feature-card bento-feature-softblue d-flex flex-column justify-content-between">
                        <div>
                            <div class="bento-icon-pill" style="background: #0066cc; color: #ffffff;">
                                <i class="bi bi-headset"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Pelayanan Prima</h5>
                            <p class="text-secondary small mb-0" style="line-height: 1.7;">
                                Tim admin responsif siap mendampingi pemberkasan dari awal pendaftaran hingga sertifikat fisik & kartu kompetensi diterima.
                            </p>
                        </div>
                        <div class="mt-4 pt-2 fw-bold small text-primary">
                            <i class="bi bi-lightning-charge-fill me-1"></i> Respon Cepat via WhatsApp
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="bento-feature-card bento-feature-light d-flex flex-column justify-content-between">
                        <div>
                            <div class="bento-icon-pill" style="background: #fef3c7; color: #d97706;">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Instruktur Praktisi Senior</h5>
                            <p class="text-secondary small mb-0" style="line-height: 1.7;">
                                Belajar studi kasus riil langsung dari praktisi dan asesor senior yang berpengalaman puluhan tahun di industri migas, konstruksi, & manufaktur.
                            </p>
                        </div>
                        <div class="mt-4 pt-2 fw-bold small text-dark">
                            <i class="bi bi-award-fill text-warning me-1"></i> Kurikulum Berbasis Industri
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 3. SAMBUTAN DIREKTUR (EXECUTIVE BENTO LAYOUT) --}}
    <section class="py-4">
        <div class="container">
            <div class="ceo-bento-wrapper">
                <div class="row align-items-center g-4 g-lg-5">
                    <div class="col-lg-4">
                        <div class="ceo-photo-card">
                            <img src="{{ asset('images/PakDimas.png') }}" alt="Nct Dimas Julian Zahid A">
                            <div class="ceo-floating-badge">
                                <div class="rounded-circle bg-warning text-dark d-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px;">
                                    <i class="bi bi-award-fill"></i>
                                </div>
                                <div>
                                    <div class="fw-bold small lh-sm">Verified Safety Expert</div>
                                    <div class="text-white opacity-75" style="font-size: 0.72rem;">Grad. IOSH • CPRM • MKM</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="ski-pill-badge mb-3">
                            <span>MESSAGE FROM THE CEO</span>
                        </div>

                        <h2 class="fw-bold mb-3" style="font-size: clamp(1.6rem, 3vw, 2.35rem); color: #0a192f;">
                            Membangun Masa Depan <span class="font-serif-italic text-primary" style="font-size: 1.12em;">Industri yang Aman</span>
                        </h2>

                        <div class="p-3 p-md-4 rounded-4 mb-4 bg-white border" style="box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
                            <p class="text-secondary mb-0" style="font-size: 1rem; line-height: 1.8; font-style: italic;">
                                "Keselamatan dan kesehatan kerja (K3) bukan sekadar pemenuhan regulasi, melainkan sebuah investasi jangka panjang bagi keberlangsungan industri. Bersama <strong>PT Sertifikasi Kompetensi Indonesia (SKI)</strong>, kami berkomitmen untuk melahirkan tenaga ahli yang kompeten, berdaya saing global, dan siap menjadi garda terdepan dalam menjaga aset paling berharga perusahaan: nyawa manusia."
                            </p>
                        </div>

                        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-2 pt-2">
                            <div>
                                <h5 class="fw-bold text-dark mb-1">Nct Dimas Julian Zahid A</h5>
                                <div class="text-muted small">AMK, S.Kep, MKM, CPRM, CWCCA, Grad. IOSH</div>
                            </div>
                            <div class="align-self-start align-self-sm-center">
                                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold">
                                    PRESIDEN DIREKTUR PT SKI
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 4. SEKSI WEBINAR TERBARU --}}
    <section class="py-5">
        <div class="container">
            <div class="webinar-showcase p-4 p-lg-5">
                <div class="row align-items-center g-4 g-lg-5">
                    <div class="col-lg-5 text-center">
                        <div class="p-2 rounded-4 d-inline-block" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2);">
                            <img src="{{ asset('images/webinar/poster-safety-leadership.jpeg') }}" 
                                 class="img-fluid rounded-3" 
                                 alt="Poster Webinar Safety Leadership"
                                 style="max-height: 400px; width: auto; object-fit: contain;">
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="d-inline-flex align-items-center gap-2 mb-3">
                            <span class="badge bg-danger rounded-pill px-3 py-2 fw-bold">FREE WEBINAR</span>
                            <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background: rgba(255,255,255,0.15); color: #fff;">
                                Terbuka untuk Umum & Praktisi
                            </span>
                        </div>

                        <h2 class="fw-bold text-white mb-3" style="font-size: clamp(1.6rem, 2.8vw, 2.4rem);">
                            Webinar Nasional: <span class="font-serif-italic" style="color: #d9f99d; font-size: 1.1em;">Safety Leadership</span>
                        </h2>

                        <p class="text-white opacity-80 mb-4" style="line-height: 1.7; font-size: 0.98rem;">
                            <strong>Pemimpin Sebagai Kunci Budaya K3 Indonesia.</strong> Pahami peran strategis kepemimpinan dalam membangun budaya keselamatan kerja yang kuat langsung dari praktisi ahli.
                        </p>

                        <div class="row g-3 mb-4">
                            <div class="col-sm-6">
                                <div class="webinar-meta-box">
                                    <div class="small text-white opacity-75 text-uppercase fw-semibold mb-1">Tanggal Pelaksanaan</div>
                                    <div class="fw-bold fs-6 text-white">
                                        <i class="bi bi-calendar-event me-2" style="color: #d9f99d;"></i>Rabu, 29 April 2026
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="webinar-meta-box">
                                    <div class="small text-white opacity-75 text-uppercase fw-semibold mb-1">Waktu & Media</div>
                                    <div class="fw-bold fs-6 text-white">
                                        <i class="bi bi-clock me-2" style="color: #d9f99d;"></i>20.00 WIB • Zoom Meeting
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column flex-sm-row gap-3">
                            <a href="https://forms.gle/NkmYkiTCrSW6xnyh8" target="_blank" class="btn-lime-accent text-decoration-none text-center">
                                <i class="bi bi-pencil-square me-2"></i>Daftar Sekarang (Gratis)
                            </a>
                            <a href="{{ route('webinar.absensi') }}" class="btn btn-outline-light rounded-pill px-4 py-3 fw-bold text-center">
                                <i class="bi bi-check2-circle me-2"></i>Isi Absensi Peserta
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 5. KATALOG SKEMA UNGGULAN (AUTO-SLIDE TIAP 2 DETIK) --}}
    <section class="py-5" style="background: #f8fafc;">
        <div class="container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 gap-3">
                <div>
                    <span class="ski-pill-badge mb-2">
                        <span class="spinner-grow spinner-grow-sm text-primary" style="width: 8px; height: 8px;" role="status"></span>
                        PROGRAM UNGGULAN
                    </span>
                    <h2 class="fw-bold mb-0 mt-1" style="font-size: clamp(1.75rem, 3vw, 2.5rem);">
                        Pilih Sertifikasi <span class="font-serif-italic text-primary" style="font-size: 1.1em;">Sesuai Kebutuhan</span>
                    </h2>
                </div>

                {{-- Tombol Navigasi Manual Kiri / Kanan --}}
                <div class="d-flex align-items-center gap-2">
                    <button type="button" id="skiPrevBtn" class="carousel-nav-btn" aria-label="Sebelumnya">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                    <button type="button" id="skiNextBtn" class="carousel-nav-btn" aria-label="Selanjutnya">
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>

            {{-- Viewport Slider --}}
            <div class="ski-carousel-viewport" id="skiCarouselViewport">
                <div class="ski-carousel-track" id="skiCarouselTrack">
                    @foreach($pelatihanUnggulan as $slug => $data)
                    <div class="ski-carousel-slide">
                        <div class="edtech-card">
                            <div class="edtech-thumb-wrap">
                                <img src="{{ $data['image'] }}" alt="{{ $data['title'] }}">
                                <span class="edtech-badge-floating">
                                    <i class="bi bi-patch-check-fill me-1"></i>BNSP
                                </span>
                            </div>

                            <div class="p-3 d-flex flex-column flex-grow-1">
                                <div class="d-flex align-items-center gap-2 text-muted small mb-2">
                                    <span class="badge bg-light text-secondary border rounded-pill fw-medium">
                                        <i class="bi bi-clock me-1 text-primary"></i>{{ $data['durasi'] }}
                                    </span>
                                    <span class="badge bg-light text-secondary border rounded-pill fw-medium">Min. SMA/SMK</span>
                                </div>

                                <h6 class="fw-bold text-dark mb-3" style="font-size: 1.02rem; line-height: 1.45; min-height: 44px;">
                                    {{ $data['title'] }}
                                </h6>

                                <div class="mt-auto pt-2 border-top d-flex gap-2">
                                    <a href="{{ route('pelatihan.show', $slug) }}" 
                                       class="btn btn-light border rounded-pill fw-bold btn-sm flex-fill py-2 text-dark">
                                        Detail
                                    </a>
                                    <a href="https://wa.me/6289514692974?text={{ urlencode('Halo Admin SKI, saya ingin daftar pelatihan ' . $data['title']) }}" 
                                       target="_blank" 
                                       class="btn btn-primary rounded-pill fw-bold btn-sm flex-fill py-2 text-white"
                                       style="background: #0066cc; border-color: #0066cc;">
                                        Daftar <i class="bi bi-arrow-up-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Indikator Titik --}}
            <div class="carousel-dots" id="skiCarouselDots"></div>

            {{-- Tombol View 25 Skema Tetap Ada di Bawah --}}
            <div class="text-center mt-4 pt-2">
                <a href="{{ route('pelatihan.index') }}" class="ski-btn-primary text-decoration-none d-inline-flex align-items-center gap-2">
                    <span>LIHAT SEMUA 25 SKEMA SERTIFIKASI</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- 6. FLOATING CTA BANNER --}}
    <section class="py-5 bg-white">
        <div class="container">
            <div class="cta-floating-box text-center">
                <span class="badge rounded-pill px-3 py-2 fw-bold mb-3" style="background: rgba(255,255,255,0.15); color: #d9f99d;">
                    <i class="bi bi-stars me-1"></i> KONSULTASI & PENDAFTARAN
                </span>
                <h2 class="fw-bold text-white mb-3" style="font-size: clamp(1.75rem, 3.2vw, 2.6rem);">
                    Siap Meningkatkan Kompetensi <span class="font-serif-italic" style="color: #d9f99d; font-size: 1.1em;">Karir Anda?</span>
                </h2>
                <p class="text-white opacity-80 col-lg-7 mx-auto mb-4" style="font-size: 1.05rem;">
                    Jangan tunda perkembangan karir Anda. Jadilah tenaga ahli K3 yang kompeten dan bersertifikat resmi bersama PT. Sertifikasi Kompetensi Indonesia.
                </p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="https://wa.me/6289514692974?text={{ urlencode('Halo Admin SKI, saya ingin konsultasi pendaftaran sertifikasi K3.') }}" 
                       target="_blank" 
                       class="btn-lime-accent text-decoration-none d-inline-flex align-items-center gap-2">
                        <i class="bi bi-whatsapp fs-5"></i>
                        <span>Hubungi Admin Sekarang</span>
                    </a>
                    <a href="{{ route('pelatihan.index') }}" class="btn btn-outline-light rounded-pill px-4 py-3 fw-bold">
                        Jelajahi Katalog Skema
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

{{-- SCRIPT AUTO-SLIDER 2 DETIK --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const track = document.getElementById('skiCarouselTrack');
    const viewport = document.getElementById('skiCarouselViewport');
    const prevBtn = document.getElementById('skiPrevBtn');
    const nextBtn = document.getElementById('skiNextBtn');
    const dotsContainer = document.getElementById('skiCarouselDots');

    if (!track) return;

    const originalSlides = Array.from(track.children);
    const totalOriginal = originalSlides.length;
    if (totalOriginal === 0) return;

    // Gandakan kartu agar efek geser ke sampingnya nyambung terus (infinite loop)
    originalSlides.forEach(slide => {
        const clone = slide.cloneNode(true);
        clone.setAttribute('aria-hidden', 'true');
        track.appendChild(clone);
    });

    let currentIndex = 0;
    let isTransitioning = false;
    let autoSlideTimer = null;

    // Buat indikator titik
    for (let i = 0; i < totalOriginal; i++) {
        const dot = document.createElement('button');
        dot.className = 'carousel-dot' + (i === 0 ? ' active' : '');
        dot.setAttribute('aria-label', 'Slide ' + (i + 1));
        dot.addEventListener('click', () => {
            goToSlide(i);
            resetTimer();
        });
        dotsContainer.appendChild(dot);
    }

    const dots = Array.from(dotsContainer.children);

    function updateDots() {
        const activeDot = currentIndex % totalOriginal;
        dots.forEach((dot, idx) => {
            dot.classList.toggle('active', idx === activeDot);
        });
    }

    function getStepSize() {
        const firstSlide = track.children[0];
        const gap = parseFloat(window.getComputedStyle(track).gap) || 20;
        return firstSlide.getBoundingClientRect().width + gap;
    }

    function goToSlide(index, animate = true) {
        if (animate) {
            track.style.transition = 'transform 0.65s cubic-bezier(0.22, 1, 0.36, 1)';
        } else {
            track.style.transition = 'none';
        }
        const offset = index * getStepSize();
        track.style.transform = `translate3d(-${offset}px, 0, 0)`;
        currentIndex = index;
        updateDots();
    }

    function nextSlide() {
        if (isTransitioning) return;
        isTransitioning = true;
        goToSlide(currentIndex + 1, true);
    }

    function prevSlide() {
        if (isTransitioning) return;
        if (currentIndex === 0) {
            goToSlide(totalOriginal, false);
            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    isTransitioning = true;
                    goToSlide(totalOriginal - 1, true);
                });
            });
        } else {
            isTransitioning = true;
            goToSlide(currentIndex - 1, true);
        }
    }

    track.addEventListener('transitionend', () => {
        isTransitioning = false;
        if (currentIndex >= totalOriginal) {
            goToSlide(currentIndex - totalOriginal, false);
        }
    });

    function startTimer() {
        stopTimer();
        // Otomatis geser ke samping setiap 2 detik (2000 ms)
        autoSlideTimer = setInterval(nextSlide, 2000);
    }

    function stopTimer() {
        if (autoSlideTimer) {
            clearInterval(autoSlideTimer);
            autoSlideTimer = null;
        }
    }

    function resetTimer() {
        stopTimer();
        startTimer();
    }

    nextBtn.addEventListener('click', () => {
        nextSlide();
        resetTimer();
    });

    prevBtn.addEventListener('click', () => {
        prevSlide();
        resetTimer();
    });

    // Berhenti otomatis saat kursor diarahkan ke kartu agar mudah diklik
    viewport.addEventListener('mouseenter', stopTimer);
    viewport.addEventListener('mouseleave', startTimer);
    viewport.addEventListener('touchstart', stopTimer, { passive: true });
    viewport.addEventListener('touchend', startTimer, { passive: true });

    window.addEventListener('resize', () => {
        goToSlide(currentIndex % totalOriginal, false);
    });

    startTimer();
});
</script>
@endsection