@extends('layouts.app')

@section('title', 'Panduan Pendaftaran')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    .ski-guide-wrap {
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
    .guide-hero {
        margin-top: -5.5rem;
        padding: 8.5rem 0 4rem;
        background: 
            radial-gradient(circle at 15% 20%, rgba(56, 189, 248, 0.25) 0%, transparent 45%),
            radial-gradient(circle at 85% 25%, rgba(0, 120, 212, 0.18) 0%, transparent 50%),
            linear-gradient(180deg, #dbeafe 0%, #eff6ff 65%, #f8fafc 100%);
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

    /* 2. STEP ROADMAP CARDS */
    .step-roadmap-card {
        background: #ffffff;
        border: 1.5px solid #e2e8f0;
        border-radius: 26px;
        padding: 1.85rem 1.5rem;
        height: 100%;
        position: relative;
        transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.04);
    }

    .step-roadmap-card:hover {
        border-color: #38bdf8;
        transform: translateY(-6px);
        box-shadow: 0 18px 36px rgba(0, 102, 204, 0.1);
    }

    .step-number-pill {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.35rem 0.85rem;
        border-radius: 999px;
        background: #0a192f;
        color: #d9f99d;
        font-weight: 800;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
    }

    .step-icon-circle {
        width: 56px;
        height: 56px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin: 1.15rem 0;
    }

    /* 3. DOCUMENT CHECKLIST BENTO */
    .doc-bento-wrap {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 28px;
        padding: 2.25rem;
        box-shadow: 0 12px 32px rgba(15, 23, 42, 0.04);
    }

    .doc-item-card {
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 20px;
        padding: 1.25rem;
        height: 100%;
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        transition: all 0.25s ease;
    }

    .doc-item-card:hover {
        background: #eff6ff;
        border-color: #93c5fd;
    }

    .doc-icon-badge {
        width: 44px;
        height: 44px;
        border-radius: 14px;
        background: #dbeafe;
        color: #0066cc;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    /* 4. MODERN FAQ ACCORDION */
    .ski-faq .accordion-item {
        border: 1px solid #e2e8f0;
        border-radius: 18px !important;
        margin-bottom: 0.85rem;
        overflow: hidden;
        background: #ffffff;
    }

    .ski-faq .accordion-button {
        font-weight: 700;
        color: #0a192f;
        padding: 1.15rem 1.35rem;
        background: #ffffff;
        box-shadow: none !important;
    }

    .ski-faq .accordion-button:not(.collapsed) {
        color: #0066cc;
        background: #f8fafc;
    }
</style>

<div class="ski-guide-wrap pb-5">

    {{-- 1. HERO HEADER --}}
    <section class="guide-hero text-center">
        <div class="container">
            <div class="ski-pill-badge mb-3">
                <i class="bi bi-compass-fill text-primary"></i>
                <span>REGISTRATION GUIDE • PT SKI INDONESIA</span>
            </div>
            <h1 class="fw-bold mb-3" style="font-size: clamp(2.1rem, 4vw, 3.3rem); color: #0a192f;">
                Panduan Mudah <span class="font-serif-italic text-primary" style="font-size: 1.1em;">Pendaftaran Sertifikasi</span>
            </h1>
            <p class="text-secondary col-lg-6 mx-auto mb-0" style="font-size: 1.02rem; line-height: 1.7;">
                Ikuti 4 langkah terstruktur di bawah ini untuk memulai pembinaan dan uji kompetensi resmi bersama PT Sertifikasi Kompetensi Indonesia.
            </p>
        </div>
    </section>

    <section class="container">

        {{-- 2. 4 LANGKAH PENDAFTARAN --}}
        <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-3">
                <div class="step-roadmap-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="step-number-pill">LANGKAH 01</span>
                        <i class="bi bi-arrow-right text-muted d-none d-lg-block"></i>
                    </div>
                    <div class="step-icon-circle" style="background: #eff6ff; color: #0066cc;">
                        <i class="bi bi-search-heart-fill"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Pilih Skema</h5>
                    <p class="small text-secondary mb-0" style="line-height: 1.65;">
                        Telusuri 94+ skema sertifikasi resmi BNSP atau Kemnaker RI di menu <strong>Pelatihan</strong> yang sesuai dengan bidang kerja Anda.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="step-roadmap-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="step-number-pill">LANGKAH 02</span>
                        <i class="bi bi-arrow-right text-muted d-none d-lg-block"></i>
                    </div>
                    <div class="step-icon-circle" style="background: #f0fdf4; color: #16a34a;">
                        <i class="bi bi-ui-checks"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Isi Form Online</h5>
                    <p class="small text-secondary mb-0" style="line-height: 1.65;">
                        Klik tombol <strong>Daftar Online</strong>, lengkapi biodata peserta, instansi/perusahaan, serta unggah berkas persyaratan awal.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="step-roadmap-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="step-number-pill">LANGKAH 03</span>
                        <i class="bi bi-arrow-right text-muted d-none d-lg-block"></i>
                    </div>
                    <div class="step-icon-circle" style="background: #fef3c7; color: #d97706;">
                        <i class="bi bi-whatsapp"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Verifikasi Admin</h5>
                    <p class="small text-secondary mb-0" style="line-height: 1.65;">
                        Tim Admin SKI akan memverifikasi dokumen Anda dan mengirimkan informasi jadwal kelas serta instruksi pembayaran via WhatsApp.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="step-roadmap-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="step-number-pill" style="background: #0066cc; color: #ffffff;">LANGKAH 04</span>
                        <i class="bi bi-patch-check-fill text-primary"></i>
                    </div>
                    <div class="step-icon-circle" style="background: #e0f2fe; color: #0284c7;">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Ikuti Pelatihan & Ujian</h5>
                    <p class="small text-secondary mb-0" style="line-height: 1.65;">
                        Ikuti sesi pembekalan materi bersama instruktur ahli dan laksanakan asesmen uji kompetensi hingga sertifikat diterbitkan.
                    </p>
                </div>
            </div>
        </div>

        {{-- 3. CHECKLIST PERSYARATAN DOKUMEN & FAQ --}}
        <div class="row g-4 align-items-stretch">
            {{-- Checklist Dokumen --}}
            <div class="col-lg-7">
                <div class="doc-bento-wrap h-100">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
                        <div>
                            <span class="text-primary fw-bold small text-uppercase" style="letter-spacing: 1px;">Document Checklist</span>
                            <h4 class="fw-bold mb-0" style="color: #0a192f;">Persyaratan Umum Berkas</h4>
                        </div>
                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 fw-bold">
                            Format: PDF / JPG / PNG
                        </span>
                    </div>

                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="doc-item-card">
                                <div class="doc-icon-badge">
                                    <i class="bi bi-mortarboard-fill"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Scan Ijazah Terakhir</h6>
                                    <p class="small text-secondary mb-0">Minimal SMA/SMK atau D3/S1 menyesuaikan persyaratan skema yang dipilih.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="doc-item-card">
                                <div class="doc-icon-badge">
                                    <i class="bi bi-person-vcard-fill"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Scan KTP Asli</h6>
                                    <p class="small text-secondary mb-0">Identitas resmi yang masih berlaku untuk sinkronisasi nomor induk sertifikat.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="doc-item-card">
                                <div class="doc-icon-badge">
                                    <i class="bi bi-camera-fill"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Pas Foto Formal</h6>
                                    <p class="small text-secondary mb-0">Pas foto berwarna terbaru dengan latar belakang (background) warna merah.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="doc-item-card">
                                <div class="doc-icon-badge">
                                    <i class="bi bi-file-earmark-person-fill"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">CV / Surat Pengalaman</h6>
                                    <p class="small text-secondary mb-0">Daftar Riwayat Hidup (CV) atau Surat Keterangan Kerja bagi utusan perusahaan.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 p-3 rounded-4 d-flex align-items-center justify-content-between flex-wrap gap-3" style="background: #0a192f; color: #ffffff;">
                        <div class="d-flex align-items-center gap-3">
                            <i class="bi bi-check2-all fs-3" style="color: #d9f99d;"></i>
                            <div>
                                <div class="fw-bold small">Berkas Anda Sudah Siap?</div>
                                <div class="small opacity-75">Proses pengisian formulir online hanya membutuhkan waktu ±3 menit.</div>
                            </div>
                        </div>
                        <a href="{{ route('register.form') }}" class="btn rounded-pill px-4 py-2 fw-bold btn-sm" style="background: #d9f99d; color: #0a192f;">
                            Isi Formulir Sekarang <i class="bi bi-arrow-up-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Pertanyaan Umum (FAQ) --}}
            <div class="col-lg-5">
                <div class="doc-bento-wrap h-100">
                    <span class="text-primary fw-bold small text-uppercase" style="letter-spacing: 1px;">FAQ Peserta</span>
                    <h4 class="fw-bold mb-4" style="color: #0a192f;">Pertanyaan Populer</h4>

                    <div class="accordion ski-faq" id="guideFaqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Apakah lulusan baru (Fresh Graduate) bisa mendaftar?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#guideFaqAccordion">
                                <div class="accordion-body small text-secondary" style="line-height: 1.65;">
                                    Bisa! Sebagian besar skema seperti <strong>Ahli K3 Umum, K3 Konstruksi, Migas, dan Lingkungan</strong> dapat diikuti oleh Fresh Graduate maupun mahasiswa tingkat akhir untuk bekal melamar kerja.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Bagaimana jika ada dokumen yang menyusul?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#guideFaqAccordion">
                                <div class="accordion-body small text-secondary" style="line-height: 1.65;">
                                    Anda tetap dapat mengisi formulir pendaftaran online terlebih dahulu untuk mengamankan kuota. Kekurangan berkas dapat dilengkapi dengan dibantu oleh Admin kami sebelum hari ujian.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Berapa lama proses terbit sertifikat?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#guideFaqAccordion">
                                <div class="accordion-body small text-secondary" style="line-height: 1.65;">
                                    Setelah peserta dinyatakan <strong>Kompeten</strong> pada sesi asesmen, proses pencetakan sertifikat di BNSP/Kemnaker diproses sesuai antrean resmi dan dapat dipantau langsung melalui Admin SKI.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-2 text-center">
                        <a href="https://wa.me/6289514692974?text={{ urlencode('Halo Admin PT. SKI, saya ingin bertanya mengenai panduan pendaftaran sertifikasi.') }}" 
                           target="_blank" 
                           class="btn btn-outline-primary rounded-pill w-100 py-2 fw-bold">
                            <i class="bi bi-whatsapp me-2"></i>Tanya Admin via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
@endsection