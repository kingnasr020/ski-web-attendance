@extends('layouts.app')

@section('title', $title)

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    .ski-program-wrap {
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #0f172a;
        background-color: #f8fafc;
        min-height: 100vh;
    }

    .font-serif-italic {
        font-family: 'Instrument Serif', Georgia, serif;
        font-style: italic;
        font-weight: 400;
    }

    /* 1. HERO HEADER */
    .program-hero {
        margin-top: -5.5rem;
        padding: 8.5rem 0 4.5rem;
        background: 
            radial-gradient(circle at 82% 22%, rgba(56, 189, 248, 0.25) 0%, transparent 45%),
            radial-gradient(circle at 18% 75%, rgba(0, 102, 204, 0.28) 0%, transparent 50%),
            linear-gradient(135deg, #0a192f 0%, #0f294a 55%, #004694 100%);
        color: #ffffff;
        position: relative;
        overflow: hidden;
    }

    .program-pill-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.45rem 1.1rem;
        border-radius: 999px;
        background: rgba(217, 249, 157, 0.16);
        border: 1px solid rgba(217, 249, 157, 0.4);
        color: #d9f99d;
        font-size: 0.78rem;
        font-weight: 800;
        letter-spacing: 0.04em;
    }

    .program-hero-title {
        font-size: clamp(2.2rem, 4.2vw, 3.5rem);
        font-weight: 800;
        line-height: 1.14;
        letter-spacing: -0.03em;
        color: #ffffff;
    }

    /* BINGKAI GAMBAR BNSP.PNG & KEMNAKER.JPG */
    .hero-glass-frame {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 28px;
        padding: 1.15rem;
        box-shadow: 0 24px 48px rgba(0, 0, 0, 0.25);
    }

    .hero-img-stage {
        background: #ffffff;
        border-radius: 20px;
        height: 270px;
        padding: 1.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        box-shadow: inset 0 2px 10px rgba(15, 23, 42, 0.04);
    }

    .hero-img-stage img {
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
        transition: transform 0.35s ease;
    }

    .hero-glass-frame:hover .hero-img-stage img {
        transform: scale(1.04);
    }

    /* 2. BENTO CARDS */
    .prog-bento-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 26px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
        margin-bottom: 1.5rem;
    }

    .prog-feature-mini {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 1.35rem;
        height: 100%;
        transition: all 0.25s ease;
    }

    .prog-feature-mini:hover {
        background: #eff6ff;
        border-color: #93c5fd;
        transform: translateY(-4px);
    }

    .prog-icon-box {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.35rem;
        margin-bottom: 0.85rem;
    }

    /* 3. KURIKULUM LIST */
    .curriculum-pill-item {
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 18px;
        padding: 1rem 1.2rem;
        display: flex;
        align-items: center;
        gap: 0.9rem;
        height: 100%;
        transition: all 0.25s ease;
    }

    .curriculum-pill-item:hover {
        border-color: #0066cc;
        background: #ffffff;
        box-shadow: 0 8px 20px rgba(0, 102, 204, 0.07);
    }

    .curr-check-icon {
        width: 32px;
        height: 32px;
        border-radius: 10px;
        background: #dbeafe;
        color: #0066cc;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        flex-shrink: 0;
    }

    /* 4. ALUR PROSES SERTIFIKASI */
    .flow-step-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 1.25rem;
        height: 100%;
        position: relative;
        transition: all 0.25s ease;
    }

    .flow-step-box:hover {
        border-color: #38bdf8;
        background: #ffffff;
        transform: translateY(-3px);
    }

    .flow-step-num {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: #0a192f;
        color: #d9f99d;
        font-weight: 800;
        font-size: 0.82rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 0.75rem;
    }

    /* 5. STICKY SIDEBAR */
    .sticky-prog-sidebar {
        position: sticky;
        top: 6rem;
    }

    .facility-item-row {
        display: flex;
        align-items: center;
        gap: 0.9rem;
        padding: 0.85rem 1rem;
        border-radius: 16px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        margin-bottom: 0.65rem;
    }

    .btn-lime-cta {
        background: #d9f99d;
        color: #0a192f !important;
        font-weight: 800;
        border-radius: 999px;
        padding: 0.85rem 1.75rem;
        border: none;
        transition: all 0.25s ease;
    }

    .btn-lime-cta:hover {
        background: #bef264;
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(190, 242, 100, 0.3);
    }
</style>

@php
    $isKemnaker = str_contains(strtolower($title), 'kemnaker');
    $programLogo = $isKemnaker ? asset('images/kemnaker.jpg') : asset('images/bnsp.png');
@endphp

