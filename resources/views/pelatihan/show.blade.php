@extends('layouts.app')

@section('title', $pelatihan['title'] . ' - Detail Sertifikasi')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    .ski-detail-wrap {
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
    .detail-hero {
        margin-top: -5.5rem;
        padding: 8.5rem 0 4rem;
        background: 
            radial-gradient(circle at 80% 20%, rgba(56, 189, 248, 0.22) 0%, transparent 45%),
            radial-gradient(circle at 15% 80%, rgba(0, 102, 204, 0.25) 0%, transparent 50%),
            linear-gradient(135deg, #0a192f 0%, #0f294a 60%, #004694 100%);
        color: #ffffff;
        position: relative;
        overflow: hidden;
    }

    .breadcrumb-modern {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.45rem 1rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        font-size: 0.8rem;
        margin-bottom: 1.25rem;
    }

    .breadcrumb-modern a {
        color: #bae6fd;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.2s;
    }

    .breadcrumb-modern a:hover {
        color: #ffffff;
    }

    .detail-title {
        font-size: clamp(1.9rem, 3.6vw, 3rem);
        font-weight: 800;
        line-height: 1.18;
        letter-spacing: -0.02em;
        color: #ffffff;
    }

    .hero-meta-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.16);
        padding: 0.5rem 1rem;
        border-radius: 999px;
        font-size: 0.84rem;
        font-weight: 600;
        color: #f8fafc;
    }

    /* 2. CONTENT BENTO CARDS */
    .detail-bento-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 26px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
        margin-bottom: 1.5rem;
    }

    .section-icon-box {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.35rem;
        flex-shrink: 0;
    }

    /* MATERI / KURIKULUM ITEMS */
    .materi-item-card {
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 18px;
        padding: 1rem 1.15rem;
        height: 100%;
        display: flex;
        align-items: flex-start;
        gap: 0.85rem;
        transition: all 0.25s ease;
    }

    .materi-item-card:hover {
        background: #eff6ff;
        border-color: #93c5fd;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 102, 204, 0.07);
    }

    .materi-num-badge {
        width: 30px;
        height: 30px;
        border-radius: 10px;
        background: #0066cc;
        color: #ffffff;
        font-weight: 800;
        font-size: 0.78rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        margin-top: 2px;
    }

    /* BENEFIT & SYARAT */
    .benefit-check-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 1rem;
        border-radius: 14px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        font-size: 0.9rem;
        font-weight: 600;
        color: #1e293b;
    }

    /* 3. STICKY SIDEBAR & POSTER */
    .sticky-sidebar-wrap {
        position: sticky;
        top: 6rem;
    }

    .enrollment-card {
        background: #ffffff;
        border: 1.5px solid #cbd5e1;
        border-radius: 28px;
        padding: 1.75rem;
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.07);
    }

    .spec-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 0;
        border-bottom: 1px dashed #e2e8f0;
        font-size: 0.9rem;
    }

    .spec-row:last-child {
        border-bottom: none;
    }

    .btn-enroll-primary {
        background: linear-gradient(135deg, #0066cc 0%, #004c99 100%);
        color: #ffffff !important;
        font-weight: 800;
        border-radius: 999px;
        padding: 0.9rem 1.5rem;
        border: none;
        box-shadow: 0 10px 24px rgba(0, 102, 204, 0.25);
        transition: all 0.25s ease;
    }

    .btn-enroll-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 28px rgba(0, 102, 204, 0.35);
    }

    .btn-enroll-wa {
        background: #f0fdf4;
        color: #15803d !important;
        border: 1.5px solid #86efac;
        font-weight: 800;
        border-radius: 999px;
        padding: 0.85rem 1.5rem;
        transition: all 0.25s ease;
    }

    .btn-enroll-wa:hover {
        background: #16a34a;
        color: #ffffff !important;
        border-color: #16a34a;
    }

    .poster-showcase-card {
        background: #0a192f;
        border-radius: 26px;
        padding: 0.85rem;
        color: #ffffff;
        box-shadow: 0 14px 32px rgba(10, 25, 47, 0.16);
        cursor: pointer;
        transition: transform 0.25s ease;
    }

    .poster-showcase-card:hover {
        transform: translateY(-4px);
    }

    .poster-showcase-card img {
        border-radius: 18px;
        width: 100%;
        height: auto;
        display: block;
    }
</style>

<div class="ski-detail-wrap pb-5">

    {{-- 1. HERO HEADER --}}
    <section class="detail-hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <div class="breadcrumb-modern">
                        <a href="{{ route('home') }}"><i class="bi bi-house-door me-1"></i>Beranda</a>
                        <span class="opacity-50">/</span>
                        <a href="{{ route('pelatihan.index') }}">Katalog Pelatihan</a>
                        <span class="opacity-50">/</span>
                        <span class="text-white fw-bold text-truncate" style="max-width: 220px;">{{ $pelatihan['title'] }}</span>
                    </div>

                    <div class="mb-2">
                        <span class="badge rounded-pill px-3 py-1 fw-bold me-2" style="background: #d9f99d; color: #0a192f; font-size: 0.75rem;">
                            <i class="bi bi-patch-check-fill me-1"></i> SERTIFIKASI RESMI BNSP
                        </span>
                        <span class="badge rounded-pill px-3 py-1 fw-semibold" style="background: rgba(56, 189, 248, 0.2); color: #7dd3fc; font-size: 0.75rem;">
                            Standar SKKNI Nasional
                        </span>
                    </div>

                    <h1 class="detail-title mb-3">
                        {{ $pelatihan['title'] }}
                    </h1>

                    <p class="text-white opacity-80 mb-4" style="font-size: 1.02rem; line-height: 1.7; max-width: 680px;">
                        Program pembinaan dan uji kompetensi resmi untuk mencetak tenaga ahli profesional yang diakui secara nasional oleh Badan Nasional Sertifikasi Profesi (BNSP).
                    </p>

                    <div class="d-flex flex-wrap gap-2">
                        <div class="hero-meta-pill">
                            <i class="bi bi-clock-history text-info"></i>
                            <span>Durasi: <strong>{{ $pelatihan['durasi'] }}</strong></span>
                        </div>
                        <div class="hero-meta-pill">
                            <i class="bi bi-laptop text-warning"></i>
                            <span>Metode: <strong>Blended / Online & Tatap Muka</strong></span>
                        </div>
                        <div class="hero-meta-pill">
                            <i class="bi bi-award text-success"></i>
                            <span>Lisensi: <strong>Sertifikat Kompetensi BNSP</strong></span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 d-none d-lg-block">
                    <div class="p-3 rounded-4" style="background: rgba(255,255,255,0.08); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.15);">
                        <img src="{{ $pelatihan['image'] ?? asset('images/logo.png') }}" 
                             alt="{{ $pelatihan['title'] }}" 
                             class="img-fluid rounded-4 w-100" 
                             style="height: 220px; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. MAIN CONTENT & SIDEBAR --}}
    <section class="container mt-4 pt-2">
        <div class="row g-4">
            {{-- KOLOM KIRI: DESKRIPSI, KURIKULUM, SYARAT --}}
            <div class="col-lg-8">

                {{-- Card 1: Deskripsi Program --}}
                <div class="detail-bento-card">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="section-icon-box" style="background: #eff6ff; color: #0066cc;">
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                        <div>
                            <span class="text-primary fw-bold small text-uppercase" style="letter-spacing: 1px;">Overview Skema</span>
                            <h4 class="fw-bold mb-0" style="color: #0a192f;">Deskripsi Program</h4>
                        </div>
                    </div>

                    <p class="text-secondary mb-3" style="line-height: 1.8; text-align: justify;">
                        Program sertifikasi <strong>{{ $pelatihan['title'] }}</strong> dirancang secara komprehensif untuk membekali peserta dengan pengetahuan teknis, analisis keselamatan, serta keterampilan manajerial sesuai Standar Kompetensi Kerja Nasional Indonesia (SKKNI).
                    </p>
                    <p class="text-secondary mb-0" style="line-height: 1.8; text-align: justify;">
                        Melalui bimbingan instruktur praktisi dan asesmen di Tempat Uji Kompetensi (TUK) <strong>PT Sertifikasi Kompetensi Indonesia</strong>, lulusan program ini akan memperoleh bukti pengakuan kompetensi negara yang valid untuk menunjang jenjang karir maupun pemenuhan tender dan audit kepatuhan perusahaan.
                    </p>
                </div>

                {{-- Card 2: Kurikulum & Materi Pelatihan --}}
                <div class="detail-bento-card">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="section-icon-box" style="background: #f0fdf4; color: #16a34a;">
                                <i class="bi bi-journal-bookmark-fill"></i>
                            </div>
                            <div>
                                <span class="text-success fw-bold small text-uppercase" style="letter-spacing: 1px;">Silabus SKKNI</span>
                                <h4 class="fw-bold mb-0" style="color: #0a192f;">Unit Kompetensi & Materi</h4>
                            </div>
                        </div>
                        <span class="badge bg-light text-dark border rounded-pill px-3 py-2 fw-bold">
                            {{ count($pelatihan['materi']) }} Modul Utama
                        </span>
                    </div>

                    <div class="row g-3">
                        @foreach($pelatihan['materi'] as $materi)
                        <div class="col-md-6">
                            <div class="materi-item-card">
                                <div class="materi-num-badge">{{ $loop->iteration }}</div>
                                <div>
                                    <div class="fw-bold text-dark" style="font-size: 0.94rem; line-height: 1.45;">
                                        {{ $materi }}
                                    </div>
                                    <small class="text-muted" style="font-size: 0.76rem;">Standar Unit Kompetensi BNSP</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Card 3: Fasilitas & Persyaratan Peserta --}}
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="detail-bento-card h-100 mb-0">
                            <h5 class="fw-bold mb-3" style="color: #0a192f;">
                                <i class="bi bi-stars text-primary me-2"></i>Fasilitas Peserta
                            </h5>
                            <div class="d-flex flex-column gap-2">
                                <div class="benefit-check-item">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <span>Sertifikat Resmi BNSP (Jika Kompeten)</span>
                                </div>
                                <div class="benefit-check-item">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <span>E-Modul Materi & Regulasi K3 Terbaru</span>
                                </div>
                                <div class="benefit-check-item">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <span>Pendampingan Pemberkasan APL-01 & 02</span>
                                </div>
                                <div class="benefit-check-item">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <span>Grup Diskusi & Jejaring Alumni SKI</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="detail-bento-card h-100 mb-0">
                            <h5 class="fw-bold mb-3" style="color: #0a192f;">
                                <i class="bi bi-file-earmark-check-fill text-primary me-2"></i>Berkas Persyaratan
                            </h5>
                            <div class="d-flex flex-column gap-2">
                                <div class="benefit-check-item">
                                    <i class="bi bi-file-person text-primary"></i>
                                    <span>Scan KTP & CV / Daftar Riwayat Hidup</span>
                                </div>
                                <div class="benefit-check-item">
                                    <i class="bi bi-mortarboard text-primary"></i>
                                    <span>Scan Ijazah Terakhir (Min. SMA/SMK/D3/S1)</span>
                                </div>
                                <div class="benefit-check-item">
                                    <i class="bi bi-camera text-primary"></i>
                                    <span>Pas Foto Berwarna Background Merah</span>
                                </div>
                                <div class="benefit-check-item">
                                    <i class="bi bi-building text-primary"></i>
                                    <span>Surat Keterangan Kerja / Portofolio (Opsional)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- KOLOM KANAN: STICKY RINGKASAN & POSTER RESMI --}}
            <div class="col-lg-4">
                <div class="sticky-sidebar-wrap">

                    {{-- Box Pendaftaran --}}
                    <div class="enrollment-card mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 fw-bold">
                                PENDAFTARAN DIBUKA
                            </span>
                            <span class="small text-success fw-bold">
                                <i class="bi bi-circle-fill me-1" style="font-size: 0.5rem;"></i>Kuota Tersedia
                            </span>
                        </div>

                        <h5 class="fw-bold text-dark mb-3">Ringkasan Skema</h5>

                        <div class="mb-4">
                            <div class="spec-row">
                                <span class="text-secondary"><i class="bi bi-clock me-2 text-primary"></i>Durasi Pelatihan</span>
                                <span class="fw-bold text-dark">{{ $pelatihan['durasi'] }}</span>
                            </div>
                            <div class="spec-row">
                                <span class="text-secondary"><i class="bi bi-patch-check me-2 text-primary"></i>Lembaga Sertifikasi</span>
                                <span class="fw-bold text-dark">BNSP RI</span>
                            </div>
                            <div class="spec-row">
                                <span class="text-secondary"><i class="bi bi-person-workspace me-2 text-primary"></i>Pendidikan Min.</span>
                                <span class="fw-bold text-dark">SMA / SMK / Sederajat</span>
                            </div>
                            <div class="spec-row">
                                <span class="text-secondary"><i class="bi bi-geo-alt me-2 text-primary"></i>Lokasi Ujian</span>
                                <span class="fw-bold text-dark">Online / TUK SKI</span>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="{{ route('register.form', ['skema' => $pelatihan['title']]) }}" 
                               class="btn btn-enroll-primary text-decoration-none text-center">
                                <i class="bi bi-pencil-square me-2"></i>DAFTAR SEKARANG
                            </a>

                            <a href="https://wa.me/6289514692974?text={{ urlencode('Halo Admin PT. SKI, saya tertarik mendaftar skema ' . $pelatihan['title'] . '. Mohon info jadwal dan biayanya.') }}" 
                               target="_blank" 
                               class="btn btn-enroll-wa text-decoration-none text-center">
                                <i class="bi bi-whatsapp me-2"></i>TANYA JADWAL & KUOTA
                            </a>
                        </div>
                    </div>

                    {{-- Poster Resmi dengan Lightbox --}}
                    <div class="poster-showcase-card" data-bs-toggle="modal" data-bs-target="#posterPreviewModal">
                        <div class="d-flex justify-content-between align-items-center px-2 py-2">
                            <span class="small fw-bold text-uppercase" style="letter-spacing: 1px; color: #d9f99d;">
                                <i class="bi bi-image me-1"></i> Poster Resmi Skema
                            </span>
                            <span class="small text-white opacity-75">
                                <i class="bi bi-zoom-in me-1"></i>Perbesar
                            </span>
                        </div>
                        <img src="{{ $pelatihan['poster'] }}" 
                             onerror="this.onerror=null;this.src='{{ $pelatihan['image'] }}';" 
                             alt="Poster {{ $pelatihan['title'] }}">
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

{{-- MODAL ZOOM POSTER --}}
<div class="modal fade" id="posterPreviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 overflow-hidden" style="background: #0a192f;">
            <div class="modal-header border-0">
                <h6 class="modal-title fw-bold text-white">{{ $pelatihan['title'] }}</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-3">
                <img src="{{ $pelatihan['poster'] }}" 
                     onerror="this.onerror=null;this.src='{{ $pelatihan['image'] }}';" 
                     class="img-fluid rounded-3" 
                     style="max-height: 82vh;" 
                     alt="Poster {{ $pelatihan['title'] }}">
            </div>
        </div>
    </div>
</div>
@endsection