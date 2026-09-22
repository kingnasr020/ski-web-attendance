@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<section class="py-5 text-white shadow-sm" style="background: linear-gradient(135deg, #0078D4 0%, #005a9e 100%);">
    <div class="container py-4 text-center">
        <h1 class="display-5 fw-bold mb-2">Tentang Kami</h1>
        <p class="lead opacity-75">Mengenal lebih dekat PT Sertifikasi Kompetensi Indonesia</p>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="{{ asset('images/logo.png') }}" alt="logo SKI" class="img-fluid rounded-4 shadow-lg">
                    <div class="position-absolute bottom-0 start-0 bg-primary p-3 rounded-tr-4 text-white d-none d-md-block" style="border-top-right-radius: 20px;">
                        <span class="fw-bold fs-4">10+</span><br><small>Tahun Pengalaman</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h6 class="text-primary fw-bold text-uppercase mb-2">Profil Perusahaan</h6>
                <h2 class="fw-bold mb-4" style="color: #003459;">PT Sertifikasi Kompetensi Indonesia</h2>
                <p class="text-muted mb-4" style="text-align: justify; line-height: 1.8;">
                    PT. SKI Indonesia adalah lembaga yang berfokus pada pengembangan sumber daya manusia melalui sertifikasi kompetensi kerja di bidang Keselamatan dan Kesehatan Kerja (K3) serta teknis industri lainnya. Kami berkomitmen menyediakan layanan pelatihan yang berkualitas tinggi, transparan, dan sesuai dengan regulasi pemerintah (Kemnaker) maupun standar BNSP.
                </p>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-primary me-2"></i>
                            <span class="fw-semibold">Terakreditasi Resmi</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-primary me-2"></i>
                            <span class="fw-semibold">Instruktur Ahli</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background-color: #f0f7ff;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color: #003459;">Pimpinan Perusahaan</h2>
            <div class="mx-auto mt-2" style="width: 60px; height: 4px; background-color: #F37021; border-radius: 10px;"></div>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-md-5 col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4">
                    <div class="mb-4">
                        <img src="{{ asset('images/Pak Dimas.jpeg') }}" class="rounded-circle border border-5 border-white shadow-sm" style="width: 160px; height: 160px; object-fit: cover;" alt="Pak Dimas">
                    </div>
                    <h5 class="fw-bold mb-1" style="color: #003459;">Dimas Julian Zahid A</h5>
                    <p class="small text-muted mb-3" style="min-height: 40px;">AMK, S.Kep, MKM, CPRM, CWCCA, Grad, IOSH</p>
                    <span class="badge bg-primary rounded-pill px-4 py-2 mb-3">Presiden Direktur</span>
                </div>
            </div>

            <div class="col-md-5 col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4">
                    <div class="mb-4">
                        <img src="{{ asset('images/Pak Iqbal.jpeg') }}" class="rounded-circle border border-5 border-white shadow-sm" style="width: 160px; height: 160px; object-fit: cover;" alt="Pak Iqbal">
                    </div>
                    <h5 class="fw-bold mb-1" style="color: #003459;">Iqbal Subekti</h5>
                    <p class="small text-muted mb-3" style="min-height: 40px;">S.K.M., MKM</p>
                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-4 py-2 mb-3" style="border: 1px solid #0078D4;">Direktur Operasional</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-5">
            <div class="col-md-6">
                <h4 class="fw-bold mb-4" style="color: #003459;"><i class="bi bi-eye me-2 text-primary"></i>Visi & Misi</h4>
                <div class="mb-4">
                    <h6 class="fw-bold text-primary">Visi</h6>
                    <p class="text-muted">Menjadi pusat pengembangan kompetensi SDM unggul yang diakui secara nasional dan internasional.</p>
                </div>
                <div>
                    <h6 class="fw-bold text-primary">Misi</h6>
                    <ul class="text-muted ps-3">
                        <li class="mb-2">Menyelenggarakan pelatihan berbasis kompetensi yang inovatif.</li>
                        <li class="mb-2">Menjamin kualitas lulusan sertifikasi yang siap kerja dan profesional.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="fw-bold mb-4" style="color: #003459;"><i class="bi bi-shield-check me-2 text-primary"></i>Legalitas Perusahaan</h4>
                <div class="p-4 rounded-4" style="background-color: #f8f9fa; border-left: 5px solid #F37021;">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-3 d-flex align-items-center">
                            <i class="bi bi-patch-check text-success me-3 fs-4"></i>
                            <div>
                                <div class="fw-bold small">KEMNAKER RI</div>
                                <div class="text-muted x-small">PJK3 Bidang Lingkungan Kerja & Kesehatan Kerja</div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="bi bi-patch-check text-success me-3 fs-4"></i>
                            <div>
                                <div class="fw-bold small">BNSP</div>
                                <div class="text-muted x-small">Tempat Uji Kompetensi (TUK) Mandiri</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .rounded-tr-4 { border-top-right-radius: 1.5rem !important; }
    .x-small { font-size: 0.8rem; }
    .card { transition: transform 0.3s ease; }
    .card:hover { transform: translateY(-10px); }
</style>
@endsection