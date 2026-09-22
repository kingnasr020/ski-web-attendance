@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary" style="color: #0078D4 !important;">Hubungi Kami</h1>
        <p class="text-muted">Kami siap membantu kebutuhan sertifikasi kompetensi dan K3 perusahaan Anda.</p>
        <div style="width: 80px; height: 4px; background: #0078D4; margin: 20px auto;"></div>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-lg-6">
            <div class="card h-100 border-0 shadow overflow-hidden rounded-4">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.25049539311!2d110.3995966!3d-7.7632168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a599816dd3f37%3A0x66c02a73499e7bc8!2sNirvana%20Inn%20Wahid%20Hasyim%20Mitra%20RedDoorz!5e0!3m2!1sid!2sid!4v1715600000000!5m2!1sid!2sid" 
                    width="100%" height="100%" style="border:0; min-height: 450px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card h-100 border-0 shadow-sm p-4 rounded-4 bg-light">
                <h4 class="fw-bold mb-4 text-dark"><i class="bi bi-building me-2"></i>Kantor Operasional</h4>
                
                <div class="d-flex mb-4 bg-white p-3 rounded shadow-sm">
                    <div class="text-primary me-3 d-flex align-items-center justify-content-center">
                        <i class="bi bi-geo-alt-fill fs-2" style="color: #0078D4;"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1 text-uppercase small text-secondary">Alamat</h6>
                        <p class="mb-0 fw-bold text-dark">
                            Hotel Nirvana Inn Wahid Hasyim<br>
                            Jl. Wahid Hasyim No.60A, Sleman, DIY 55281
                        </p>
                    </div>
                </div>

                <div class="d-flex mb-4 bg-white p-3 rounded shadow-sm">
                    <div class="text-primary me-3 d-flex align-items-center justify-content-center">
                        <i class="bi bi-whatsapp fs-2" style="color: #0078D4;"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1 text-uppercase small text-secondary">WhatsApp Admin</h6>
                        <p class="mb-0 fw-bold text-dark">0895-1469-2974</p>
                        <a href="https://wa.me/6289514692974" target="_blank" class="small text-primary text-decoration-none fw-bold" style="color: #0078D4 !important;">Klik untuk Chat <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <div class="d-flex mb-4 bg-white p-3 rounded shadow-sm">
                    <div class="text-primary me-3 d-flex align-items-center justify-content-center">
                        <i class="bi bi-envelope-fill fs-2" style="color: #0078D4;"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1 text-uppercase small text-secondary">Email Resmi</h6>
                        <p class="mb-0 fw-bold text-dark">indonesiaski922@gmail.com</p>
                    </div>
                </div>

                <div class="alert alert-primary border-0 d-flex align-items-center" role="alert" style="background-color: #e6f2fb; color: #0078D4;">
                    <i class="bi bi-clock-history fs-4 me-3"></i>
                    <div>
                        <small class="fw-bold d-block">Jam Operasional:</small>
                        <small>Senin - Jumat (08.00 - 16.00 WIB)</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection