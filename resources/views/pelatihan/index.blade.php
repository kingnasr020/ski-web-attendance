@extends('layouts.app')

@section('title', 'Katalog Sertifikasi')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

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

    /* 2. SEARCH & FILTER BAR (CLASSIO STYLE) */
    .filter-glass-bar {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 24px;
        padding: 1rem 1.25rem;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.05);
        margin-bottom: 2.5rem;
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
        padding: 0.7rem 1rem 0.7rem 2.65rem;
        border-radius: 999px;
        border: 1.5px solid #e2e8f0;
        background: #f8fafc;
        font-size: 0.92rem;
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

    .filter-pill-btn {
        border: 1.5px solid #e2e8f0;
        background: #ffffff;
        color: #475569;
        border-radius: 999px;
        padding: 0.5rem 1.1rem;
        font-size: 0.84rem;
        font-weight: 700;
        transition: all 0.2s ease;
        white-space: nowrap;
    }

    .filter-pill-btn:hover {
        border-color: #0066cc;
        color: #0066cc;
    }

    .filter-pill-btn.active {
        background: #0a192f;
        border-color: #0a192f;
        color: #ffffff;
        box-shadow: 0 6px 16px rgba(10, 25, 47, 0.15);
    }

    /* 3. EDTECH COURSE CARDS */
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

    /* 4. BOTTOM CORPORATE BANNER */
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
                Jelajahi <span class="font-serif-italic text-primary" style="font-size: 1.1em;">{{ count($allPelatihan) }} Skema</span> Sertifikasi Resmi
            </h1>

            <p class="text-secondary mx-auto col-lg-6 mb-0" style="font-size: 1.02rem; line-height: 1.7;">
                Pilih program sertifikasi kompetensi kerja yang sesuai dengan jenjang karir dan kebutuhan kepatuhan industri perusahaan Anda.
            </p>
        </div>
    </section>

    {{-- 2. FILTER BAR & CATALOG GRID --}}
    <section class="container">
        <div class="filter-glass-bar">
            <div class="row g-3 align-items-center justify-content-between">
                <div class="col-lg-5">
                    <div class="search-input-group">
                        <i class="bi bi-search"></i>
                        <input type="text" id="catalogSearchInput" class="search-input-modern" placeholder="Cari skema (contoh: K3 Umum, Migas, Lingkungan)...">
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="d-flex align-items-center gap-2 overflow-auto pb-1 pb-lg-0 justify-content-lg-end" id="catalogFilterGroup">
                        <button type="button" class="filter-pill-btn active" data-filter="all">
                            Semua ({{ count($allPelatihan) }})
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

        {{-- GRID 25 SKEMA --}}
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
                            #{{ $loop->iteration }}
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

        {{-- EMPTY STATE JIKA PENCARIAN TIDAK DITEMUKAN --}}
        <div id="catalogEmptyState" class="text-center py-5 d-none">
            <div class="bg-white border rounded-4 p-5 mx-auto" style="max-width: 520px;">
                <i class="bi bi-search fs-1 text-primary mb-3 d-block"></i>
                <h5 class="fw-bold text-dark">Skema Tidak Ditemukan</h5>
                <p class="text-secondary small mb-3">Maaf, kata kunci yang Anda cari belum cocok dengan daftar skema di atas.</p>
                <button type="button" id="resetCatalogSearch" class="btn btn-primary rounded-pill px-4 fw-bold" style="background: #0066cc;">
                    Tampilkan Semua 25 Skema
                </button>
            </div>
        </div>

        {{-- 3. CORPORATE / IN-HOUSE TRAINING CTA --}}
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
                        Kami melayani penyelenggaraan pelatihan dan uji kompetensi khusus untuk instansi atau perusahaan di Yogyakarta, Surabaya, Tasikmalaya, maupun seluruh Indonesia dengan jadwal fleksibel.
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

        items.forEach(item => {
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

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            activeCategory = this.getAttribute('data-filter');
            filterCatalog();
        });
    });

    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            searchInput.value = '';
            activeCategory = 'all';
            filterButtons.forEach(b => b.classList.remove('active'));
            filterButtons[0].classList.add('active');
            filterCatalog();
        });
    }
});
</script>
@endsection