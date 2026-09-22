@extends('layouts.app')

@section('title', 'Pendaftaran Berhasil')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4 text-center p-5">
                <div class="mb-4">
                    <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 100px; height: 100px;">
                        <i class="bi bi-check-lg" style="font-size: 3rem;"></i>
                    </div>
                </div>

                <h2 class="fw-bold text-success mb-2">Pendaftaran Berhasil!</h2>
                
                @if(session('participant_id'))
                <div class="mb-4">
                    <p class="text-muted mb-1 small text-uppercase fw-bold">Nomor Registrasi Anda:</p>
                    <h4 class="fw-bold text-dark border d-inline-block px-4 py-2 rounded-pill bg-light">
                        {{ 'REG-' . date('Ym') . str_pad(session('participant_id'), 5, '0', STR_PAD_LEFT) }}
                    </h4>
                </div>
                @endif

                <p class="lead text-muted mb-4">
                    Terima kasih telah mendaftar. Data Anda telah kami terima dan sedang dalam proses verifikasi oleh tim admin.
                </p>

                <div class="alert alert-light border border-success rounded-3 p-4 mb-4 text-start">
                    <h6 class="fw-bold text-success"><i class="bi bi-info-circle me-2"></i>Langkah Selanjutnya:</h6>
                    <ul class="mb-0 small text-secondary">
                        <li class="mb-2">Tim kami akan memverifikasi data dan dokumen Anda dalam 1x24 jam.</li>
                        <li class="mb-2">Silakan cek WhatsApp atau Email secara berkala untuk info selanjutnya.</li>
                        <li>Gunakan <b>Nomor Registrasi</b> di atas jika ingin menanyakan status pendaftaran.</li>
                    </ul>
                </div>

                <div class="d-grid gap-2">
                    <a href="{{ url('/') }}" class="btn btn-success btn-lg shadow-sm">
                        <i class="bi bi-house-door me-2"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection