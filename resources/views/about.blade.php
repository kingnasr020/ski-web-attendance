@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    .ski-about-wrap {
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #0f172a;
        background-color: #ffffff;
        overflow-x: hidden;
    }

    .font-serif-italic {
        font-family: 'Instrument Serif', Georgia, serif;
        font-style: italic;
        font-weight: 400;
    }

    /* 1. HERO HEADER */
    .about-hero {
        margin-top: -5.5rem;
        padding: 8.5rem 0 4rem;
        background: 
            radial-gradient(circle at 15% 20%, rgba(56, 189, 248, 0.25) 0%, transparent 45%),
            radial-gradient(circle at 85% 25%, rgba(0, 120, 212, 0.18) 0%, transparent 50%),
            linear-gradient(180deg, #dbeafe 0%, #eff6ff 60%, #ffffff 100%);
        position: relative;
    }

    .ski-pill-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.45rem 1rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.92);
        border: 1px solid rgba(0, 120, 212, 0.2);
        box-shadow: 0 4px 15px rgba(0, 120, 212, 0.06);
        font-size: 0.78rem;
        font-weight: 700;
        color: #005fb8;
    }

    .about-hero-title {
        font-size: clamp(2.2rem, 4.2vw, 3.5rem);
        font-weight: 800;
        line-height: 1.14;
        letter-spacing: -0.03em;
        color: #0a192f;
    }

    /* 2. BENTO PROFILE & LEGALITAS */
    .bento-card {
        border-radius: 28px;
        padding: 2rem;
        height: 100%;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .bento-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 38px rgba(15, 23, 42, 0.08);
    }

    .bento-dark {
        background: linear-gradient(145deg, #0a192f 0%, #0f294a 100%);
        color: #ffffff;
        border: none;
    }

    .bento-softblue {
        background: linear-gradient(145deg, #eff6ff 0%, #dbeafe 100%);
        border-color: #bfdbfe;
    }

    /* 3. STRUKTUR ORGANISASI HIERARKI */
    .org-section {
        background: 
            radial-gradient(circle at 10% 15%, rgba(56, 189, 248, 0.12) 0%, transparent 40%),
            radial-gradient(circle at 90% 85%, rgba(0, 102, 204, 0.1) 0%, transparent 40%),
            #f8fafc;
        border-top: 1px solid #e2e8f0;
        border-bottom: 1px solid #e2e8f0;
    }

    .org-card {
        background: #ffffff;
        border: 1.5px solid #e2e8f0;
        border-radius: 26px;
        padding: 1.6rem 1.35rem;
        text-align: center;
        height: 100%;
        position: relative;
        transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.04);
    }

    .org-card:hover {
        border-color: #38bdf8;
        transform: translateY(-6px);
        box-shadow: 0 20px 38px rgba(0, 102, 204, 0.12);
    }

    .org-card-featured {
        background: linear-gradient(180deg, #ffffff 0%, #f0f9ff 100%);
        border: 2px solid #93c5fd;
    }

    .org-avatar-wrap {
        width: 138px;
        height: 138px;
        margin: 0 auto 1.1rem;
        border-radius: 50%;
        padding: 4px;
        background: linear-gradient(135deg, #0066cc 0%, #38bdf8 100%);
        box-shadow: 0 10px 24px rgba(0, 102, 204, 0.18);
    }

    .org-avatar-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
        border-radius: 50%;
        border: 3.5px solid #ffffff;
        background: #e0f2fe;
    }

    .org-role-badge {
        display: inline-block;
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        padding: 0.38rem 0.95rem;
        border-radius: 999px;
        margin-bottom: 0.65rem;
    }

    .org-name {
        font-size: 1.08rem;
        font-weight: 800;
        color: #0a192f;
        margin-bottom: 0.25rem;
        line-height: 1.35;
    }

    .org-sub {
        font-size: 0.82rem;
        color: #64748b;
        margin-bottom: 0;
        line-height: 1.5;
    }

    .org-v-line {
        width: 3px;
        height: 34px;
        background: linear-gradient(180deg, #0066cc 0%, #38bdf8 100%);
        margin: 0 auto;
        border-radius: 99px;
    }

    .org-branch-bar {
        max-width: 460px;
        height: 3px;
        background: #93c5fd;
        margin: 0 auto;
        position: relative;
    }

    .org-branch-bar::before,
    .org-branch-bar::after {
        content: '';
        position: absolute;
        top: 0;
        width: 3px;
        height: 22px;
        background: #93c5fd;
    }

    .org-branch-bar::before { left: 0; }
    .org-branch-bar::after { right: 0; }

    /* 4. GALERI KEGIATAN KELAS (22 FOTO ASLI A-V TERACAK) */
    .gallery-track-wrap {
        overflow: hidden;
        position: relative;
        padding: 0.65rem 0;
    }

    .gallery-track-left {
        display: flex;
        gap: 1.25rem;
        width: max-content;
        animation: scrollGalleryLeft 52s linear infinite;
    }

    .gallery-track-right {
        display: flex;
        gap: 1.25rem;
        width: max-content;
        animation: scrollGalleryRight 56s linear infinite;
    }

    .gallery-track-wrap:hover .gallery-track-left,
    .gallery-track-wrap:hover .gallery-track-right {
        animation-play-state: paused;
    }

    @keyframes scrollGalleryLeft {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    @keyframes scrollGalleryRight {
        0% { transform: translateX(-50%); }
        100% { transform: translateX(0); }
    }

    .gallery-card {
        width: 285px;
        height: 350px;
        border-radius: 22px;
        overflow: hidden;
        position: relative;
        flex-shrink: 0;
        border: 1.5px solid #e2e8f0;
        background: #0a192f;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.08);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .gallery-card:hover {
        transform: translateY(-6px);
        border-color: #38bdf8;
        box-shadow: 0 18px 36px rgba(0, 102, 204, 0.16);
    }

    .gallery-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center top;
        transition: transform 0.5s ease;
    }

    .gallery-card:hover img {
        transform: scale(1.05);
    }

    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(10, 25, 47, 0.0) 45%, rgba(10, 25, 47, 0.94) 100%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 1.15rem;
        color: #ffffff;
    }

    .gallery-zoom-btn {
        position: absolute;
        top: 12px;
        right: 12px;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.9);
        color: #0a192f;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        opacity: 0;
        transform: scale(0.85);
        transition: all 0.25s ease;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .gallery-card:hover .gallery-zoom-btn {
        opacity: 1;
        transform: scale(1);
    }

    /* 5. LOKASI 3 CABANG (JOGJA, SURABAYA, TASIK) */
    .branch-card {
        border-radius: 24px;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        padding: 1.75rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: all 0.25s ease;
    }

    .branch-card:hover {
        border-color: #0066cc;
        transform: translateY(-5px);
        box-shadow: 0 16px 35px rgba(0, 102, 204, 0.09);
    }

    .branch-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.35rem;
    }
</style>

<div class="ski-about-wrap">

    {{-- 1. HERO SECTION --}}
    <section class="about-hero text-center">
        <div class="container">
            <div class="ski-pill-badge mb-3">
                <i class="bi bi-building-check text-primary"></i>
                <span>TENTANG KAMI • PT SERTIFIKASI KOMPETENSI INDONESIA</span>
            </div>

            <h1 class="about-hero-title mb-3">
                Mencetak SDM Unggul & <span class="font-serif-italic text-primary" style="font-size: 1.1em;">Kompeten di Industri</span>
            </h1>

            <p class="text-secondary mx-auto col-lg-7 mb-0" style="font-size: 1.05rem; line-height: 1.75;">
                Lembaga pelatihan dan sertifikasi kompetensi kerja resmi yang berfokus pada peningkatan kualifikasi profesional K3 serta teknis industri berstandar Kemnaker RI & BNSP.
            </p>
        </div>
    </section>

    {{-- 2. PROFIL, VISI MISI & LEGALITAS (BENTO GRID) --}}
    <section class="py-5">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                {{-- Bento Profil Utama --}}
                <div class="col-lg-7">
                    <div class="bento-card d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo PT SKI" style="width: 64px; height: 64px; object-fit: contain;">
                                <div>
                                    <span class="text-primary fw-bold small text-uppercase" style="letter-spacing: 1px;">Profil Perusahaan</span>
                                    <h3 class="fw-bold mb-0" style="color: #0a192f;">PT Sertifikasi Kompetensi Indonesia</h3>
                                </div>
                            </div>

                            <p class="text-secondary mb-4" style="line-height: 1.8; text-align: justify;">
                                <strong>PT. Sertifikasi Kompetensi Indonesia (SKI)</strong> adalah lembaga yang berfokus pada pengembangan sumber daya manusia melalui sertifikasi kompetensi kerja di bidang Keselamatan dan Kesehatan Kerja (K3) serta teknis industri lainnya. Kami berkomitmen menyediakan layanan pelatihan yang berkualitas tinggi, transparan, dan sesuai dengan regulasi pemerintah (Kemnaker RI) maupun standar Badan Nasional Sertifikasi Profesi (BNSP).
                            </p>
                        </div>

                        <div class="row g-3 pt-3 border-top">
                            <div class="col-sm-4">
                                <div class="p-3 rounded-4 bg-light text-center">
                                    <div class="h3 fw-extrabold text-primary mb-0" style="font-weight: 800;">94+</div>
                                    <div class="small text-secondary fw-semibold">Skema Sertifikasi</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="p-3 rounded-4 bg-light text-center">
                                    <div class="h3 fw-extrabold text-primary mb-0" style="font-weight: 800;">3 Kota</div>
                                    <div class="small text-secondary fw-semibold">Jaringan Operasional</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="p-3 rounded-4 bg-light text-center">
                                    <div class="h3 fw-extrabold text-primary mb-0" style="font-weight: 800;">100%</div>
                                    <div class="small text-secondary fw-semibold">Resmi & Terakreditasi</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Bento Legalitas & Visi Misi --}}
                <div class="col-lg-5">
                    <div class="d-flex flex-column gap-4 h-100">
                        <div class="bento-card bento-dark">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge rounded-pill px-3 py-2 fw-bold" style="background: #d9f99d; color: #0a192f;">
                                    <i class="bi bi-shield-fill-check me-1"></i> LEGALITAS RESMI
                                </span>
                                <i class="bi bi-patch-check-fill fs-3 text-info"></i>
                            </div>
                            <div class="mb-3 pb-3 border-bottom" style="border-color: rgba(255,255,255,0.12) !important;">
                                <div class="fw-bold text-white">KEMNAKER RI</div>
                                <div class="small text-white opacity-75">PJK3 Resmi Bidang Lingkungan Kerja & Kesehatan Kerja</div>
                            </div>
                            <div>
                                <div class="fw-bold text-white">BNSP (Badan Nasional Sertifikasi Profesi)</div>
                                <div class="small text-white opacity-75">Tempat Uji Kompetensi (TUK) Mandiri Terverifikasi</div>
                            </div>
                        </div>

                        <div class="bento-card bento-softblue flex-grow-1">
                            <h5 class="fw-bold mb-2" style="color: #0a192f;">
                                <i class="bi bi-compass-fill text-primary me-2"></i>Visi & Misi Kami
                            </h5>
                            <p class="small text-secondary mb-3" style="line-height: 1.65;">
                                <strong>Visi:</strong> Menjadi pusat pengembangan kompetensi SDM unggul yang diakui secara nasional dan internasional.
                            </p>
                            <ul class="small text-secondary ps-3 mb-0" style="line-height: 1.65;">
                                <li class="mb-1">Menyelenggarakan pelatihan berbasis kompetensi yang inovatif & aplikatif.</li>
                                <li>Menjamin kualitas lulusan sertifikasi yang siap kerja, beretika, dan profesional.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 3. STRUKTUR ORGANISASI PT SKI --}}
    <section class="py-5 org-section">
        <div class="container py-2">
            <div class="text-center mb-5">
                <span class="ski-pill-badge mb-2">
                    <i class="bi bi-diagram-3-fill text-primary"></i>
                    <span>STRUKTUR ORGANISASI • PT SKI INDONESIA</span>
                </span>
                <h2 class="fw-bold mt-1" style="font-size: clamp(1.85rem, 3.2vw, 2.6rem); color: #0a192f;">
                    Struktur Organisasi <span class="font-serif-italic text-primary" style="font-size: 1.1em;">PT Sertifikasi Kompetensi Indonesia</span>
                </h2>
                <p class="text-secondary small col-lg-6 mx-auto mb-0">
                    Sinergi dewan penasihat, jajaran direksi, dan manajemen operasional dalam menghadirkan layanan sertifikasi kompetensi terbaik.
                </p>
            </div>

            {{-- LEVEL 1: ADVISOR & PRESIDENT DIRECTOR --}}
            <div class="row g-4 justify-content-center align-items-stretch">
                {{-- Advisor --}}
                <div class="col-md-6 col-lg-4">
                    <div class="org-card">
                        <div class="org-avatar-wrap">
                            <img src="{{ asset('images/rustika.png') }}" 
                                 onerror="this.onerror=null;this.src='{{ asset('images/logo.png') }}';" 
                                 alt="Prof. Dr. Rustika SKM, M.Si">
                        </div>
                        <span class="org-role-badge" style="background: #e0f2fe; color: #0369a1; border: 1px solid #bae6fd;">
                            Advisor
                        </span>
                        <h5 class="org-name">Prof. Dr. Rustika SKM, M.Si</h5>
                        <p class="org-sub">Dewan Penasihat & Pakar Kehormatan PT SKI Indonesia</p>
                    </div>
                </div>

                {{-- President Director --}}
                <div class="col-md-6 col-lg-4">
                    <div class="org-card org-card-featured">
                        <div class="org-avatar-wrap">
                            <img src="{{ asset('images/dhimas.png') }}" 
                                 onerror="this.onerror=null;this.src='{{ asset('images/PakDimas.png') }}';" 
                                 alt="Dr(c) Nct. Dimas J. Zahid A., M.K.M.">
                        </div>
                        <span class="org-role-badge" style="background: #0a192f; color: #d9f99d;">
                            President Director
                        </span>
                        <h5 class="org-name">Dr(c) Nct. Dimas J. Zahid A., M.K.M.</h5>
                        <p class="org-sub">AMK, S.Kep, MKM, CPRM, CWCCA, Grad. IOSH</p>
                    </div>
                </div>
            </div>

            {{-- Garis Konektor ke Level 2 --}}
            <div class="org-v-line d-none d-md-block"></div>

            {{-- LEVEL 2: DIREKTUR UTAMA (PAK IQBAL) --}}
            <div class="row g-4 justify-content-center mt-1 mt-md-0">
                <div class="col-md-6 col-lg-4">
                    <div class="org-card org-card-featured">
                        <div class="org-avatar-wrap">
                            <img src="{{ asset('images/iqbal.png') }}" 
                                 onerror="this.onerror=null;this.src='{{ asset('images/Pak Iqbal.jpeg') }}';" 
                                 alt="Dr(c) Iqbal Subekti, S.K.M, M.K.M.">
                        </div>
                        <span class="org-role-badge" style="background: #0066cc; color: #ffffff;">
                            Direktur Utama
                        </span>
                        <h5 class="org-name">Dr(c) Iqbal Subekti, S.K.M, M.K.M.</h5>
                        <p class="org-sub">Kepemimpinan Utama & Strategi Korporasi PT SKI Indonesia</p>
                    </div>
                </div>
            </div>

            {{-- Garis Konektor ke Level 3 --}}
            <div class="org-v-line d-none d-md-block"></div>

            {{-- LEVEL 3: DIREKTUR OPERASIONAL (PAK MUSTAKIM) --}}
            <div class="row g-4 justify-content-center mt-1 mt-md-0">
                <div class="col-md-6 col-lg-4">
                    <div class="org-card">
                        <div class="org-avatar-wrap">
                            <img src="{{ asset('images/mustakim.png') }}" 
                                 onerror="this.onerror=null;this.src='{{ asset('images/logo.png') }}';" 
                                 alt="Dr. Mustakim, S.Pd., M.Pd.">
                        </div>
                        <span class="org-role-badge" style="background: #dcfce7; color: #15803d; border: 1px solid #bbf7d0;">
                            Direktur Operasional
                        </span>
                        <h5 class="org-name">Dr. Mustakim, S.Pd., M.Pd.</h5>
                        <p class="org-sub">Manajemen Operasional Pelatihan & Regional (Gresik / Jawa Timur)</p>
                    </div>
                </div>
            </div>

            {{-- Garis Konektor Bercabang ke Level 4 --}}
            <div class="org-v-line d-none d-md-block"></div>
            <div class="org-branch-bar d-none d-md-block mb-3"></div>

            {{-- LEVEL 4: TIM MANAJEMEN & OPERASIONAL --}}
            <div class="row g-4 justify-content-center mt-1 mt-md-0">
                {{-- Nasarudin --}}
                <div class="col-md-6 col-lg-4">
                    <div class="org-card">
                        <div class="org-avatar-wrap">
                            <img src="{{ asset('images/nasar.png') }}" 
                                 onerror="this.onerror=null;this.src='{{ asset('images/logo.png') }}';" 
                                 alt="Nasarudin">
                        </div>
                        <span class="org-role-badge" style="background: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe;">
                            Manager of WEB & Social Media Operations
                        </span>
                        <h5 class="org-name">Nasarudin</h5>
                        <p class="org-sub">Pengembangan Web, Infrastruktur Digital & Publikasi Media Sosial</p>
                    </div>
                </div>

                {{-- Rosa Rohimah --}}
                <div class="col-md-6 col-lg-4">
                    <div class="org-card">
                        <div class="org-avatar-wrap">
                            <img src="{{ asset('images/rosa.png') }}" 
                                 onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name=Rosa+Rohimah&background=0066cc&color=fff&size=256&bold=true';" 
                                 alt="Rosa Rohimah">
                        </div>
                        <span class="org-role-badge" style="background: #fef3c7; color: #b45309; border: 1px solid #fde68a;">
                            Public Relations & Event Host
                        </span>
                        <h5 class="org-name">Rosa Rohimah</h5>
                        <p class="org-sub">Hubungan Masyarakat, Komunikasi Kemitraan & Pemandu Acara Pelatihan</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- 4. GALERI KEGIATAN KELAS PELATIHAN SKI (22 FOTO ASLI A-V TERACAK) --}}
    <section class="py-5 bg-white">
        <div class="container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 gap-3">
                <div>
                    <span class="ski-pill-badge mb-2">
                        <i class="bi bi-camera-fill text-primary"></i>
                        <span>REAL CLASS DOCUMENTATION • 22 ACTIVITIES</span>
                    </span>
                    <h2 class="fw-bold mb-0 mt-1" style="font-size: clamp(1.75rem, 3vw, 2.4rem); color: #0a192f;">
                        Dokumentasi Kegiatan <span class="font-serif-italic text-primary" style="font-size: 1.1em;">Kelas Pelatihan SKI</span>
                    </h2>
                </div>
                <p class="text-secondary small mb-0 col-md-5 text-md-end">
                    Dokumentasi asli kegiatan pelatihan tatap muka, kelas online Zoom, hingga pengujian kompetensi resmi bersama PT SKI Indonesia. <span class="text-primary fw-bold">(Klik foto untuk memperbesar)</span>
                </p>
            </div>
        </div>

        @php
            // BARIS 1: 11 Foto (Urutan disilang agar tidak ada kegiatan serupa yang bersebelahan)
            $galeriBaris1 = [
                [
                    'img' => asset('images/kegiatan/a.jpeg'),
                    'tag' => 'AHLI K3 UMUM & LISTRIK',
                    'title' => 'Dokumentasi Class Ahli K3 Umum & K3 Kelistrikan',
                    'loc' => 'Sertifikasi Resmi BNSP'
                ],
                [
                    'img' => asset('images/kegiatan/p.jpeg'),
                    'tag' => 'K3 KONSTRUKSI',
                    'title' => 'Dokumentasi Day 1 Pengawas K3 Konstruksi',
                    'loc' => 'Pembekalan Materi & Diskusi'
                ],
                [
                    'img' => asset('images/kegiatan/g.jpeg'),
                    'tag' => 'TRAINING OF TRAINER',
                    'title' => 'Pelatihan Training of Trainer (ToT) Sertifikasi BNSP',
                    'loc' => 'Kelas Interaktif Online'
                ],
                [
                    'img' => asset('images/kegiatan/t.jpeg'),
                    'tag' => 'KELAS FIREMAN',
                    'title' => 'Dokumentasi Class Fireman (Pemadam Kebakaran)',
                    'loc' => 'Praktik & Pembekalan Teknis'
                ],
                [
                    'img' => asset('images/kegiatan/c.jpeg'),
                    'tag' => 'KEMITRAAN INSTANSI',
                    'title' => 'Dokumentasi Bersama Dinas Pendidikan Jombang',
                    'loc' => 'Kolaborasi & Pengembangan SDM'
                ],
                [
                    'img' => asset('images/kegiatan/k.jpeg'),
                    'tag' => 'PERTAMBANGAN (POM)',
                    'title' => 'Zoom Meet Training Day 1 Pengawas Operasional Madya',
                    'loc' => 'Sertifikasi Kompetensi BNSP'
                ],
                [
                    'img' => asset('images/kegiatan/e.jpeg'),
                    'tag' => 'TKPK LEVEL 2',
                    'title' => 'Dokumentasi Pelatihan Tenaga Kerja Pada Ketinggian Level 2',
                    'loc' => 'Kelas Reguler & Praktik'
                ],
                [
                    'img' => asset('images/kegiatan/q.jpeg'),
                    'tag' => 'ASESMEN KOMPETENSI',
                    'title' => 'Dokumentasi Pengujian & Uji Kompetensi Day 3',
                    'loc' => 'TUK Mandiri PT SKI'
                ],
                [
                    'img' => asset('images/kegiatan/u.jpeg'),
                    'tag' => 'KELAS TATAP MUKA',
                    'title' => 'Dokumentasi Pelatihan Tatap Muka Day 1',
                    'loc' => 'Yogyakarta & Cabang Regional'
                ],
                [
                    'img' => asset('images/kegiatan/i.jpeg'),
                    'tag' => 'PERTAMBANGAN (POM)',
                    'title' => 'Class Training Day 2 Pengawas Operasional Madya',
                    'loc' => 'Pemaparan Kurikulum SKKNI'
                ],
                [
                    'img' => asset('images/kegiatan/n.jpeg'),
                    'tag' => 'K3 KONSTRUKSI',
                    'title' => 'Dokumentasi Day 3 Pengawas K3 Konstruksi',
                    'loc' => 'Evaluasi & Studi Kasus'
                ],
            ];

            // BARIS 2: 11 Foto Lainnya (Urutan disilang agar variatif & tidak berdempetan)
            $galeriBaris2 = [
                [
                    'img' => asset('images/kegiatan/d.jpeg'),
                    'tag' => 'TKPK LEVEL 2',
                    'title' => 'Dokumentasi Day 2 Tenaga Kerja Pada Ketinggian Level 2',
                    'loc' => 'Simulasi & Asesmen Teknis'
                ],
                [
                    'img' => asset('images/kegiatan/r.jpeg'),
                    'tag' => 'KELAS FIREMAN',
                    'title' => 'Dokumentasi Day 2 Pelatihan Fireman & Keselamatan Kebakaran',
                    'loc' => 'Sertifikasi Kompetensi BNSP'
                ],
                [
                    'img' => asset('images/kegiatan/l.jpeg'),
                    'tag' => 'TRAINING AHLI K3',
                    'title' => 'Training Ahli K3 Umum Day 2 bersama Instruktur',
                    'loc' => 'Sesi Daring & Tatap Muka'
                ],
                [
                    'img' => asset('images/kegiatan/o.jpeg'),
                    'tag' => 'K3 KONSTRUKSI',
                    'title' => 'Dokumentasi Day 2 Pengawas K3 Konstruksi',
                    'loc' => 'Pendalaman Regulasi K3'
                ],
                [
                    'img' => asset('images/kegiatan/h.jpeg'),
                    'tag' => 'RECAP CLASS',
                    'title' => 'Recap Class Pelatihan & Sertifikasi Kompetensi SKI',
                    'loc' => 'Dokumentasi Kegiatan Kelas'
                ],
                [
                    'img' => asset('images/kegiatan/v.jpeg'),
                    'tag' => 'FASILITAS PESERTA',
                    'title' => 'Dokumentasi Coffee Break & Makan Siang Peserta',
                    'loc' => 'Layanan Prima Kelas Tatap Muka'
                ],
                [
                    'img' => asset('images/kegiatan/b.jpeg'),
                    'tag' => 'AHLI K3 UMUM & LISTRIK',
                    'title' => 'Dokumentasi Class Day 2 Ahli K3 Umum & Kelistrikan',
                    'loc' => 'Sertifikasi Resmi BNSP'
                ],
                [
                    'img' => asset('images/kegiatan/j.jpeg'),
                    'tag' => 'PERTAMBANGAN (POM)',
                    'title' => 'Class Training Day 1 Pengawas Operasional Madya',
                    'loc' => 'Pembekalan Teknis Pertambangan'
                ],
                [
                    'img' => asset('images/kegiatan/s.jpeg'),
                    'tag' => 'FASILITAS KELAS',
                    'title' => 'Suasana Coffee Break & Ramah Tamah Kelas Fireman',
                    'loc' => 'Kenyamanan Peserta Pelatihan'
                ],
                [
                    'img' => asset('images/kegiatan/f.jpeg'),
                    'tag' => 'TKPK LEVEL 2',
                    'title' => 'Sesi Online Pelatihan TKPK Level 2 Sertifikasi BNSP',
                    'loc' => 'Pembelajaran Interaktif'
                ],
                [
                    'img' => asset('images/kegiatan/m.jpeg'),
                    'tag' => 'K3 KONSTRUKSI',
                    'title' => 'Sesi Presentasi & Diskusi Pengawas K3 Konstruksi',
                    'loc' => 'Uji Kompetensi TUK SKI'
                ],
            ];
        @endphp

        {{-- Marquee Baris 1 (Gerak ke Kiri) --}}
        <div class="gallery-track-wrap mb-3">
            <div class="gallery-track-left">
                @foreach(array_merge($galeriBaris1, $galeriBaris1) as $item)
                <div class="gallery-card" onclick="openSkiGalleryModal('{{ $item['img'] }}', '{{ $item['title'] }}', '{{ $item['tag'] }}')">
                    <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" loading="lazy">
                    <div class="gallery-zoom-btn">
                        <i class="bi bi-arrows-angle-expand"></i>
                    </div>
                    <div class="gallery-overlay">
                        <span class="badge rounded-pill align-self-start mb-2" style="background: rgba(56, 189, 248, 0.95); color: #0a192f; font-size: 0.66rem; font-weight: 800;">
                            {{ $item['tag'] }}
                        </span>
                        <h6 class="fw-bold text-white mb-1" style="font-size: 0.92rem; line-height: 1.35;">{{ $item['title'] }}</h6>
                        <div class="small text-white opacity-75" style="font-size: 0.74rem;">
                            <i class="bi bi-check2-circle text-info me-1"></i>{{ $item['loc'] }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Marquee Baris 2 (Gerak ke Kanan) --}}
        <div class="gallery-track-wrap">
            <div class="gallery-track-right">
                @foreach(array_merge($galeriBaris2, $galeriBaris2) as $item)
                <div class="gallery-card" onclick="openSkiGalleryModal('{{ $item['img'] }}', '{{ $item['title'] }}', '{{ $item['tag'] }}')">
                    <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" loading="lazy">
                    <div class="gallery-zoom-btn">
                        <i class="bi bi-arrows-angle-expand"></i>
                    </div>
                    <div class="gallery-overlay">
                        <span class="badge rounded-pill align-self-start mb-2" style="background: #d9f99d; color: #0a192f; font-size: 0.66rem; font-weight: 800;">
                            {{ $item['tag'] }}
                        </span>
                        <h6 class="fw-bold text-white mb-1" style="font-size: 0.92rem; line-height: 1.35;">{{ $item['title'] }}</h6>
                        <div class="small text-white opacity-75" style="font-size: 0.74rem;">
                            <i class="bi bi-check2-circle text-info me-1"></i>{{ $item['loc'] }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- MODAL POPUP PREVIEW FOTO DOKUMENTASI --}}
    <div class="modal fade" id="skiGalleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg" style="background: #0a192f;">
                <div class="modal-header border-0 pb-0">
                    <div>
                        <span id="skiModalTag" class="badge rounded-pill px-3 py-1 fw-bold mb-1" style="background: #38bdf8; color: #0a192f; font-size: 0.72rem;"></span>
                        <h6 id="skiModalTitle" class="modal-title fw-bold text-white mb-0"></h6>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-3">
                    <img id="skiModalImg" src="" alt="Preview Dokumentasi" class="img-fluid rounded-3" style="max-height: 78vh; object-fit: contain;">
                </div>
            </div>
        </div>
    </div>

    {{-- 5. JARINGAN LOKASI KANTOR (YOGYAKARTA, SURABAYA, TASIKMALAYA) --}}
    <section class="py-5" style="background: #f8fafc;">
        <div class="container">
            <div class="text-center mb-5">
                <span class="ski-pill-badge mb-2">
                    <i class="bi bi-geo-alt-fill text-primary"></i>
                    <span>OUR OFFICE NETWORK</span>
                </span>
                <h2 class="fw-bold mt-1" style="font-size: clamp(1.75rem, 3vw, 2.5rem); color: #0a192f;">
                    Hadir di <span class="font-serif-italic text-primary" style="font-size: 1.1em;">3 Kota Strategis</span>
                </h2>
                <p class="text-secondary small col-lg-6 mx-auto mb-0">
                    Jangkauan layanan operasional dan koordinasi pelatihan PT Sertifikasi Kompetensi Indonesia di Yogyakarta, Surabaya, dan Tasikmalaya.
                </p>
            </div>

            <div class="row g-4">
                {{-- 1. Yogyakarta (Kantor Pusat) --}}
                <div class="col-lg-4">
                    <div class="branch-card">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="branch-icon" style="background: #eff6ff; color: #0066cc;">
                                    <i class="bi bi-building-fill-check"></i>
                                </div>
                                <span class="badge bg-primary rounded-pill px-3 py-2 fw-bold">KANTOR PUSAT • JOGJA</span>
                            </div>
                            <h5 class="fw-bold mb-2" style="color: #0a192f;">Yogyakarta (DIY)</h5>
                            <p class="text-secondary small mb-3" style="line-height: 1.7;">
                                <strong>Hotel Nirvana Inn Wahid Hasyim</strong><br>
                                Jl. Wahid Hasyim No.60A, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281.
                            </p>
                        </div>
                        <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                            <span class="small fw-semibold text-success"><i class="bi bi-circle-fill me-1" style="font-size: 0.5rem;"></i>Operasional Aktif</span>
                            <a href="{{ route('info.contact') }}" class="btn btn-sm btn-light border rounded-pill fw-bold px-3">
                                Lihat Peta <i class="bi bi-arrow-up-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- 2. Surabaya --}}
                <div class="col-lg-4">
                    <div class="branch-card">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="branch-icon" style="background: #f0fdf4; color: #16a34a;">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </div>
                                <span class="badge bg-success bg-opacity-10 text-success border border-success rounded-pill px-3 py-2 fw-bold">REGIONAL JAWA TIMUR</span>
                            </div>
                            <h5 class="fw-bold mb-2" style="color: #0a192f;">Surabaya</h5>
                            <p class="text-secondary small mb-3" style="line-height: 1.7;">
                                <strong>Layanan Perwakilan & In-House Jawa Timur</strong><br>
                                Melayani koordinasi kelas reguler, uji kompetensi TUK, serta pelatihan korporasi untuk wilayah industri Surabaya, Gresik, Sidoarjo & sekitarnya.
                            </p>
                        </div>
                        <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                            <span class="small fw-semibold text-primary"><i class="bi bi-whatsapp me-1"></i>Koordinasi Cabang</span>
                            <a href="https://wa.me/6289514692974?text={{ urlencode('Halo Admin SKI, saya ingin menanyakan jadwal pelatihan/layanan cabang Surabaya.') }}" target="_blank" class="btn btn-sm btn-light border rounded-pill fw-bold px-3">
                                Hubungi Tim <i class="bi bi-arrow-up-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- 3. Tasikmalaya --}}
                <div class="col-lg-4">
                    <div class="branch-card">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="branch-icon" style="background: #fef3c7; color: #d97706;">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </div>
                                <span class="badge bg-warning bg-opacity-15 text-dark border border-warning rounded-pill px-3 py-2 fw-bold">REGIONAL JAWA BARAT</span>
                            </div>
                            <h5 class="fw-bold mb-2" style="color: #0a192f;">Tasikmalaya</h5>
                            <p class="text-secondary small mb-3" style="line-height: 1.7;">
                                <strong>Layanan Perwakilan & In-House Jawa Barat</strong><br>
                                Melayani pendampingan pendaftaran sertifikasi K3, kemitraan instansi/kampus, serta kelas pelatihan wilayah Tasikmalaya & Priangan Timur.
                            </p>
                        </div>
                        <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                            <span class="small fw-semibold text-primary"><i class="bi bi-whatsapp me-1"></i>Koordinasi Cabang</span>
                            <a href="https://wa.me/6289514692974?text={{ urlencode('Halo Admin SKI, saya ingin menanyakan jadwal pelatihan/layanan cabang Tasikmalaya.') }}" target="_blank" class="btn btn-sm btn-light border rounded-pill fw-bold px-3">
                                Hubungi Tim <i class="bi bi-arrow-up-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<script>
    function openSkiGalleryModal(imgSrc, title, tag) {
        const modalEl = document.getElementById('skiGalleryModal');
        document.getElementById('skiModalImg').src = imgSrc;
        document.getElementById('skiModalTitle').textContent = title;
        document.getElementById('skiModalTag').textContent = tag;
        const modal = new bootstrap.Modal(modalEl);
        modal.show();
    }
</script>
@endsection