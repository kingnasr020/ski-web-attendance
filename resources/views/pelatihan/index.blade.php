@extends('layouts.app')

@section('title', 'Katalog Sertifikasi')

@section('content')
@php
    // Streaming Download Handler: Tidak memakan RAM (Aman untuk PDF ukuran besar puluhan/ratusan MB)
    if (request()->has('download_katalog')) {
        $pdfName = 'katalog-ski-94.pdf';
        $possiblePaths = [
            public_path('pdf/' . $pdfName),
            base_path('public/pdf/' . $pdfName),
            base_path('pdf/' . $pdfName),
        ];

        foreach ($possiblePaths as $path) {
            if (file_exists($path)) {
                while (ob_get_level()) {
                    ob_end_clean();
                }
                header('Content-Description: File Transfer');
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="Katalog-94-Skema-PT-SKI-Indonesia.pdf"');
                header('Content-Length: ' . filesize($path));
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                readfile($path);
                exit;
            }
        }
    }
@endphp

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    .ski-catalog-wrap {
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

    /* 1. CATALOG HERO HEADER */
    .catalog-hero {
        margin-top: -5.5rem;
        padding: 8.5rem 0 3.5rem;
        background: 
            radial-gradient(circle at 15% 20%, rgba(56, 189, 248, 0.25) 0%, transparent 45%),
            radial-gradient(circle at 85% 25%, rgba(0, 120, 212, 0.18) 0%, transparent 50%),
            linear-gradient(180deg, #dbeafe 0%, #eff6ff 65%, #f8fafc 100%);
        position: relative;
    }

    .ski-pill-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.45rem 1rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(0, 120, 212, 0.2);
        box-shadow: 0 4px 15px rgba(0, 120, 212, 0.06);
        font-size: 0.78rem;
        font-weight: 700;
        color: #005fb8;
    }

    .catalog-title {
        font-size: clamp(2.1rem, 4vw, 3.3rem);
        font-weight: 800;
        line-height: 1.15;
        letter-spacing: -0.03em;
        color: #0a192f;
    }

    /* 2. DOWNLOAD 94+ SCHEMES PDF BANNER */
    .download-pdf-banner {
        background: linear-gradient(135deg, #0a192f 0%, #003e85 100%);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 26px;
        padding: 2rem 2.25rem;
        color: #ffffff;
        box-shadow: 0 16px 36px rgba(10, 25, 47, 0.12);
        margin-bottom: 2.5rem;
        position: relative;
        overflow: hidden;
    }

    .download-pdf-banner::before {
        content: '';
        position: absolute;
        top: -40%;
        right: -10%;
        width: 320px;
        height: 320px;
        background: radial-gradient(circle, rgba(56, 189, 248, 0.22) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .btn-download-lime {
        background: #d9f99d;
        color: #0a192f !important;
        font-weight: 800;
        border-radius: 999px;
        padding: 0.85rem 1.75rem;
        border: none;
        box-shadow: 0 8px 22px rgba(217, 249, 157, 0.35);
        transition: all 0.25s ease;
        white-space: nowrap;
        cursor: pointer;
    }

    .btn-download-lime:hover {
        background: #bef264;
        transform: translateY(-2px);
        box-shadow: 0 12px 28px rgba(190, 242, 100, 0.45);
    }

    /* 3. FEATURED 25 SECTION HEADER & FILTER BAR */
    .featured-section-head {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-end;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1.25rem;
    }

    .filter-glass-bar {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 24px;
        padding: 1.15rem 1.35rem;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.05);
        margin-bottom: 2rem;
    }

    .search-input-group {
        position: relative;
    }

    .search-input-group i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #64748b;
        font-size: 1rem;
    }

    .search-input-modern {
        width: 100%;
        padding: 0.72rem 1rem 0.72rem 2.65rem;
        border-radius: 999px;
        border: 1.5px solid #e2e8f0;
        background: #f8fafc;
        font-size: 0.9rem;
        font-weight: 500;
        color: #0f172a;
        transition: all 0.2s ease;
    }

    .search-input-modern:focus {
        outline: none;
        background: #ffffff;
        border-color: #0066cc;
        box-shadow: 0 0 0 4px rgba(0, 102, 204, 0.1);
    }

    .filter-pills-wrap {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 0.5rem;
        justify-content: flex-start;
    }

    @media (min-width: 1200px) {
        .filter-pills-wrap {
            justify-content: flex-end;
        }
    }

    .filter-pill-btn {
        border: 1.5px solid #e2e8f0;
        background: #ffffff;
        color: #475569;
        border-radius: 999px;
        padding: 0.5rem 1rem;
        font-size: 0.82rem;
        font-weight: 700;
        transition: all 0.2s ease;
        white-space: nowrap;
    }

    .filter-pill-btn:hover {
        border-color: #0066cc;
        color: #0066cc;
        background: #f8fafc;
    }

    .filter-pill-btn.active {
        background: #0a192f;
        border-color: #0a192f;
        color: #ffffff;
        box-shadow: 0 6px 16px rgba(10, 25, 47, 0.15);
    }

    /* 4. EDTECH COURSE CARDS */
    .edtech-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 24px;
        padding: 0.65rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: all 0.28s cubic-bezier(0.22, 1, 0.36, 1);
        box-shadow: 0 4px 15px rgba(15, 23, 42, 0.03);
    }

    .edtech-card:hover {
        border-color: #93c5fd;
        transform: translateY(-6px);
        box-shadow: 0 18px 35px rgba(15, 23, 42, 0.09);
    }

    .edtech-thumb-wrap {
        position: relative;
        height: 190px;
        border-radius: 18px;
        overflow: hidden;
        background: #f1f5f9;
    }

    .edtech-thumb-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.45s ease;
    }

    .edtech-card:hover .edtech-thumb-wrap img {
        transform: scale(1.06);
    }

    .edtech-badge-floating {
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(255, 255, 255, 0.94);
        backdrop-filter: blur(4px);
        color: #0066cc;
        font-weight: 800;
        font-size: 0.72rem;
        padding: 0.3rem 0.75rem;
        border-radius: 999px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }

    .edtech-number-tag {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: rgba(10, 25, 47, 0.8);
        backdrop-filter: blur(4px);
        color: #ffffff;
        font-weight: 700;
        font-size: 0.7rem;
        padding: 0.2rem 0.6rem;
        border-radius: 999px;
    }

    .edtech-title {
        font-size: 1.02rem;
        line-height: 1.45;
        min-height: 45px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* 5. BOTTOM CORPORATE BANNER */
    .inhouse-bento-banner {
        background: 
            radial-gradient(circle at 85% 20%, rgba(56, 189, 248, 0.25) 0%, transparent 45%),
            linear-gradient(135deg, #0a192f 0%, #004694 100%);
        border-radius: 28px;
        padding: 2.75rem 2.25rem;
        color: #ffffff;
        box-shadow: 0 20px 40px rgba(10, 25, 47, 0.16);
    }

    .btn-lime-pill {
        background: #d9f99d;
        color: #0a192f !important;
        font-weight: 800;
        border-radius: 999px;
        padding: 0.85rem 1.75rem;
        border: none;
        transition: all 0.25s ease;
    }

    .btn-lime-pill:hover {
        background: #bef264;
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(190, 242, 100, 0.3);
    }

    @media (max-width: 991.98px) {
        .catalog-hero {
            padding: 7rem 0 2.5rem;
        }
    }
</style>

<div class="ski-catalog-wrap pb-5">

    {{-- 1. HERO HEADER --}}
    <section class="catalog-hero text-center">
        <div class="container">
            <div class="ski-pill-badge mb-3">
                <i class="bi bi-grid-1x2-fill text-primary"></i>
                <span>OFFICIAL TRAINING CATALOG • BNSP & KEMNAKER RI</span>
            </div>

            <h1 class="catalog-title mb-3">
                Jelajahi <span class="font-serif-italic text-primary" style="font-size: 1.1em;">94+ Skema</span> Sertifikasi Resmi
            </h1>

            <p class="text-secondary mx-auto col-lg-7 mb-0" style="font-size: 1.02rem; line-height: 1.7;">
                PT Sertifikasi Kompetensi Indonesia menyediakan lebih dari <strong>94+ skema pelatihan resmi</strong>. Unduh dokumen katalog lengkap kami di bawah ini atau telusuri langsung <strong>25 katalog unggulan</strong> yang paling diminati industri.
            </p>
        </div>
    </section>

    <section class="container">

        {{-- 2. BANNER DOWNLOAD LENGKAP 94+ SKEMA PDF (STREAMING RINGAN & BEBAS 404) --}}
        <div class="download-pdf-banner">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <span class="badge rounded-pill px-3 py-2 fw-bold mb-2" style="background: rgba(217, 249, 157, 0.2); color: #d9f99d; border: 1px solid rgba(217, 249, 157, 0.4);">
                        <i class="bi bi-file-earmark-pdf-fill me-1"></i> DOKUMEN LENGKAP 94+ SKEMA
                    </span>
                    <h3 class="fw-bold mb-2 text-white" style="font-size: clamp(1.35rem, 2.5vw, 1.85rem);">
                        Butuh Daftar Lengkap 94+ Katalog Sertifikasi PT SKI?
                    </h3>
                    <p class="text-white opacity-85 mb-0" style="font-size: 0.95rem; line-height: 1.65;">
                        Unduh brosur dan katalog resmi kami dalam format PDF untuk melihat seluruh rincian 94+ skema BNSP & Kemnaker RI beserta persyaratan lengkapnya.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('pelatihan.index', ['download_katalog' => 1]) }}" 
                       class="btn-download-lime text-decoration-none d-inline-flex align-items-center gap-2">
                        <i class="bi bi-cloud-arrow-down-fill fs-5"></i>
                        <span>Download 94+ Katalog SKI (PDF)</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- 3. HEADING PENGANTAR 25 KATALOG UNGGULAN --}}
        <div class="featured-section-head">
            <div>
                <div class="d-inline-flex align-items-center gap-2 text-primary fw-bold small text-uppercase mb-1" style="letter-spacing: 1px;">
                    <i class="bi bi-stars"></i>
                    <span>TOP PICK SCHEMES</span>
                </div>
                <h3 class="fw-bold mb-0" style="color: #0a192f; font-size: clamp(1.5rem, 2.6vw, 2.1rem);">
                    Berikut <span class="font-serif-italic text-primary" style="font-size: 1.12em;">{{ count($allPelatihan) }} Katalog Sertifikasi Unggulan</span> Kami
                </h3>
            </div>
            <p class="text-secondary small mb-0">
                Menampilkan <strong>{{ count($allPelatihan) }} program terpopuler</strong> dari total 94+ skema resmi PT SKI Indonesia.
            </p>
        </div>

        {{-- 4. SEARCH & FILTER BAR --}}
        <div class="filter-glass-bar">
            <div class="row g-3 align-items-center">
                <div class="col-12 col-xl-4">
                    <div class="search-input-group">
                        <i class="bi bi-search"></i>
                        <input type="text" id="catalogSearchInput" class="search-input-modern" placeholder="Cari dari 25 skema unggulan (contoh: K3 Umum, Migas)...">
                    </div>
                </div>

                <div class="col-12 col-xl-8">
                    <div class="filter-pills-wrap" id="catalogFilterGroup">
                        <button type="button" class="filter-pill-btn active" data-filter="all">
                            Semua Unggulan ({{ count($allPelatihan) }})
                        </button>
                        <button type="button" class="filter-pill-btn" data-filter="k3">
                            Ahli & Pengawas K3
                        </button>
                        <button type="button" class="filter-pill-btn" data-filter="migas">
                            Migas & Gas
                        </button>
                        <button type="button" class="filter-pill-btn" data-filter="lingkungan">
                            Lingkungan & Limbah
                        </button>
                        <button type="button" class="filter-pill-btn" data-filter="teknis">
                            Teknis & Alat
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- 5. GRID 25 SKEMA UNGGULAN --}}
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4" id="catalogGrid">
            @foreach($allPelatihan as $slug => $data)
            @php
                $titleLower = strtolower($data['title']);
                $categoryTag = 'k3';
                if (str_contains($titleLower, 'migas') || str_contains($titleLower, 'gas') || str_contains($titleLower, 'agt')) {
                    $categoryTag = 'migas';
                } elseif (str_contains($titleLower, 'air') || str_contains($titleLower, 'udara') || str_contains($titleLower, 'limbah') || str_contains($titleLower, 'sampah') || str_contains($titleLower, 'b3')) {
                    $categoryTag = 'lingkungan';
                } elseif (str_contains($titleLower, 'forklift') || str_contains($titleLower, 'scaffolding') || str_contains($titleLower, 'ketinggian') || str_contains($titleLower, 'listrik') || str_contains($titleLower, 'api') || str_contains($titleLower, 'rigger')) {
                    $categoryTag = 'teknis';
                }
            @endphp
            <div class="col catalog-item" data-title="{{ $titleLower }}" data-category="{{ $categoryTag }}">
                <div class="edtech-card">
                    <div class="edtech-thumb-wrap">
                        <img src="{{ $data['image'] ?? 'https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg' }}" 
                             alt="{{ $data['title'] }}" 
                             loading="lazy">
                        <span class="edtech-badge-floating">
                            <i class="bi bi-patch-check-fill me-1"></i>BNSP
                        </span>
                        <span class="edtech-number-tag">
                            Unggulan #{{ $loop->iteration }}
                        </span>
                    </div>

                    <div class="p-3 d-flex flex-column flex-grow-1">
                        <div class="d-flex align-items-center gap-2 text-muted small mb-2 flex-wrap">
                            <span class="badge bg-light text-secondary border rounded-pill fw-medium">
                                <i class="bi bi-clock me-1 text-primary"></i>{{ $data['durasi'] }}
                            </span>
                            <span class="badge bg-light text-secondary border rounded-pill fw-medium">
                                <i class="bi bi-journal-check me-1 text-primary"></i>Min. SMA/SMK
                            </span>
                        </div>

                        <h6 class="fw-bold text-dark mb-3 edtech-title" title="{{ $data['title'] }}">
                            {{ $data['title'] }}
                        </h6>

                        <div class="mt-auto pt-2 border-top d-flex gap-2">
                            <a href="{{ route('pelatihan.show', $slug) }}" 
                               class="btn btn-light border rounded-pill fw-bold btn-sm flex-fill py-2 text-dark">
                                Detail
                            </a>
                            <a href="https://wa.me/6289514692974?text={{ urlencode('Halo Admin SKI, saya ingin daftar sertifikasi ' . $data['title']) }}" 
                               target="_blank" 
                               class="btn btn-primary rounded-pill fw-bold btn-sm flex-fill py-2 text-white"
                               style="background: #0066cc; border-color: #0066cc;">
                                Daftar <i class="bi bi-arrow-up-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- EMPTY STATE JIKA PENCARIAN TIDAK DITEMUKAN DI 25 UNGGULAN --}}
        <div id="catalogEmptyState" class="text-center py-5 d-none">
            <div class="bg-white border rounded-4 p-5 mx-auto" style="max-width: 540px;">
                <i class="bi bi-search fs-1 text-primary mb-3 d-block"></i>
                <h5 class="fw-bold text-dark">Belum Ditemukan di 25 Katalog Unggulan</h5>
                <p class="text-secondary small mb-4">
                    Skema yang Anda cari mungkin termasuk di dalam <strong>Dokumen Lengkap 94+ Skema PT SKI</strong>. Silakan unduh PDF katalog lengkap kami atau tampilkan kembali seluruh 25 skema unggulan.
                </p>
                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <button type="button" id="resetCatalogSearch" class="btn btn-primary rounded-pill px-4 fw-bold" style="background: #0066cc;">
                        Reset Pencarian (25 Unggulan)
                    </button>
                    <a href="{{ route('pelatihan.index', ['download_katalog' => 1]) }}" class="btn btn-outline-dark rounded-pill px-4 fw-bold">
                        <i class="bi bi-file-earmark-pdf me-1"></i>Download PDF 94+ Skema
                    </a>
                </div>
            </div>
        </div>

        {{-- 6. CORPORATE / IN-HOUSE TRAINING CTA --}}
        <div class="inhouse-bento-banner mt-5">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <span class="badge rounded-pill px-3 py-2 fw-bold mb-2" style="background: rgba(255,255,255,0.15); color: #d9f99d;">
                        <i class="bi bi-building-check me-1"></i> PROGRAM KORPORASI & KOLEKTIF
                    </span>
                    <h3 class="fw-bold text-white mb-2">
                        Butuh Pelatihan <span class="font-serif-italic" style="color: #d9f99d; font-size: 1.12em;">In-House Training</span> untuk Perusahaan?
                    </h3>
                    <p class="text-white opacity-80 mb-0" style="font-size: 0.96rem; line-height: 1.65;">
                        Kami melayani penyelenggaraan pelatihan dan uji kompetensi dari 94+ skema resmi untuk instansi atau perusahaan di Yogyakarta, Surabaya, Tasikmalaya, maupun seluruh Indonesia dengan jadwal fleksibel.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="https://wa.me/6289514692974?text={{ urlencode('Halo Admin PT. SKI, saya ingin berdiskusi mengenai penawaran kerja sama In-House Training untuk perusahaan kami.') }}" 
                       target="_blank" 
                       class="btn-lime-pill text-decoration-none d-inline-flex align-items-center gap-2">
                        <i class="bi bi-whatsapp fs-5"></i>
                        <span>Diskusi bersama Tim SKI</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('catalogSearchInput');
    const filterButtons = document.querySelectorAll('#catalogFilterGroup .filter-pill-btn');
    const items = document.querySelectorAll('#catalogGrid .catalog-item');
    const emptyState = document.getElementById('catalogEmptyState');
    const resetBtn = document.getElementById('resetCatalogSearch');

    let activeCategory = 'all';

    function filterCatalog() {
        const query = (searchInput.value || '').toLowerCase().trim();
        let visibleCount = 0;

        items.forEach(function (item) {
            const title = item.getAttribute('data-title') || '';
            const category = item.getAttribute('data-category') || '';

            const matchesSearch = title.includes(query);
            const matchesCategory = (activeCategory === 'all') || (category === activeCategory);

            if (matchesSearch && matchesCategory) {
                item.classList.remove('d-none');
                visibleCount++;
            } else {
                item.classList.add('d-none');
            }
        });

        if (visibleCount === 0) {
            emptyState.classList.remove('d-none');
        } else {
            emptyState.classList.add('d-none');
        }
    }

    searchInput.addEventListener('input', filterCatalog);

    filterButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            filterButtons.forEach(function (b) { b.classList.remove('active'); });
            this.classList.add('active');
            activeCategory = this.getAttribute('data-filter');
            filterCatalog();
        });
    });

    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            searchInput.value = '';
            activeCategory = 'all';
            filterButtons.forEach(function (b) { b.classList.remove('active'); });
            filterButtons[0].classList.add('active');
            filterCatalog();
        });
    }
});
</script>
@endsection