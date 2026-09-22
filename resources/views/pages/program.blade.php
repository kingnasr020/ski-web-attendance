@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="position-relative" style="margin-top: -1.5rem;">
    <div style="height: 450px; background: linear-gradient(to right, rgba(0, 120, 212, 0.9), rgba(33, 37, 41, 0.7)), url('{{ $image }}'); background-size: cover; background-position: center;">
        <div class="container h-100 position-relative">
            <div class="d-flex flex-column justify-content-center h-100 text-white col-lg-8">
                <span class="badge bg-warning text-dark mb-3 w-auto align-self-start px-3 py-2 rounded-pill fw-bold">
                    <i class="bi bi-star-fill me-1"></i> PROGRAM UNGGULAN
                </span>
                <h1 class="display-4 fw-bold text-uppercase mb-3">{{ $title }}</h1>
                <p class="lead mb-4" style="opacity: 0.9;">{{ $desc }}</p>
                <div>
                    <a href="#daftar" class="btn btn-light text-primary fw-bold px-4 py-3 rounded-pill shadow me-2" style="color: #0078D4 !important;">
                        <i class="bi bi-pencil-fill me-2"></i> Daftar Sekarang
                    </a>
                    <a href="#info" class="btn btn-outline-light px-4 py-3 rounded-pill">
                        <i class="bi bi-info-circle me-2"></i> Info Detail
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5" id="info">
    <div class="row g-5">
        
        <div class="col-lg-8">
            <div class="mb-5">
                <h3 class="fw-bold text-dark mb-3"><i class="bi bi-book-half text-primary me-2" style="color: #0078D4 !important;"></i>Deskripsi Program</h3>
                <p class="text-secondary lead" style="line-height: 1.8; text-align: justify;">
                    {{ $content }}
                </p>
                <p class="text-secondary small">
                    *Program ini dilaksanakan sesuai standar regulasi yang berlaku dan dibimbing oleh instruktur berpengalaman.
                </p>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="d-flex align-items-start">
                        <div class="bg-primary text-white rounded p-2 me-3" style="background-color: #0078D4 !important;"><i class="bi bi-patch-check fs-4"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Legalitas Resmi</h6>
                            <p class="small text-muted mb-0">Sertifikat diakui oleh Negara & Industri.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-start">
                        <div class="bg-primary text-white rounded p-2 me-3" style="background-color: #0078D4 !important;"><i class="bi bi-people fs-4"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Praktisi Senior</h6>
                            <p class="small text-muted mb-0">Dibimbing langsung oleh ahli di bidangnya.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm bg-light mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Materi yang Dipelajari:</h5>
                    <ul class="list-group list-group-flush bg-transparent">
                        @foreach($curriculum as $materi)
                            <li class="list-group-item bg-transparent ps-0 py-2">
                                <i class="bi bi-check-circle-fill text-primary me-2" style="color: #0078D4 !important;"></i> {{ $materi }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow rounded-4 sticky-top" style="top: 100px; z-index: 1;">
                <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                    <h5 class="fw-bold text-dark mb-0">Fasilitas Peserta</h5>
                </div>
                <div class="card-body p-4">
                    <ul class="list-unstyled mb-4">
                        <li class="mb-3 d-flex align-items-center text-secondary">
                            <i class="bi bi-award-fill text-warning me-3 fs-5"></i> Sertifikat Asli
                        </li>
                        <li class="mb-3 d-flex align-items-center text-secondary">
                            <i class="bi bi-card-heading text-primary me-3 fs-5" style="color: #0078D4 !important;"></i> Kartu Lisensi
                        </li>
                        <li class="mb-3 d-flex align-items-center text-secondary">
                            <i class="bi bi-backpack-fill text-danger me-3 fs-5"></i> Training Kit Lengkap
                        </li>
                        <li class="mb-3 d-flex align-items-center text-secondary">
                            <i class="bi bi-cup-hot-fill text-secondary me-3 fs-5"></i> Coffee Break & Lunch
                        </li>
                    </ul>

                    <hr class="text-muted opacity-25">

                    <div class="text-center" id="daftar">
                        <p class="small text-muted mb-2">Slot terbatas bulan ini!</p>
                        <a href="{{ route('register.form') }}" class="btn btn-primary w-100 py-3 fw-bold rounded-3 shadow-sm" style="background-color: #0078D4 !important; border-color: #0078D4 !important;">
                            DAFTAR SEKARANG
                        </a>
                        <p class="mt-3 mb-0 small text-muted">
                            Butuh info lebih lanjut? <a href="{{ route('info.contact') }}" class="text-primary text-decoration-none fw-bold" style="color: #0078D4 !important;">Hubungi Admin</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection