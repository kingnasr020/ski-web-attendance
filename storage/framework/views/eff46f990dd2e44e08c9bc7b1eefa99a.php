

<?php $__env->startSection('title', 'Beranda'); ?>

<?php $__env->startSection('content'); ?>
<div class="position-relative" style="margin-top: -1.5rem;">
    <div style="height: 600px; background: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url('<?php echo e(asset('images/foto skema/k3umum.png')); ?>'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div class="container h-100">
            <div class="d-flex flex-column justify-content-center h-100 text-white col-lg-8">
                <span class="fw-bold text-uppercase text-warning mb-2 letter-spacing-2">Official Training Center</span>
                <h1 class="display-3 fw-bold mb-4">Ahli K3 & Sertifikasi Kompetensi Resmi</h1>
                
                <p class="lead mb-5 opacity-75">Selamat datang di website resmi <strong>PT. SERTIFIKASI KOMPETENSI INDONESIA</strong>. Kami senang Anda di sini. Tingkatkan karir dan standar keselamatan kerja perusahaan Anda bersama kami, mitra terpercaya yang terlisensi resmi oleh <strong>Kemnaker RI & BNSP</strong>.</p>
                
                <div class="d-flex gap-3 flex-wrap">
                    <a href="<?php echo e(route('register.form')); ?>" class="btn btn-primary btn-lg rounded-pill px-5 py-3 fw-bold shadow hover-top" style="background-color: #0078D4; border-color: #0078D4;">
                        <i class="bi bi-rocket-takeoff-fill me-2"></i> DAFTAR SEKARANG
                    </a>

                    <a href="https://wa.me/6289514692974?text=<?php echo e(urlencode('Halo Admin PT. SKI, saya ingin konsultasi mengenai jadwal pelatihan sertifikasi K3 terdekat. Boleh minta katalog lengkapnya?')); ?>" target="_blank" class="btn btn-outline-light btn-lg rounded-pill px-5 py-3 fw-bold hover-top">
                        <i class="bi bi-whatsapp me-2"></i> KONSULTASI GRATIS
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-fluid-custom pb-5" style="margin-top: -60px; position: relative; z-index: 10;">
    <div class="row g-4 justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 hover-card overflow-hidden">
                <div class="card-body p-4 p-lg-5 text-center d-flex flex-column align-items-center">
                    <div class="mb-4 rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 80px; height: 80px; background-color: #0078D4;">
                        <i class="bi bi-patch-check-fill fs-2 text-white"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Resmi & Terakreditasi</h4>
                    <p class="text-muted mb-0 mt-auto px-lg-3" style="line-height: 1.6;">
                        Kami adalah PJK3 resmi dengan izin dari Kemnaker RI dan TUK yang telah terverifikasi oleh BNSP. Legalitas terjamin.
                    </p>
                </div>
                <div class="p-1 border-0" style="background-color: #0078D4;"></div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 hover-card overflow-hidden">
                <div class="card-body p-4 p-lg-5 text-center d-flex flex-column align-items-center">
                    <div class="mb-4 rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 80px; height: 80px; background-color: #0078D4;">
                        <i class="bi bi-hand-thumbs-up-fill fs-2 text-white"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Pelayanan Prima</h4>
                    <p class="text-muted mb-0 mt-auto px-lg-3" style="line-height: 1.6;">
                        Tim admin kami yang ramah siap membantu proses pemberkasan dan konsultasi kebutuhan pelatihan Anda dengan respon cepat.
                    </p>
                </div>
                <div class="p-1 border-0" style="background-color: #0078D4;"></div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 hover-card overflow-hidden">
                <div class="card-body p-4 p-lg-5 text-center d-flex flex-column align-items-center">
                    <div class="mb-4 rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 80px; height: 80px; background-color: #0078D4;">
                        <i class="bi bi-mortarboard-fill fs-2 text-white"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Instruktur Praktisi</h4>
                    <p class="text-muted mb-0 mt-auto px-lg-3" style="line-height: 1.6;">
                        Belajar langsung dari para praktisi senior yang telah berpengalaman puluhan tahun di berbagai industri besar di Indonesia.
                    </p>
                </div>
                <div class="p-1 border-0" style="background-color: #0078D4;"></div>
            </div>
        </div>
    </div>
</div>

<section class="py-5 position-relative overflow-hidden" style="background-color: #fcfdfe;">
    <div class="position-absolute top-0 end-0 mt-5 me-n5 opacity-10 d-none d-lg-block">
        <i class="bi bi-shield-check" style="font-size: 20rem; color: #0078D4;"></i>
    </div>

    <div class="container py-lg-5 position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <div class="col-md-5 mb-5 mb-md-0">
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <div class="position-absolute bottom-0 start-0 mb-n3 ms-n3 bg-primary rounded-4 w-100 h-100" style="z-index: 1;"></div>
                    <div class="position-relative overflow-hidden rounded-4 shadow-lg" style="z-index: 2; border: 4px solid white;">
                        <img src="<?php echo e(asset('images/PakDimas.png')); ?>" alt="Nct Dimas Julian Zahid A" class="img-fluid hover-zoom" style="width: 100%; transition: transform 0.5s; object-fit: cover;">
                    </div>
                    <div class="position-absolute bottom-0 end-0 mb-4 me-n3 bg-white p-3 rounded-4 shadow-lg d-none d-md-block" style="z-index: 3; min-width: 150px;">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning p-2 rounded-circle me-3">
                                <i class="bi bi-award-fill text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold small text-dark">Verified Expert</h6>
                                <small class="text-muted">Grad. IOSH</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-7 ps-lg-5">
                <div class="text-center text-md-start">
                    <div class="d-inline-flex align-items-center mb-3">
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-bold">MESSAGE FROM THE CEO</span>
                    </div>
                    
                    <h2 class="fw-bold mb-4 display-5" style="color: #003459; letter-spacing: -1px;">Membangun Masa Depan <span class="text-primary">Industri yang Aman</span></h2>
                    
                    <div class="position-relative mb-4">
                        <i class="bi bi-quote fs-1 text-primary opacity-25"></i>
                        <p class="fs-5 text-secondary lh-lg" style="font-style: italic; text-align: justify; border-left: 3px solid #dee2e6; padding-left: 1.5rem;">
                            "Keselamatan dan kesehatan kerja (K3) bukan sekadar pemenuhan regulasi, melainkan sebuah investasi jangka panjang bagi keberlangsungan industri. Bersama <strong>PT Sertifikasi Kompetensi Indonesia (SKI)</strong>, kami berkomitmen untuk melahirkan tenaga ahli yang kompeten, berdaya saing global, dan siap menjadi garda terdepan dalam menjaga aset paling berharga perusahaan: nyawa manusia."
                        </p>
                    </div>

                    <div class="mt-5 pt-3 border-top">
                        <h4 class="fw-bold mb-1 text-dark">
                            Nct Dimas Julian Zahid A <span class="fs-6 fw-normal text-muted">, AMK, S.Kep, MKM, CPRM, CWCCA, Grad. IOSH</span>
                        </h4>
                        <p class="text-primary fw-bold text-uppercase small mb-0" style="letter-spacing: 2px;">Presiden Direktur PT SKI</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="py-5" style="background-color: #ffffff;">
    <div class="container">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="background: linear-gradient(135deg, #0078D4 0%, #003459 100%);">
            <div class="row g-0 align-items-center text-center text-lg-start">
                <div class="col-lg-6">
                    <img src="<?php echo e(asset('images/webinar/poster-safety-leadership.jpeg')); ?>" class="img-fluid rounded-4 shadow" alt="Poster Webinar Safety Leadership">
                </div>
                
                <div class="col-lg-6 p-4 p-lg-5 text-white">
                    <div class="badge bg-danger text-white mb-3 px-3 py-2 rounded-pill fw-bold">FREE WEBINAR</div>
                    <h2 class="fw-bold mb-3 display-6 text-white">Webinar Nasional: Safety Leadership</h2>
                    <p class="opacity-75 mb-4 text-white">
                        Pemimpin Sebagai Kunci Budaya K3 Indonesia. Pahami peran kepemimpinan dalam membangun budaya keselamatan kerja yang kuat langsung dari ahlinya. Terbuka untuk Umum, Mahasiswa, & Praktisi.
                    </p>
                    
                    <div class="row g-3 mb-4 text-white">
                        <div class="col-6">
                            <div class="small opacity-75 text-uppercase text-white">Tanggal</div>
                            <div class="fw-bold fs-5 text-white"><i class="bi bi-calendar3 me-2 text-warning"></i>29 April 2026</div>
                        </div>
                        <div class="col-6">
                            <div class="small opacity-75 text-uppercase text-white">Waktu</div>
                            <div class="fw-bold fs-5 text-white"><i class="bi bi-clock me-2 text-warning"></i>20.00 WIB - Selesai</div>
                        </div>
                    </div>

                    <div class="d-grid d-md-flex gap-3">
                        <a href="https://forms.gle/NkmYkiTCrSW6xnyh8" target="_blank" class="btn btn-warning btn-lg rounded-pill px-5 fw-bold shadow-sm text-dark">
                            <i class="bi bi-pencil-square me-2"></i>DAFTAR SEKARANG (GRATIS)
                        </a>
                        <a href="<?php echo e(route('webinar.absensi')); ?>" class="btn btn-outline-light btn-lg rounded-pill px-4 fw-bold shadow-sm">
                            <i class="bi bi-check2-circle me-2"></i>ISI ABSENSI
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="text-center mb-5">
        <h6 class="fw-bold text-uppercase" style="color: #0078D4;">Program Unggulan</h6>
        <h2 class="fw-bold text-dark">Pilih Sertifikasi Sesuai Kebutuhan</h2>
        <p class="text-muted">Tersedia 25 skema sertifikasi dengan syarat minimal SMA/SMK.</p>
    </div>

    <div class="row g-4">
        <?php $__currentLoopData = $pelatihanUnggulan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slug => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm overflow-hidden hover-card">
                <div class="position-relative">
                    <img src="<?php echo e($data['image']); ?>" class="card-img-top" alt="<?php echo e($data['title']); ?>" style="height: 200px; object-fit: cover;">
                    <div class="position-absolute top-0 end-0 m-2">
                        <span class="badge bg-primary rounded-pill small px-3 shadow-sm">BNSP</span>
                    </div>
                </div>

                <div class="card-body p-4 text-center d-flex flex-column">
                    <h6 class="fw-bold mb-2 text-dark"><?php echo e($data['title']); ?></h6>
                    <p class="text-muted small mb-3">
                        <i class="bi bi-clock me-1"></i> Durasi: <?php echo e($data['durasi']); ?>

                    </p>
                    
                    <div class="mt-auto d-grid gap-2">
                        <a href="<?php echo e(route('pelatihan.show', $slug)); ?>" class="btn btn-outline-primary rounded-pill fw-bold btn-sm">Detail Program</a>
                        <a href="https://wa.me/6289514692974?text=Halo%20Admin%20SKI,%20saya%20ingin%20daftar%20pelatihan%20<?php echo e($data['title']); ?>" class="btn btn-primary rounded-pill fw-bold btn-sm text-white">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="text-center mt-5">
        <a href="<?php echo e(route('pelatihan.index')); ?>" class="btn btn-primary btn-lg px-5 rounded-pill fw-bold shadow-sm">
            LIHAT SEMUA 25 SKEMA <i class="bi bi-arrow-right ms-2"></i>
        </a>
    </div>
</div>

<div class="text-white py-5" style="background-color: #0078D4;">
    <div class="container text-center py-4 text-white">
        <h2 class="fw-bold mb-4 text-white text-uppercase">Siap Meningkatkan Kompetensi Anda?</h2>
        <p class="lead mb-4 opacity-75 col-lg-8 mx-auto text-white">Jangan tunda karir Anda. Jadilah tenaga ahli K3 yang kompeten dan bersertifikat resmi bersama kami.</p>
        <a href="https://wa.me/6289514692974?text=Halo%20Admin%20SKI,%20saya%20ingin%20daftar%20sekarang" class="btn btn-light btn-lg rounded-pill px-5 py-3 fw-bold shadow" style="color: #0078D4;">
            Daftar Sekarang <i class="bi bi-arrow-right ms-2"></i>
        </a>
    </div>
</div>

<?php $__env->startPush('styles'); ?>
<style>
    .hover-top:hover { transform: translateY(-3px); transition: 0.3s; }
    .hover-card { transition: transform 0.3s; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
    .hover-card:hover { transform: translateY(-7px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
    
    .btn-outline-primary:hover {
        background-color: #0078D4 !important;
        color: white !important;
    }
    .letter-spacing-2 { letter-spacing: 2px; }
    .card-img-top {
        transition: transform 0.5s ease;
    }
    .hover-card:hover .card-img-top {
        transform: scale(1.1);
    }
    
    .bg-primary-subtle { background-color: #e7f1ff; }
    .text-primary { color: #0078D4 !important; }
    .hover-zoom:hover { transform: scale(1.05); }
    .display-3 { font-size: 3.2rem; }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Downloads\app\resources\views/home.blade.php ENDPATH**/ ?>