<div class="ski-program-wrap pb-5">

    {{-- 1. HERO HEADER --}}
    <section class="program-hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="program-pill-badge mb-3">
                        <i class="bi bi-stars"></i>
                        <span>PROGRAM UNGGULAN • PT SKI INDONESIA</span>
                    </div>

                    <h1 class="program-hero-title text-uppercase mb-3">
                        {{ $title }}
                    </h1>

                    <p class="text-white opacity-85 mb-4" style="font-size: 1.08rem; line-height: 1.75;">
                        {{ $desc }}
                    </p>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('register.form') }}" class="btn-lime-cta text-decoration-none d-inline-flex align-items-center gap-2">
                            <i class="bi bi-pencil-square"></i>
                            <span>Daftar Sekarang</span>
                        </a>
                        <a href="{{ route('pelatihan.index') }}" class="btn btn-outline-light rounded-pill px-4 py-3 fw-bold">
                            <i class="bi bi-grid-1x2 me-2"></i>Lihat 25 Skema
                        </a>
                    </div>
                </div>

                {{-- KANAN: MENAMPILKAN GAMBAR MANUAL (bnsp.png / kemnaker.jpg) --}}
                <div class="col-lg-5">
                    <div class="hero-glass-frame">
                        <div class="hero-img-stage">
                            <img src="{{ $programLogo }}" 
                                 onerror="this.onerror=null;this.src='{{ asset('images/logo.png') }}';" 
                                 alt="{{ $title }}">
                        </div>

                        <div class="d-flex justify-content-between align-items-center pt-3 px-2 text-white">
                            <div>
                                <span class="small opacity-75 d-block" style="font-size: 0.75rem;">Standar Kurikulum</span>
                                <span class="fw-bold small">SKKNI & Regulasi Nasional</span>
                            </div>
                            <span class="badge rounded-pill px-3 py-2 fw-bold" style="background: #0066cc;">
                                <i class="bi bi-patch-check-fill me-1"></i>Terverifikasi
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. MAIN CONTENT & SIDEBAR --}}
    <section class="container mt-5" id="info">
        <div class="row g-4">

            {{-- KOLOM KIRI (8 KOLOM) --}}
            <div class="col-lg-8">

                {{-- Bento 1: Deskripsi & Nilai Tambah --}}
                <div class="prog-bento-card">
                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 fw-bold mb-2">
                        <i class="bi bi-book-half me-1"></i> OVERVIEW PROGRAM
                    </span>
                    <h3 class="fw-bold mb-3" style="color: #0a192f;">Tentang {{ $title }}</h3>
                    <p class="text-secondary mb-4" style="line-height: 1.85; text-align: justify; font-size: 1.02rem;">
                        {{ $content }}
                    </p>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="prog-feature-mini">
                                <div class="prog-icon-box" style="background: #dbeafe; color: #0066cc;">
                                    <i class="bi bi-shield-fill-check"></i>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">Legalitas Negara</h6>
                                <p class="small text-secondary mb-0">Diakui resmi untuk syarat tender, audit SMK3, dan kepatuhan industri nasional.</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="prog-feature-mini">
                                <div class="prog-icon-box" style="background: #dcfce7; color: #16a34a;">
                                    <i class="bi bi-person-vcard-fill"></i>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">Asesor & Praktisi</h6>
                                <p class="small text-secondary mb-0">Dibimbing langsung oleh instruktur senior dan asesor kompetensi berlisensi resmi.</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="prog-feature-mini">
                                <div class="prog-icon-box" style="background: #fef3c7; color: #d97706;">
                                    <i class="bi bi-laptop-fill"></i>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">Metode Fleksibel</h6>
                                <p class="small text-secondary mb-0">Tersedia kelas Online via Zoom, Blended Learning, maupun In-House perusahaan.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Bento 2: Materi & Kompetensi Utama --}}
                <div class="prog-bento-card">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
                        <div>
                            <span class="text-primary fw-bold small text-uppercase" style="letter-spacing: 1px;">Cakupan Pembelajaran</span>
                            <h4 class="fw-bold mb-0" style="color: #0a192f;">Materi & Kompetensi yang Dipelajari</h4>
                        </div>
                        <span class="badge bg-light text-dark border rounded-pill px-3 py-2 fw-bold">
                            Berbasis SKKNI
                        </span>
                    </div>

                    <div class="row g-3">
                        @foreach($curriculum as $materi)
                        <div class="col-md-6">
                            <div class="curriculum-pill-item">
                                <div class="curr-check-icon">
                                    <i class="bi bi-check-lg fw-bold"></i>
                                </div>
                                <div class="fw-bold text-dark" style="font-size: 0.94rem; line-height: 1.4;">
                                    {{ $materi }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Bento 3: Alur Tahapan Sertifikasi di PT SKI --}}
                <div class="prog-bento-card">
                    <span class="text-primary fw-bold small text-uppercase" style="letter-spacing: 1px;">Standard Procedure</span>
                    <h4 class="fw-bold mb-4" style="color: #0a192f;">4 Tahap Pelaksanaan Sertifikasi</h4>

                    <div class="row g-3">
                        <div class="col-sm-6 col-md-3">
                            <div class="flow-step-box">
                                <div class="flow-step-num">01</div>
                                <h6 class="fw-bold text-dark mb-1">Pemberkasan</h6>
                                <p class="small text-secondary mb-0">Verifikasi syarat peserta & pengisian form APL-01 / APL-02.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="flow-step-box">
                                <div class="flow-step-num">02</div>
                                <h6 class="fw-bold text-dark mb-1">Pembekalan</h6>
                                <p class="small text-secondary mb-0">Pemaparan materi, studi kasus & simulasi bersama instruktur.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="flow-step-box">
                                <div class="flow-step-num">03</div>
                                <h6 class="fw-bold text-dark mb-1">Uji Kompetensi</h6>
                                <p class="small text-secondary mb-0">Ujian tertulis, observasi & wawancara bersama Asesor/Penguji.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="flow-step-box">
                                <div class="flow-step-num">04</div>
                                <h6 class="fw-bold text-dark mb-1">Sertifikat</h6>
                                <p class="small text-secondary mb-0">Penerbitan sertifikat & kartu lisensi resmi bagi yang kompeten.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Bento 4: Perbandingan Singkat BNSP vs Kemnaker RI --}}
                <div class="prog-bento-card mb-0">
                    <h4 class="fw-bold mb-3" style="color: #0a192f;">
                        <i class="bi bi-arrow-left-right text-primary me-2"></i>Perbedaan Sertifikasi BNSP & Kemnaker RI
                    </h4>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle mb-0" style="border-radius: 16px; overflow: hidden;">
                            <thead style="background: #0a192f; color: #ffffff;">
                                <tr>
                                    <th class="py-3 px-3">Aspek</th>
                                    <th class="py-3 px-3">Sertifikasi BNSP</th>
                                    <th class="py-3 px-3">Pembinaan Kemnaker RI</th>
                                </tr>
                            </thead>
                            <tbody class="small">
                                <tr>
                                    <td class="fw-bold px-3 py-3 bg-light">Penerbit Lisensi</td>
                                    <td class="px-3 py-3">Badan Nasional Sertifikasi Profesi (BNSP)</td>
                                    <td class="px-3 py-3">Kementerian Ketenagakerjaan RI</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold px-3 py-3 bg-light">Fokus Utama</td>
                                    <td class="px-3 py-3">Pengakuan kompetensi keahlian profesi berbasis SKKNI</td>
                                    <td class="px-3 py-3">Penunjukan personel K3 wajib di tempat kerja sesuai UU No. 1/1970</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold px-3 py-3 bg-light">Masa Berlaku</td>
                                    <td class="px-3 py-3">3 Tahun (Dapat diperpanjang / Re-sertifikasi)</td>
                                    <td class="px-3 py-3">3 Tahun (Sertifikat + SKP & Kartu Kewenangan)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            {{-- KOLOM KANAN: STICKY FASILITAS & CTA (4 KOLOM) --}}
            <div class="col-lg-4">
                <div class="sticky-prog-sidebar">
                    <div class="prog-bento-card mb-4" id="daftar">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold text-dark mb-0">Fasilitas Peserta</h5>
                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1 fw-bold">All-In</span>
                        </div>

                        <div class="mb-4">
                            <div class="facility-item-row">
                                <i class="bi bi-award-fill text-warning fs-4"></i>
                                <div>
                                    <div class="fw-bold text-dark small">Sertifikat Resmi</div>
                                    <div class="text-secondary" style="font-size: 0.76rem;">Terdaftar resmi di sistem negara</div>
                                </div>
                            </div>
                            <div class="facility-item-row">
                                <i class="bi bi-person-badge-fill text-primary fs-4"></i>
                                <div>
                                    <div class="fw-bold text-dark small">Kartu Lisensi / Kewenangan</div>
                                    <div class="text-secondary" style="font-size: 0.76rem;">Bukti identitas profesi personel</div>
                                </div>
                            </div>
                            <div class="facility-item-row">
                                <i class="bi bi-journal-richtext text-danger fs-4"></i>
                                <div>
                                    <div class="fw-bold text-dark small">Modul & Training Kit</div>
                                    <div class="text-secondary" style="font-size: 0.76rem;">Materi regulasi & latihan studi kasus</div>
                                </div>
                            </div>
                            <div class="facility-item-row mb-0">
                                <i class="bi bi-cup-hot-fill text-success fs-4"></i>
                                <div>
                                    <div class="fw-bold text-dark small">Coffee Break & Lunch</div>
                                    <div class="text-secondary" style="font-size: 0.76rem;">Khusus pelaksanaan kelas tatap muka</div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 rounded-4 mb-3 text-center" style="background: #eff6ff; border: 1px dashed #93c5fd;">
                            <span class="small fw-bold text-primary d-block">
                                <i class="bi bi-lightning-charge-fill me-1"></i>Kuota Batch Bulan Ini Terbatas!
                            </span>
                            <small class="text-secondary">Amankan kursi pelatihan Anda sekarang.</small>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="{{ route('register.form') }}" class="btn btn-primary rounded-pill py-3 fw-bold shadow-sm" style="background: #0066cc; border-color: #0066cc;">
                                <i class="bi bi-rocket-takeoff me-2"></i>DAFTAR SEKARANG
                            </a>
                            <a href="https://wa.me/6289514692974?text={{ urlencode('Halo Admin PT. SKI, saya ingin berkonsultasi mengenai program ' . $title) }}" 
                               target="_blank" 
                               class="btn btn-light border rounded-pill py-3 fw-bold text-success">
                                <i class="bi bi-whatsapp me-2"></i>Konsultasi via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
@endsection