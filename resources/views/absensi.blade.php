@extends('layouts.app')

@section('title', 'Absensi Webinar Nasional - PT SKI')

@section('content')
<div class="py-5" style="background-color: #f8f9fa; min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <div class="text-center mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo PT SKI" width="80" class="mb-3">
                    <h2 class="fw-bold text-dark">Form Absensi Webinar</h2>
                    <p class="text-muted">PT. Sertifikasi Kompetensi Indonesia</p>
                </div>

                @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm rounded-4 p-4 mb-4 text-center animate__animated animate__fadeIn">
                    <div class="mb-3">
                        <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="fw-bold">Berhasil!</h4>
                    <p class="mb-0">{{ session('success') }}</p>
                    <hr>
                    <p class="small mb-0 text-muted">E-Sertifikat akan dikirimkan ke email Anda dalam waktu 1x24 jam.</p>
                </div>
                @endif

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-5">
                    <div class="progress rounded-0" style="height: 5px;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%; background-color: #0078D4;"></div>
                    </div>

                    <div class="bg-primary p-4 text-center text-white">
                        <h4 class="fw-bold mb-0">Webinar Nasional Basic K3 Kelistrikan</h4>
                        <p class="mb-0 opacity-75 small">Pastikan data yang Anda masukkan sudah benar</p>
                    </div>

                    <div class="card-body p-4 p-lg-5">
                        <form action="{{ route('webinar.absensi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label fw-bold">Nama Lengkap *</label>
                                <input type="text" name="nama" class="form-control form-control-lg rounded-3 bg-light" placeholder="Nama & Gelar" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-bold">Email Aktif *</label>
                                    <input type="email" name="email" class="form-control form-control-lg rounded-3 bg-light" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-bold">No WhatsApp *</label>
                                    <input type="number" name="wa" class="form-control form-control-lg rounded-3 bg-light" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-bold">Kesan Pesan *</label>
                                <textarea name="kesan" class="form-control rounded-3 bg-light" rows="3" required></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-bold">Rekomendasi Tema *</label>
                                <input type="text" name="rekomendasi" class="form-control rounded-3 bg-light" required>
                            </div>
                            <div class="d-grid pt-3">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold shadow-sm">
                                    SUBMIT ABSENSI SEKARANG
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 p-4 text-center" style="background: linear-gradient(135deg, #fff 0%, #e7f1ff 100%);">
                    <h5 class="fw-bold text-primary mb-3">Mau Sertifikasi K3 Resmi BNSP/Kemnaker?</h5>
                    <p class="text-muted small mb-4">Tersedia lebih dari 25 skema pelatihan K3 untuk menunjang karir profesional Anda.</p>
                    <div class="d-grid d-md-flex justify-content-md-center gap-3">
                        <a href="{{ route('pelatihan.index') }}" class="btn btn-outline-primary rounded-pill px-4 fw-bold">Lihat Katalog</a>
                        <a href="https://wa.me/6289514692974" target="_blank" class="btn btn-success rounded-pill px-4 fw-bold">
                            <i class="bi bi-whatsapp me-2"></i>Konsultasi Gratis
                        </a>
                    </div>
                </div>

                <p class="text-center mt-4 text-muted small">&copy; {{ date('Y') }} PT. SKI INDONESIA</p>
            </div>
        </div>
    </div>
</div>
@endsection