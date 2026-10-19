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

    /* 3. STRUKTUR ORGANISASI */
    .org-section {
        background: #f8fafc;
        border-top: 1px solid #e2e8f0;
        border-bottom: 1px solid #e2e8f0;
    }

    .leader-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 28px;
        padding: 1.75rem;
        text-align: center;
        height: 100%;
        position: relative;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(15, 23, 42, 0.04);
    }

    .leader-card:hover {
        border-color: #93c5fd;
        transform: translateY(-6px);
        box-shadow: 0 18px 35px rgba(0, 102, 204, 0.1);
    }

    .leader-avatar-wrap {
        width: 155px;
        height: 155px;
        margin: 0 auto 1.25rem;
        border-radius: 50%;
        padding: 5px;
        background: linear-gradient(135deg, #0066cc 0%, #38bdf8 100%);
        box-shadow: 0 10px 25px rgba(0, 102, 204, 0.2);
    }

    .leader-avatar-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
        border-radius: 50%;
        border: 4px solid #ffffff;
        background: #ffffff;
    }

    .org-connector-line {
        width: 2px;
        height: 36px;
        background: #cbd5e1;
        margin: 0 auto;
    }

    .division-pill-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 1.25rem;
        height: 100%;
        transition: all 0.25s ease;
    }

    .division-pill-card:hover {
        border-color: #0066cc;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.06);
    }

    /* 4. GALERI KEGIATAN KELAS (AUTO-SLIDE & BENTO) */
    .gallery-track-wrap {
        overflow: hidden;
        position: relative;
        padding: 0.5rem 0;
    }

    .gallery-track {
        display: flex;
        gap: 1.25rem;
        width: max-content;
        animation: scrollGallery 32s linear infinite;
    }

    .gallery-track-wrap:hover .gallery-track {
        animation-play-state: paused;
    }

    @keyframes scrollGallery {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    .gallery-card {
        width: 330px;
        height: 230px;
        border-radius: 22px;
        overflow: hidden;
        position: relative;
        flex-shrink: 0;
        border: 1px solid #e2e8f0;
        background: #0a192f;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.06);
    }

    .gallery-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.45s ease;
    }

    .gallery-card:hover img {
        transform: scale(1.07);
    }

    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(10, 25, 47, 0.05) 25%, rgba(10, 25, 47, 0.9) 100%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 1.15rem;
        color: #ffffff;
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
                                    <div class="h3 fw-extrabold text-primary mb-0" style="font-weight: 800;">25+</div>
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
                    <span>EXECUTIVE LEADERSHIP & ORGANIZATION</span>
                </span>
                <h2 class="fw-bold mt-1" style="font-size: clamp(1.75rem, 3vw, 2.5rem); color: #0a192f;">
                    Struktur Organisasi <span class="font-serif-italic text-primary" style="font-size: 1.1em;">PT SKI Indonesia</span>
                </h2>
                <p class="text-secondary small col-lg-6 mx-auto mb-0">
                    Dipimpin oleh praktisi berpengalaman di bidang Keselamatan dan Kesehatan Kerja (K3), manajemen risiko, serta pengembangan kompetensi SDM.
                </p>
            </div>

            {{-- Top Level: Dewan Direksi --}}
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="leader-card">
                        <div class="leader-avatar-wrap">
                            <img src="{{ asset('images/Pak Dimas.jpeg') }}" 
                                 onerror="this.onerror=null;this.src='{{ asset('images/PakDimas.png') }}';" 
                                 alt="Dimas Julian Zahid A">
                        </div>
                        <span class="badge rounded-pill px-3 py-2 fw-bold mb-2" style="background: #0a192f; color: #d9f99d;">
                            PRESIDEN DIREKTUR
                        </span>
                        <h5 class="fw-bold mb-1" style="color: #0a192f;">Dimas Julian Zahid A</h5>
                        <p class="small text-primary fw-semibold mb-2">AMK, S.Kep, MKM, CPRM, CWCCA, Grad. IOSH</p>
                        <p class="small text-secondary mb-0">
                            Bertanggung jawab atas arah kebijakan strategis, kemitraan nasional, dan penjaminan mutu sertifikasi PT SKI Indonesia.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5">
                    <div class="leader-card">
                        <div class="leader-avatar-wrap">
                            <img src="{{ asset('images/Pak Iqbal.jpeg') }}" 
                                 onerror="this.onerror=null;this.src='{{ asset('images/logo.png') }}';" 
                                 alt="Iqbal Subekti">
                        </div>
                        <span class="badge bg-primary rounded-pill px-3 py-2 fw-bold mb-2">
                            DIREKTUR OPERASIONAL
                        </span>
                        <h5 class="fw-bold mb-1" style="color: #0a192f;">Iqbal Subekti</h5>
                        <p class="small text-primary fw-semibold mb-2">S.K.M., MKM</p>
                        <p class="small text-secondary mb-0">
                            Memimpin pelaksanaan operasional pelatihan, koordinasi Tempat Uji Kompetensi (TUK), serta kurikulum instruktur & asesor.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Garis Konektor Hierarki --}}
            <div class="org-connector-line d-none d-md-block"></div>

            {{-- Second Level: Divisi Fungsional --}}
            <div class="row g-3 mt-1 justify-content-center">
                <div class="col-sm-6 col-lg-3">
                    <div class="division-pill-card text-center">
                        <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-inline-flex align-items-center justify-content-center mb-3" style="width: 48px; height: 48px;">
                            <i class="bi bi-mortarboard-fill fs-5"></i>
                        </div>
                        <h6 class="fw-bold mb-1" style="color: #0a192f;">Divisi Akademik & TUK</h6>
                        <p class="text-secondary small mb-0">Manajemen Kurikulum SKKNI, Asesor & Pelaksanaan Ujian BNSP/Kemnaker</p>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="division-pill-card text-center">
                        <div class="rounded-circle bg-info bg-opacity-10 text-primary d-inline-flex align-items-center justify-content-center mb-3" style="width: 48px; height: 48px;">
                            <i class="bi bi-people-fill fs-5"></i>
                        </div>
                        <h6 class="fw-bold mb-1" style="color: #0a192f;">Layanan Peserta & Sertifikasi</h6>
                        <p class="text-secondary small mb-0">Pendampingan Pemberkasan Peserta, Administrasi & Distribusi Sertifikat</p>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="division-pill-card text-center">
                        <div class="rounded-circle bg-warning bg-opacity-10 text-warning d-inline-flex align-items-center justify-content-center mb-3" style="width: 48px; height: 48px;">
                            <i class="bi bi-briefcase-fill fs-5"></i>
                        </div>
                        <h6 class="fw-bold mb-1" style="color: #0a192f;">Kemitraan & In-House</h6>
                        <p class="text-secondary small mb-0">Kerja Sama Pelatihan Korporasi, Instansi & Hubungan Antar Lembaga</p>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="division-pill-card text-center">
                        <div class="rounded-circle bg-success bg-opacity-10 text-success d-inline-flex align-items-center justify-content-center mb-3" style="width: 48px; height: 48px;">
                            <i class="bi bi-laptop-fill fs-5"></i>
                        </div>
                        <h6 class="fw-bold mb-1" style="color: #0a192f;">IT & Digital Media</h6>
                        <p class="text-secondary small mb-0">Sistem Informasi Kehadiran, LMS Pembelajaran & Publikasi Digital</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 4. GALERI KEGIATAN KELAS PELATIHAN SKI --}}
    <section class="py-5 bg-white">
        <div class="container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 gap-3">
                <div>
                    <span class="ski-pill-badge mb-2">
                        <i class="bi bi-camera-fill text-primary"></i>
                        <span>TRAINING CLASS ACTIVITIES</span>
                    </span>
                    <h2 class="fw-bold mb-0 mt-1" style="font-size: clamp(1.75rem, 3vw, 2.4rem); color: #0a192f;">
                        Dokumentasi Kegiatan <span class="font-serif-italic text-primary" style="font-size: 1.1em;">Kelas Pelatihan SKI</span>
                    </h2>
                </div>
                <p class="text-secondary small mb-0 col-md-5 text-md-end">
                    Suasana pembekalan materi, praktik lapangan, dan asesmen uji kompetensi bersama peserta dari berbagai sektor industri.
                </p>
            </div>
        </div>

        @php
            $galeriKegiatan = [
                [
                    'img' => asset('images/foto skema/k3umum.png'),
                    'fallback' => 'https://images.pexels.com/photos/1216589/pexels-photo-1216589.jpeg?auto=compress&cs=tinysrgb&w=800',
                    'tag' => 'KELAS PEMBINAAN',
                    'title' => 'Pelatihan & Praktik Lapangan Ahli K3 Umum',
                    'loc' => 'Yogyakarta & Online Zoom'
                ],
                [
                    'img' => asset('Poster/2.png'),
                    'fallback' => 'https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&w=800',
                    'tag' => 'AUDIT & ASESMEN',
                    'title' => 'Studi Kasus & Simulasi Auditor SMK3',
                    'loc' => 'Kelas Reguler & Korporasi'
                ],
                [
                    'img' => asset('Poster/3.png'),
                    'fallback' => 'https://images.pexels.com/photos/257700/pexels-photo-257700.jpeg?auto=compress&cs=tinysrgb&w=800',
                    'tag' => 'SEKTOR MIGAS',
                    'title' => 'Pembekalan Teknis Pengawas K3 Industri Migas',
                    'loc' => 'Sertifikasi Resmi BNSP'
                ],
                [
                    'img' => asset('Poster/4.png'),
                    'fallback' => 'https://images.pexels.com/photos/8961065/pexels-photo-8961065.jpeg?auto=compress&cs=tinysrgb&w=800',
                    'tag' => 'PRAKTIK ALAT UJI',
                    'title' => 'Simulasi Pengukuran Gas Berbahaya (Authorized Gas Tester)',
                    'loc' => 'Praktik Langsung Instruktur'
                ],
                [
                    'img' => asset('Poster/6.png'),
                    'fallback' => 'https://images.pexels.com/photos/3862130/pexels-photo-3862130.jpeg?auto=compress&cs=tinysrgb&w=800',
                    'tag' => 'KESELAMATAN KHUSUS',
                    'title' => 'Prosedur Keselamatan Kerja Ruang Terbatas (Confined Space)',
                    'loc' => 'Uji Kompetensi TUK SKI'
                ],
                [
                    'img' => asset('Poster/7.png'),
                    'fallback' => 'https://images.pexels.com/photos/159306/construction-site-build-construction-work-159306.jpeg?auto=compress&cs=tinysrgb&w=800',
                    'tag' => 'KONSTRUKSI & TEKNIS',
                    'title' => 'Inspeksi & Keselamatan Pengawas Perancah (Scaffolding)',
                    'loc' => 'Sertifikasi Kompetensi BNSP'
                ],
            ];
        @endphp

        {{-- Auto-Sliding Marquee Dokumentasi --}}
        <div class="gallery-track-wrap">
            <div class="gallery-track">
                @foreach(array_merge($galeriKegiatan, $galeriKegiatan) as $item)
                <div class="gallery-card">
                    <img src="{{ $item['img'] }}" 
                         alt="{{ $item['title'] }}" 
                         loading="lazy"
                         onerror="this.onerror=null;this.src='{{ $item['fallback'] }}';">
                    <div class="gallery-overlay">
                        <span class="badge rounded-pill align-self-start mb-2" style="background: rgba(56, 189, 248, 0.95); color: #0a192f; font-size: 0.68rem; font-weight: 800;">
                            {{ $item['tag'] }}
                        </span>
                        <h6 class="fw-bold text-white mb-1" style="font-size: 0.95rem; line-height: 1.35;">{{ $item['title'] }}</h6>
                        <div class="small text-white opacity-75" style="font-size: 0.76rem;">
                            <i class="bi bi-geo-alt-fill text-info me-1"></i>{{ $item['loc'] }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

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
@endsection