@extends('layouts.app')

@section('title', 'Formulir Pendaftaran Sertifikasi')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    .ski-reg-wrap {
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
    .reg-hero {
        margin-top: -5.5rem;
        padding: 8.5rem 0 3.5rem;
        background: 
            radial-gradient(circle at 18% 20%, rgba(56, 189, 248, 0.25) 0%, transparent 45%),
            radial-gradient(circle at 82% 25%, rgba(0, 120, 212, 0.18) 0%, transparent 50%),
            linear-gradient(180deg, #dbeafe 0%, #eff6ff 65%, #f8fafc 100%);
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

    .reg-hero-title {
        font-size: clamp(2rem, 3.8vw, 3.1rem);
        font-weight: 800;
        line-height: 1.15;
        letter-spacing: -0.03em;
        color: #0a192f;
    }

    /* 2. STEP INDICATOR BAR */
    .reg-step-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 22px;
        padding: 1rem 1.5rem;
        box-shadow: 0 8px 25px rgba(15, 23, 42, 0.03);
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .reg-step-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .reg-step-num {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        background: #eff6ff;
        color: #0066cc;
        font-weight: 800;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1.5px solid #bfdbfe;
    }

    .reg-step-item.active .reg-step-num {
        background: #0a192f;
        color: #d9f99d;
        border-color: #0a192f;
    }

    /* 3. FORM BENTO SECTIONS */
    .form-bento-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 26px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
        margin-bottom: 1.5rem;
        transition: border-color 0.25s ease;
    }

    .form-bento-card:focus-within {
        border-color: #93c5fd;
        box-shadow: 0 14px 35px rgba(0, 102, 204, 0.07);
    }

    .section-badge-num {
        width: 36px;
        height: 36px;
        border-radius: 12px;
        background: #eff6ff;
        color: #0066cc;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        flex-shrink: 0;
    }

    /* MODERN INPUTS */
    .ski-label {
        font-size: 0.84rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.45rem;
        display: block;
    }

    .ski-input-group {
        position: relative;
        display: flex;
        align-items: center;
    }

    .ski-input-icon {
        position: absolute;
        left: 16px;
        color: #64748b;
        font-size: 1.05rem;
        pointer-events: none;
        transition: color 0.2s ease;
    }

    .ski-input,
    .ski-select {
        width: 100%;
        padding: 0.78rem 1rem 0.78rem 2.8rem;
        border-radius: 16px;
        border: 1.5px solid #e2e8f0;
        background-color: #f8fafc;
        font-size: 0.94rem;
        font-weight: 500;
        color: #0f172a;
        transition: all 0.2s ease;
    }

    .ski-input:focus,
    .ski-select:focus {
        outline: none;
        background-color: #ffffff;
        border-color: #0066cc;
        box-shadow: 0 0 0 4px rgba(0, 102, 204, 0.1);
    }

    .ski-input-group:focus-within .ski-input-icon {
        color: #0066cc;
    }

    /* 4. INTERACTIVE FILE UPLOAD BOX */
    .upload-zone-card {
        border: 1.5px dashed #cbd5e1;
        border-radius: 18px;
        padding: 1.15rem;
        background: #f8fafc;
        transition: all 0.25s ease;
        position: relative;
        height: 100%;
    }

    .upload-zone-card:hover {
        border-color: #0066cc;
        background: #eff6ff;
    }

    .upload-zone-card.has-file {
        border-style: solid;
        border-color: #16a34a;
        background: #f0fdf4;
    }

    .upload-icon-circle {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        color: #0066cc;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .upload-zone-card.has-file .upload-icon-circle {
        background: #dcfce7;
        border-color: #86efac;
        color: #15803d;
    }

    .file-status-text {
        font-size: 0.76rem;
        color: #64748b;
        margin-top: 0.35rem;
        display: block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .upload-zone-card.has-file .file-status-text {
        color: #15803d;
        font-weight: 700;
    }

    /* 5. SUBMIT BUTTON & SIDEBAR */
    .btn-submit-ski {
        background: linear-gradient(135deg, #0066cc 0%, #004694 100%);
        color: #ffffff !important;
        font-weight: 800;
        font-size: 1rem;
        border-radius: 999px;
        padding: 1rem 2rem;
        border: none;
        box-shadow: 0 12px 28px rgba(0, 102, 204, 0.25);
        transition: all 0.25s ease;
    }

    .btn-submit-ski:hover {
        transform: translateY(-2px);
        box-shadow: 0 16px 34px rgba(0, 102, 204, 0.35);
    }

    .sticky-reg-sidebar {
        position: sticky;
        top: 6rem;
    }

    .sidebar-dark-card {
        background: linear-gradient(145deg, #0a192f 0%, #0f294a 100%);
        color: #ffffff;
        border-radius: 26px;
        padding: 1.85rem;
        box-shadow: 0 18px 38px rgba(10, 25, 47, 0.16);
    }
</style>

@php
    $selectedSkema = request('skema') ?? old('certification_type');
    $errorList = $errors->all();
@endphp

<div class="ski-reg-wrap pb-5">

    {{-- 1. HERO HEADER --}}
    <section class="reg-hero text-center">
        <div class="container">
            <div class="ski-pill-badge mb-3">
                <i class="bi bi-person-plus-fill text-primary"></i>
                <span>ONLINE REGISTRATION PORTAL • PT SKI INDONESIA</span>
            </div>
            <h1 class="reg-hero-title mb-2">
                Formulir Pendaftaran <span class="font-serif-italic text-primary" style="font-size: 1.1em;">Sertifikasi Resmi</span>
            </h1>
            <p class="text-secondary col-lg-6 mx-auto mb-0" style="font-size: 1rem; line-height: 1.7;">
                Lengkapi biodata peserta dan unggah dokumen persyaratan di bawah ini untuk mengikuti pembinaan serta uji kompetensi BNSP / Kemnaker RI.
            </p>
        </div>
    </section>

    <section class="container">
        {{-- ALERT SUKSES --}}
        @if(session('success'))
            <div class="alert border-0 rounded-4 p-4 mb-4 shadow-sm d-flex align-items-center justify-content-between" style="background: #dcfce7; color: #14532d;" role="alert">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center flex-shrink-0" style="width: 42px; height: 42px;">
                        <i class="bi bi-check-lg fs-5"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0">Pendaftaran Berhasil Dikirim!</h6>
                        <span class="small">{{ session('success') }}</span>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- ALERT ERROR VALIDASI --}}
        @if(count($errorList) > 0)
            <div class="alert alert-danger border-0 rounded-4 p-4 mb-4 shadow-sm" role="alert">
                <h6 class="fw-bold mb-2"><i class="bi bi-exclamation-triangle-fill me-2"></i>Mohon periksa kembali isian Anda:</h6>
                <div class="small">
                    {!! implode('<br>• ', $errorList) !!}
                </div>
            </div>
        @endif

        {{-- STEP PROGRESS BAR --}}
        <div class="reg-step-bar">
            <div class="reg-step-item active">
                <div class="reg-step-num">01</div>
                <div>
                    <div class="fw-bold small text-dark">Biodata & Instansi</div>
                    <div class="text-muted" style="font-size: 0.74rem;">Identitas resmi peserta</div>
                </div>
            </div>
            <i class="bi bi-chevron-right text-muted d-none d-md-block"></i>
            <div class="reg-step-item active">
                <div class="reg-step-num">02</div>
                <div>
                    <div class="fw-bold small text-dark">Pilih Skema Kompetensi</div>
                    <div class="text-muted" style="font-size: 0.74rem;">25 Skema BNSP & Kemnaker</div>
                </div>
            </div>
            <i class="bi bi-chevron-right text-muted d-none d-md-block"></i>
            <div class="reg-step-item active">
                <div class="reg-step-num">03</div>
                <div>
                    <div class="fw-bold small text-dark">Unggah Berkas</div>
                    <div class="text-muted" style="font-size: 0.74rem;">Ijazah, KTP & Pas Foto</div>
                </div>
            </div>
            <i class="bi bi-chevron-right text-muted d-none d-md-block"></i>
            <div class="reg-step-item">
                <div class="reg-step-num"><i class="bi bi-whatsapp"></i></div>
                <div>
                    <div class="fw-bold small text-dark">Verifikasi Admin</div>
                    <div class="text-muted" style="font-size: 0.74rem;">Konfirmasi jadwal via WA</div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            {{-- KOLOM KIRI: FORMULIR UTAMA (8 KOLOM) --}}
            <div class="col-lg-8">
                <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data" id="skiRegistrationForm">
                    @csrf

                    {{-- BAGIAN 1: DATA PRIBADI --}}
                    <div class="form-bento-card">
                        <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                            <div class="section-badge-num">
                                <i class="bi bi-person-vcard-fill"></i>
                            </div>
                            <div>
                                <span class="text-primary fw-bold text-uppercase" style="font-size: 0.72rem; letter-spacing: 1px;">Langkah 1 dari 4</span>
                                <h5 class="fw-bold mb-0" style="color: #0a192f;">Data Pribadi Peserta</h5>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-12">
                                <label class="ski-label">Nama Lengkap & Gelar (Untuk Pencetakan Sertifikat) <span class="text-danger">*</span></label>
                                <div class="ski-input-group">
                                    <i class="bi bi-person ski-input-icon"></i>
                                    <input type="text" name="full_name" value="{{ old('full_name') }}" class="ski-input" placeholder="Contoh: Budi Santoso, S.T., M.K.M." required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="ski-label">Alamat Email Aktif <span class="text-danger">*</span></label>
                                <div class="ski-input-group">
                                    <i class="bi bi-envelope ski-input-icon"></i>
                                    <input type="email" name="email" value="{{ old('email') }}" class="ski-input" placeholder="nama@email.com" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="ski-label">Nomor WhatsApp Aktif <span class="text-danger">*</span></label>
                                <div class="ski-input-group">
                                    <i class="bi bi-whatsapp ski-input-icon"></i>
                                    <input type="number" name="phone" value="{{ old('phone') }}" class="ski-input" placeholder="Contoh: 081234567890" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- BAGIAN 2: DATA PEKERJAAN / INSTANSI --}}
                    <div class="form-bento-card">
                        <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                            <div class="section-badge-num" style="background: #f0fdf4; color: #16a34a;">
                                <i class="bi bi-building-fill"></i>
                            </div>
                            <div>
                                <span class="text-success fw-bold text-uppercase" style="font-size: 0.72rem; letter-spacing: 1px;">Langkah 2 dari 4</span>
                                <h5 class="fw-bold mb-0" style="color: #0a192f;">Data Pekerjaan / Instansi</h5>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="ski-label">Asal Perusahaan / Kampus / Umum <span class="text-danger">*</span></label>
                                <div class="ski-input-group">
                                    <i class="bi bi-buildings ski-input-icon"></i>
                                    <input type="text" name="company" value="{{ old('company') }}" class="ski-input" placeholder="PT. Maju Jaya / Umum (Personal)" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="ski-label">Jabatan / Profesi Saat Ini <span class="text-danger">*</span></label>
                                <div class="ski-input-group">
                                    <i class="bi bi-briefcase ski-input-icon"></i>
                                    <input type="text" name="position" value="{{ old('position') }}" class="ski-input" placeholder="HSE Officer / Fresh Graduate / Mahasiswa" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- BAGIAN 3: PILIH SKEMA SERTIFIKASI --}}
                    <div class="form-bento-card">
                        <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                            <div class="section-badge-num" style="background: #fef3c7; color: #d97706;">
                                <i class="bi bi-award-fill"></i>
                            </div>
                            <div>
                                <span class="text-warning fw-bold text-uppercase" style="font-size: 0.72rem; letter-spacing: 1px;">Langkah 3 dari 4</span>
                                <h5 class="fw-bold mb-0" style="color: #0a192f;">Pilih Skema Sertifikasi (PT SKI Indonesia)</h5>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-12">
                                <label class="ski-label">Skema Sertifikasi Kompetensi yang Diambil <span class="text-danger">*</span></label>
                                <div class="ski-input-group">
                                    <i class="bi bi-check2-square ski-input-icon"></i>
                                    <select name="certification_type" id="certificationSelect" class="form-select ski-select" required>
                                        <option value="" disabled {{ empty($selectedSkema) ? 'selected' : '' }}>-- Silakan Pilih Skema Kompetensi --</option>

                                        <optgroup label="Umum, Manajemen & Migas">
                                            <option value="Ahli K3 Umum" {{ $selectedSkema == 'Ahli K3 Umum' ? 'selected' : '' }}>1. Ahli K3 Umum</option>
                                            <option value="Auditor SMK3" {{ $selectedSkema == 'Auditor SMK3' ? 'selected' : '' }}>2. Auditor SMK3</option>
                                            <option value="Pengawas K3 Industri Migas" {{ $selectedSkema == 'Pengawas K3 Industri Migas' ? 'selected' : '' }}>3. Pengawas K3 Industri Migas</option>
                                            <option value="AGT" {{ $selectedSkema == 'AGT' ? 'selected' : '' }}>4. AGT (Authorized Gas Tester)</option>
                                            <option value="Penanganan Bahaya Gas H2S" {{ $selectedSkema == 'Penanganan Bahaya Gas H2S' ? 'selected' : '' }}>5. Penanganan Bahaya Gas H2S</option>
                                            <option value="Operator K3" {{ $selectedSkema == 'Operator K3' ? 'selected' : '' }}>6. Operator K3</option>
                                            <option value="Petugas K3" {{ $selectedSkema == 'Petugas K3' ? 'selected' : '' }}>7. Petugas K3</option>
                                        </optgroup>

                                        <optgroup label="Kesehatan, Lab & Higiene">
                                            <option value="Pengawasan K3 RS & Fasyankes" {{ $selectedSkema == 'Pengawasan K3 RS & Fasyankes' ? 'selected' : '' }}>8. Pengawasan K3 RS & Fasyankes</option>
                                            <option value="Pengawasan K3 Lab" {{ $selectedSkema == 'Pengawasan K3 Lab' ? 'selected' : '' }}>9. Pengawasan K3 Lab</option>
                                            <option value="HAZOPS" {{ $selectedSkema == 'HAZOPS' ? 'selected' : '' }}>10. HAZOPS</option>
                                            <option value="Petugas P3K" {{ $selectedSkema == 'Petugas P3K' ? 'selected' : '' }}>11. Petugas P3K (First Aid)</option>
                                            <option value="Investigasi Kecelakaan" {{ $selectedSkema == 'Investigasi Kecelakaan' ? 'selected' : '' }}>12. Investigasi Kecelakaan</option>
                                            <option value="Paramedis K3 Muda" {{ $selectedSkema == 'Paramedis K3 Muda' ? 'selected' : '' }}>13. Paramedis K3 Muda</option>
                                            <option value="Paramedis K3 Madya" {{ $selectedSkema == 'Paramedis K3 Madya' ? 'selected' : '' }}>14. Paramedis K3 Madya</option>
                                            <option value="Paramedis K3 Utama" {{ $selectedSkema == 'Paramedis K3 Utama' ? 'selected' : '' }}>15. Paramedis K3 Utama</option>
                                        </optgroup>

                                        <optgroup label="Higiene Industri, Teknis & Lingkungan">
                                            <option value="Pengkaji Teknis Proteksi Kebakaran" {{ $selectedSkema == 'Pengkaji Teknis Proteksi Kebakaran' ? 'selected' : '' }}>16. Pengkaji Teknis Proteksi Kebakaran</option>
                                            <option value="Ahli Higiene Industri Muda" {{ $selectedSkema == 'Ahli Higiene Industri Muda' ? 'selected' : '' }}>17. Ahli Higiene Industri Muda</option>
                                            <option value="Ahli Higiene Industri Madya" {{ $selectedSkema == 'Ahli Higiene Industri Madya' ? 'selected' : '' }}>18. Ahli Higiene Industri Madya</option>
                                            <option value="Ahli Higiene Industri Utama" {{ $selectedSkema == 'Ahli Higiene Industri Utama' ? 'selected' : '' }}>19. Ahli Higiene Industri Utama</option>
                                            <option value="Teknisi Ruang Terbatas" {{ $selectedSkema == 'Teknisi Ruang Terbatas' ? 'selected' : '' }}>20. Teknisi Ruang Terbatas</option>
                                            <option value="Ahli Muda Ruang Terbatas" {{ $selectedSkema == 'Ahli Muda Ruang Terbatas' ? 'selected' : '' }}>21. Ahli Muda Ruang Terbatas</option>
                                            <option value="Ahli Madya Ruang Terbatas" {{ $selectedSkema == 'Ahli Madya Ruang Terbatas' ? 'selected' : '' }}>22. Ahli Madya Ruang Terbatas</option>
                                            <option value="Ahli Utama Ruang Terbatas" {{ $selectedSkema == 'Ahli Utama Ruang Terbatas' ? 'selected' : '' }}>23. Ahli Utama Ruang Terbatas</option>
                                            <option value="Teknisi K3 Listrik" {{ $selectedSkema == 'Teknisi K3 Listrik' ? 'selected' : '' }}>24. Teknisi K3 Listrik</option>
                                            <option value="Ahli K3 Listrik" {{ $selectedSkema == 'Ahli K3 Listrik' ? 'selected' : '' }}>25. Ahli K3 Listrik</option>
                                        </optgroup>

                                        @if(!empty($selectedSkema))
                                            <optgroup label="Skema Terpilih dari Katalog">
                                                <option value="{{ $selectedSkema }}" selected>{{ $selectedSkema }}</option>
                                            </optgroup>
                                        @endif
                                    </select>
                                </div>
                                <div class="small text-secondary mt-2">
                                    <i class="bi bi-info-circle text-primary me-1"></i> Pastikan skema yang dipilih sudah sesuai dengan rencana jenjang sertifikasi Anda.
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- BAGIAN 4: UPLOAD DOKUMEN PERSYARATAN --}}
                    <div class="form-bento-card">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4 pb-3 border-bottom">
                            <div class="d-flex align-items-center gap-3">
                                <div class="section-badge-num" style="background: #e0f2fe; color: #0284c7;">
                                    <i class="bi bi-cloud-arrow-up-fill"></i>
                                </div>
                                <div>
                                    <span class="text-info fw-bold text-uppercase" style="font-size: 0.72rem; letter-spacing: 1px;">Langkah 4 dari 4</span>
                                    <h5 class="fw-bold mb-0" style="color: #0a192f;">Unggah Berkas Persyaratan</h5>
                                </div>
                            </div>
                            <span class="badge bg-light text-secondary border rounded-pill px-3 py-2 fw-semibold">
                                JPG / PNG / PDF (Maks. 2MB)
                            </span>
                        </div>

                        <div class="row g-3">
                            {{-- 1. Ijazah --}}
                            <div class="col-md-6">
                                <div class="upload-zone-card">
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <div class="upload-icon-circle">
                                            <i class="bi bi-mortarboard-fill"></i>
                                        </div>
                                        <div>
                                            <label class="fw-bold small text-dark mb-0 d-block">Scan Ijazah Terakhir <span class="text-danger">*</span></label>
                                            <span class="text-muted" style="font-size: 0.75rem;">Min. SMA/SMK atau D3/S1</span>
                                        </div>
                                    </div>
                                    <input type="file" name="ijazah" class="form-control form-control-sm bg-white rounded-3 ski-file-input" accept=".jpg,.jpeg,.png,.pdf" required>
                                    <span class="file-status-text"><i class="bi bi-paperclip me-1"></i>Belum ada file dipilih</span>
                                </div>
                            </div>

                            {{-- 2. KTP --}}
                            <div class="col-md-6">
                                <div class="upload-zone-card">
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <div class="upload-icon-circle">
                                            <i class="bi bi-person-badge-fill"></i>
                                        </div>
                                        <div>
                                            <label class="fw-bold small text-dark mb-0 d-block">Scan KTP Asli <span class="text-danger">*</span></label>
                                            <span class="text-muted" style="font-size: 0.75rem;">Identitas resmi yang berlaku</span>
                                        </div>
                                    </div>
                                    <input type="file" name="ktp" class="form-control form-control-sm bg-white rounded-3 ski-file-input" accept=".jpg,.jpeg,.png,.pdf" required>
                                    <span class="file-status-text"><i class="bi bi-paperclip me-1"></i>Belum ada file dipilih</span>
                                </div>
                            </div>

                            {{-- 3. Pas Foto --}}
                            <div class="col-md-6">
                                <div class="upload-zone-card">
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <div class="upload-icon-circle">
                                            <i class="bi bi-camera-fill"></i>
                                        </div>
                                        <div>
                                            <label class="fw-bold small text-dark mb-0 d-block">Pas Foto Formal <span class="text-danger">*</span></label>
                                            <span class="text-muted" style="font-size: 0.75rem;">Berwarna, background merah</span>
                                        </div>
                                    </div>
                                    <input type="file" name="foto" class="form-control form-control-sm bg-white rounded-3 ski-file-input" accept=".jpg,.jpeg,.png" required>
                                    <span class="file-status-text"><i class="bi bi-paperclip me-1"></i>Belum ada file dipilih</span>
                                </div>
                            </div>

                            {{-- 4. Surat Kerja --}}
                            <div class="col-md-6">
                                <div class="upload-zone-card">
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <div class="upload-icon-circle">
                                            <i class="bi bi-file-earmark-text-fill"></i>
                                        </div>
                                        <div>
                                            <label class="fw-bold small text-dark mb-0 d-block">Surat Keterangan Kerja</label>
                                            <span class="text-muted" style="font-size: 0.75rem;">Opsional (Utusan Perusahaan/CV)</span>
                                        </div>
                                    </div>
                                    <input type="file" name="surat_kerja" class="form-control form-control-sm bg-white rounded-3 ski-file-input" accept=".jpg,.jpeg,.png,.pdf">
                                    <span class="file-status-text"><i class="bi bi-paperclip me-1"></i>Opsional - tidak wajib</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PERSETUJUAN & TOMBOL SUBMIT --}}
                    <div class="form-bento-card mb-0">
                        <div class="form-check mb-4 p-3 rounded-4" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                            <input class="form-check-input ms-1 me-2 mt-1" type="checkbox" name="terms" id="terms" required>
                            <label class="form-check-label small text-secondary fw-medium" for="terms" style="line-height: 1.6;">
                                Saya menyatakan bahwa seluruh data dan dokumen yang diunggah adalah benar serta bersedia mengikuti prosedur pembinaan dan uji kompetensi di <strong>PT Sertifikasi Kompetensi Indonesia</strong>.
                            </label>
                        </div>

                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between gap-3">
                            <a href="{{ url('/') }}" class="btn btn-light border rounded-pill px-4 py-3 fw-bold text-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Kembali ke Beranda
                            </a>
                            <button type="submit" class="btn-submit-ski flex-grow-1">
                                <i class="bi bi-send-check-fill me-2"></i>KIRIM PENDAFTARAN SEKARANG
                            </button>
                        </div>
                    </div>

                </form>
            </div>

            {{-- KOLOM KANAN: STICKY PANDUAN & BANTUAN ADMIN (4 KOLOM) --}}
            <div class="col-lg-4">
                <div class="sticky-reg-sidebar">

                    {{-- Card Info Keamanan & Alur --}}
                    <div class="sidebar-dark-card mb-4">
                        <span class="badge rounded-pill px-3 py-2 fw-bold mb-3" style="background: rgba(217, 249, 157, 0.15); color: #d9f99d;">
                            <i class="bi bi-shield-lock-fill me-1"></i> DATA PRIVACY GUARANTEED
                        </span>
                        <h5 class="fw-bold text-white mb-2">Apa Langkah Selanjutnya?</h5>
                        <p class="small text-white opacity-75 mb-4" style="line-height: 1.65;">
                            Setelah formulir ini dikirimkan, sistem kami akan mencatat pendaftaran Anda dan melakukan proses berikut:
                        </p>

                        <div class="d-flex gap-3 mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 fw-bold small" style="width: 30px; height: 30px; background: #0066cc; color: #fff;">1</div>
                            <div>
                                <div class="fw-bold small text-white">Verifikasi Berkas</div>
                                <div class="text-white opacity-75" style="font-size: 0.78rem;">Admin memeriksa kelengkapan KTP, Ijazah & Pas Foto Anda.</div>
                            </div>
                        </div>

                        <div class="d-flex gap-3 mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 fw-bold small" style="width: 30px; height: 30px; background: #0066cc; color: #fff;">2</div>
                            <div>
                                <div class="fw-bold small text-white">Konfirmasi via WhatsApp</div>
                                <div class="text-white opacity-75" style="font-size: 0.78rem;">Tim kami menghubungi nomor WhatsApp Anda untuk info jadwal & invoice.</div>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 fw-bold small" style="width: 30px; height: 30px; background: #d9f99d; color: #0a192f;">3</div>
                            <div>
                                <div class="fw-bold small text-white">Akses Kelas & Ujian</div>
                                <div class="text-white opacity-75" style="font-size: 0.78rem;">Peserta bergabung ke grup resmi pelatihan dan mengikuti asesmen.</div>
                            </div>
                        </div>
                    </div>

                    {{-- Card Bantuan Cepat WhatsApp --}}
                    <div class="form-bento-card mb-0">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px; background: #dcfce7; color: #16a34a;">
                                <i class="bi bi-whatsapp fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-0">Butuh Bantuan Pengisian?</h6>
                                <small class="text-secondary">Admin kami siap membantu Anda</small>
                            </div>
                        </div>
                        <p class="small text-secondary mb-3" style="line-height: 1.6;">
                            Jika mengalami kendala ukuran file atau ingin mendaftar secara kolektif (utusan perusahaan), silakan hubungi Admin SKI.
                        </p>
                        <a href="https://wa.me/6289514692974?text={{ urlencode('Halo Admin PT. SKI, saya sedang mengisi formulir pendaftaran online dan ingin bertanya.') }}" 
                           target="_blank" 
                           class="btn btn-outline-success rounded-pill w-100 py-2 fw-bold small">
                            <i class="bi bi-chat-dots-fill me-1"></i> Chat Admin (0895-1469-2974)
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const fileInputs = document.querySelectorAll('.ski-file-input');

    fileInputs.forEach(function (input) {
        input.addEventListener('change', function () {
            const card = this.closest('.upload-zone-card');
            const statusText = card.querySelector('.file-status-text');

            if (this.files && this.files.length > 0) {
                const fileName = this.files[0].name;
                const fileSizeKB = Math.round(this.files[0].size / 1024);
                card.classList.add('has-file');
                statusText.innerHTML = '<i class="bi bi-check-circle-fill me-1"></i>Terpilih: ' + fileName + ' (' + fileSizeKB + ' KB)';
            } else {
                card.classList.remove('has-file');
                statusText.innerHTML = '<i class="bi bi-paperclip me-1"></i>Belum ada file dipilih';
            }
        });
    });
});
</script>
@endsection