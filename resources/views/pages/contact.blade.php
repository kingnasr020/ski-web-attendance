@extends('layouts.app')

@section('title', 'Kontak & Lokasi Kami')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    .ski-contact-wrap {
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

    .contact-hero {
        margin-top: -5.5rem;
        padding: 8.5rem 0 3.5rem;
        background: 
            radial-gradient(circle at 18% 20%, rgba(56, 189, 248, 0.25) 0%, transparent 45%),
            radial-gradient(circle at 82% 25%, rgba(0, 120, 212, 0.18) 0%, transparent 50%),
            linear-gradient(180deg, #dbeafe 0%, #eff6ff 65%, #f8fafc 100%);
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

    .contact-bento-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 28px;
        padding: 2rem;
        box-shadow: 0 12px 32px rgba(15, 23, 42, 0.05);
        height: 100%;
    }

    .city-tab-btn {
        border: 1.5px solid #e2e8f0;
        background: #ffffff;
        color: #475569;
        border-radius: 999px;
        padding: 0.6rem 1.35rem;
        font-weight: 700;
        font-size: 0.88rem;
        transition: all 0.25s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .city-tab-btn:hover {
        border-color: #0066cc;
        color: #0066cc;
    }

    .city-tab-btn.active {
        background: #0a192f;
        border-color: #0a192f;
        color: #ffffff;
        box-shadow: 0 8px 20px rgba(10, 25, 47, 0.18);
    }

    .city-loc-box {
        border: 1.5px solid #e2e8f0;
        border-radius: 20px;
        padding: 1.25rem;
        background: #f8fafc;
        transition: all 0.25s ease;
        cursor: pointer;
    }

    .city-loc-box.active {
        border-color: #0066cc;
        background: #eff6ff;
        box-shadow: 0 8px 20px rgba(0, 102, 204, 0.08);
    }

    .contact-channel-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.1rem 1.25rem;
        border-radius: 20px;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        transition: all 0.25s ease;
    }

    .contact-channel-item:hover {
        border-color: #93c5fd;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.06);
    }

    .channel-icon {
        width: 50px;
        height: 50px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        flex-shrink: 0;
    }
</style>

<div class="ski-contact-wrap pb-5">

    {{-- 1. HERO HEADER --}}
    <section class="contact-hero text-center">
        <div class="container">
            <div class="ski-pill-badge mb-3">
                <i class="bi bi-headset text-primary"></i>
                <span>CONTACT & OFFICE LOCATIONS</span>
            </div>
            <h1 class="fw-bold mb-3" style="font-size: clamp(2.1rem, 4vw, 3.3rem); color: #0a192f;">
                Hubungi Tim & <span class="font-serif-italic text-primary" style="font-size: 1.1em;">Kantor Cabang Kami</span>
            </h1>
            <p class="text-secondary col-lg-6 mx-auto mb-0" style="font-size: 1.02rem; line-height: 1.7;">
                Kami siap mendampingi kebutuhan pendaftaran sertifikasi kompetensi K3 individu maupun pelatihan korporasi di Yogyakarta, Surabaya, dan Tasikmalaya.
            </p>
        </div>
    </section>

    <section class="container">
        {{-- 2. KANAL KONTAK CEPAT --}}
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <a href="https://wa.me/6289514692974?text={{ urlencode('Halo Admin PT. SKI, saya ingin berkonsultasi mengenai program sertifikasi.') }}" target="_blank" class="text-decoration-none">
                    <div class="contact-channel-item">
                        <div class="channel-icon" style="background: #dcfce7; color: #16a34a;">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <div>
                            <div class="small text-secondary fw-semibold">WhatsApp Resmi Admin</div>
                            <div class="fw-bold text-dark fs-6">0895-1469-2974</div>
                            <div class="small text-primary fw-bold">Klik untuk Chat Langsung <i class="bi bi-arrow-right"></i></div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="mailto:indonesiaski922@gmail.com" class="text-decoration-none">
                    <div class="contact-channel-item">
                        <div class="channel-icon" style="background: #eff6ff; color: #0066cc;">
                            <i class="bi bi-envelope-paper-fill"></i>
                        </div>
                        <div>
                            <div class="small text-secondary fw-semibold">Email Korespondensi</div>
                            <div class="fw-bold text-dark fs-6">indonesiaski922@gmail.com</div>
                            <div class="small text-secondary">Penawaran & Kerjasama Instansi</div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <div class="contact-channel-item">
                    <div class="channel-icon" style="background: #fef3c7; color: #d97706;">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <div>
                        <div class="small text-secondary fw-semibold">Jam Layanan Operasional</div>
                        <div class="fw-bold text-dark fs-6">Senin – Jumat (08.00 – 16.00 WIB)</div>
                        <div class="small text-success fw-semibold"><i class="bi bi-check-circle-fill me-1"></i>Konsultasi Online 24/7</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- 3. LOKASI 3 KOTA & INTERACTIVE GOOGLE MAPS --}}
        <div class="contact-bento-card">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3 border-bottom pb-3">
                <div>
                    <h4 class="fw-bold mb-1" style="color: #0a192f;">
                        <i class="bi bi-geo-alt-fill text-primary me-2"></i>Titik Lokasi & Kantor Operasional
                    </h4>
                    <p class="text-secondary small mb-0">Pilih kota di bawah ini untuk melihat titik peta lokasi layanan PT SKI Indonesia.</p>
                </div>

                <div class="d-flex gap-2 flex-wrap" id="cityTabButtons">
                    <button type="button" class="city-tab-btn active" data-city="jogja">
                        <i class="bi bi-pin-map-fill"></i> Yogyakarta
                    </button>
                    <button type="button" class="city-tab-btn" data-city="surabaya">
                        <i class="bi bi-pin-map-fill"></i> Surabaya
                    </button>
                    <button type="button" class="city-tab-btn" data-city="tasik">
                        <i class="bi bi-pin-map-fill"></i> Tasikmalaya
                    </button>
                </div>
            </div>

            <div class="row g-4 align-items-stretch">
                {{-- Daftar 3 Lokasi --}}
                <div class="col-lg-5 d-flex flex-column gap-3">
                    <div class="city-loc-box active" data-city="jogja">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="badge bg-primary rounded-pill">KANTOR PUSAT</span>
                            <span class="small fw-bold text-primary">DI Yogyakarta</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1 mt-2">Yogyakarta (Sleman)</h6>
                        <p class="small text-secondary mb-2">
                            Hotel Nirvana Inn Wahid Hasyim, Jl. Wahid Hasyim No.60A, Condongcatur, Depok, Sleman, DIY 55281.
                        </p>
                        <a href="https://wa.me/6289514692974?text={{ urlencode('Halo Admin SKI, saya ingin berkunjung/konsultasi di Kantor Yogyakarta.') }}" target="_blank" class="small fw-bold text-primary text-decoration-none">
                            Hubungi Admin Jogja <i class="bi bi-arrow-up-right"></i>
                        </a>
                    </div>

                    <div class="city-loc-box" data-city="surabaya">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="badge bg-success rounded-pill">CABANG REGIONAL</span>
                            <span class="small fw-bold text-success">Jawa Timur</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1 mt-2">Surabaya</h6>
                        <p class="small text-secondary mb-2">
                            Pusat koordinasi pelatihan reguler, asesmen TUK & In-House Training wilayah Surabaya, Gresik, Sidoarjo, dan Jawa Timur.
                        </p>
                        <a href="https://wa.me/6289514692974?text={{ urlencode('Halo Admin SKI, saya ingin konsultasi pelatihan wilayah Surabaya.') }}" target="_blank" class="small fw-bold text-primary text-decoration-none">
                            Hubungi Tim Surabaya <i class="bi bi-arrow-up-right"></i>
                        </a>
                    </div>

                    <div class="city-loc-box" data-city="tasik">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="badge bg-warning text-dark rounded-pill">CABANG REGIONAL</span>
                            <span class="small fw-bold text-warning">Jawa Barat</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1 mt-2">Tasikmalaya</h6>
                        <p class="small text-secondary mb-2">
                            Pusat koordinasi pendaftaran sertifikasi K3, kemitraan perguruan tinggi & industri wilayah Tasikmalaya dan Jawa Barat.
                        </p>
                        <a href="https://wa.me/6289514692974?text={{ urlencode('Halo Admin SKI, saya ingin konsultasi pelatihan wilayah Tasikmalaya.') }}" target="_blank" class="small fw-bold text-primary text-decoration-none">
                            Hubungi Tim Tasikmalaya <i class="bi bi-arrow-up-right"></i>
                        </a>
                    </div>
                </div>

                {{-- Embed Peta Dinamis --}}
                <div class="col-lg-7">
                    <div class="rounded-4 overflow-hidden border h-100" style="min-height: 420px; background: #e2e8f0;">
                        <iframe id="skiOfficeMap"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.25049539311!2d110.3995966!3d-7.7632168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a599816dd3f37%3A0x66c02a73499e7bc8!2sNirvana%20Inn%20Wahid%20Hasyim%20Mitra%20RedDoorz!5e0!3m2!1sid!2sid!4v1715600000000!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0; min-height: 420px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const mapFrame = document.getElementById('skiOfficeMap');
    const tabBtns = document.querySelectorAll('.city-tab-btn');
    const locBoxes = document.querySelectorAll('.city-loc-box');

    const mapUrls = {
        jogja: "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.25049539311!2d110.3995966!3d-7.7632168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a599816dd3f37%3A0x66c02a73499e7bc8!2sNirvana%20Inn%20Wahid%20Hasyim%20Mitra%20RedDoorz!5e0!3m2!1sid!2sid!4v1715600000000!5m2!1sid!2sid",
        surabaya: "https://www.google.com/maps?q=Surabaya,+Jawa+Timur&output=embed",
        tasik: "https://www.google.com/maps?q=Tasikmalaya,+Jawa+Barat&output=embed"
    };

    function setActiveCity(city) {
        tabBtns.forEach(btn => {
            btn.classList.toggle('active', btn.getAttribute('data-city') === city);
        });
        locBoxes.forEach(box => {
            box.classList.toggle('active', box.getAttribute('data-city') === city);
        });
        if (mapUrls[city] && mapFrame) {
            mapFrame.src = mapUrls[city];
        }
    }

    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => setActiveCity(btn.getAttribute('data-city')));
    });

    locBoxes.forEach(box => {
        box.addEventListener('click', () => setActiveCity(box.getAttribute('data-city')));
    });
});
</script>
@endsection