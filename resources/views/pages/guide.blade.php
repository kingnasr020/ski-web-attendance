@extends('layouts.app')

@section('title', 'Panduan Pendaftaran')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="color: #0078D4;">Panduan Pendaftaran</h1>
        <p class="text-muted">Ikuti langkah-langkah mudah di bawah ini untuk memulai sertifikasi Anda.</p>
        <div style="width: 60px; height: 4px; background: #0078D4; margin: 20px auto;"></div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 rounded-4 text-center p-4 hover-card">
                        <div class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle text-white" style="width: 60px; height: 60px; background-color: #0078D4;">
                            <span class="fs-3 fw-bold">1</span>
                        </div>
                        <h5 class="fw-bold">Pilih Program</h5>
                        <p class="small text-muted mb-0">Tentukan program pelatihan atau sertifikasi (Kemnaker/BNSP) yang sesuai dengan kebutuhan profesi Anda.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 rounded-4 text-center p-4 hover-card">
                        <div class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle text-white" style="width: 60px; height: 60px; background-color: #0078D4;">
                            <span class="fs-3 fw-bold">2</span>
                        </div>
                        <h5 class="fw-bold">Isi Form Online</h5>
                        <p class="small text-muted mb-0">Klik tombol "Daftar Online", lengkapi data diri, dan unggah dokumen persyaratan yang diminta secara lengkap.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 rounded-4 text-center p-4 hover-card">
                        <div class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle text-white" style="width: 60px; height: 60px; background-color: #0078D4;">
                            <span class="fs-3 fw-bold">3</span>
                        </div>
                        <h5 class="fw-bold">Konfirmasi Admin</h5>
                        <p class="small text-muted mb-0">Admin kami akan memverifikasi berkas Anda. Anda akan dihubungi via WhatsApp untuk proses pembayaran dan jadwal.</p>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-5 rounded-4 overflow-hidden">
                <div class="card-header border-0 text-white p-4" style="background-color: #0078D4;">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-file-earmark-text me-2"></i>Persyaratan Umum Dokumen</h5>
                </div>
                <div class="card-body p-4 bg-light">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush bg-transparent">
                                <li class="list-group-item bg-transparent border-0 d-flex align-items-start">
                                    <i class="bi bi-check-circle-fill text-primary me-3 mt-1" style="color: #0078D4 !important;"></i>
                                    <span>Scan Ijazah Terakhir (Min. D3/S1 sesuai skema)</span>
                                </li>
                                <li class="list-group-item bg-transparent border-0 d-flex align-items-start">
                                    <i class="bi bi-check-circle-fill text-primary me-3 mt-1" style="color: #0078D4 !important;"></i>
                                    <span>Scan KTP Asli / Masih Berlaku</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush bg-transparent">
                                <li class="list-group-item bg-transparent border-0 d-flex align-items-start">
                                    <i class="bi bi-check-circle-fill text-primary me-3 mt-1" style="color: #0078D4 !important;"></i>
                                    <span>Pas Foto Berwarna (Background Merah)</span>
                                </li>
                                <li class="list-group-item bg-transparent border-0 d-flex align-items-start">
                                    <i class="bi bi-check-circle-fill text-primary me-3 mt-1" style="color: #0078D4 !important;"></i>
                                    <span>Surat Keterangan Kerja (Jika dari Utusan Perusahaan)</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <p class="fw-bold">Masih bingung atau ada pertanyaan?</p>
                <a href="https://wa.me/6289514692974" class="btn btn-outline-primary rounded-pill px-5 fw-bold" style="color: #0078D4; border-color: #0078D4;">
                    Tanya Admin via WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-card { transition: 0.3s; }
    .hover-card:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,120,212,0.1) !important; }
</style>
@endsection