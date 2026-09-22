@extends('layouts.app')

@section('title', 'Katalog Sertifikasi')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h6 class="fw-bold text-uppercase text-primary letter-spacing-2">Official Training Catalog</h6>
        <h2 class="display-5 fw-bold text-dark">Katalog Sertifikasi SKI</h2>
        <p class="text-muted mx-auto col-lg-6">Pilih skema sertifikasi resmi BNSP & Kemnaker yang sesuai dengan kebutuhan profesi dan industri Anda.</p>
        <hr class="mx-auto" style="width: 80px; height: 4px; background-color: #0078D4; border-radius: 2px; opacity: 1;">
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        @foreach($allPelatihan as $slug => $data)
        <div class="col">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-card transition-all">
                <div class="position-relative">
                    <img src="{{ $data['image'] ?? 'https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg' }}" 
                         class="card-img-top img-fluid" 
                         alt="{{ $data['title'] }}" 
                         style="height: 180px; object-fit: cover;">
                    <div class="position-absolute top-0 end-0 m-2">
                        <span class="badge bg-primary bg-opacity-90 rounded-pill small px-3 shadow-sm">BNSP</span>
                    </div>
                </div>

                <div class="card-body p-4 d-flex flex-column text-center">
                    <h6 class="fw-bold mb-2 text-dark" style="min-height: 45px;">{{ $data['title'] }}</h6>
                    
                    <div class="d-flex justify-content-center align-items-center mb-4 text-muted small">
                        <span class="me-3"><i class="bi bi-clock me-1 text-primary"></i> {{ $data['durasi'] }}</span>
                        <span><i class="bi bi-journal-text me-1 text-primary"></i> 5+ Materi</span>
                    </div>
                    
                    <div class="mt-auto d-grid gap-2">
                        <a href="{{ route('pelatihan.show', $slug) }}" class="btn btn-outline-primary btn-sm rounded-pill fw-bold">
                            LIHAT DETAIL
                        </a>
                        
                        <a href="https://wa.me/6289514692974?text=Halo%20Admin%20SKI,%20saya%20ingin%20daftar%20sertifikasi%20{{ $data['title'] }}" 
                           class="btn btn-primary btn-sm rounded-pill fw-bold shadow-sm" target="_blank">
                            DAFTAR SEKARANG
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@push('styles')
<style>
    .letter-spacing-2 { letter-spacing: 2px; }
    
    .hover-card { 
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1); 
    }

    .hover-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 1.5rem 3rem rgba(0,0,0,0.12) !important;
    }

    .card-img-top {
        transition: transform 0.6s ease;
    }

    .hover-card:hover .card-img-top {
        transform: scale(1.08);
    }

    .btn-outline-primary:hover {
        background-color: #0078D4 !important;
        color: white !important;
    }

    /* Limit title to 2 lines for neatness */
    .card-body h6 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush
@endsection