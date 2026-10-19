

<?php $__env->startSection('title', $pelatihan['title']); ?>

<?php $__env->startSection('content'); ?>
<div class="position-relative mb-5" style="margin-top: -1.5rem;">
    <div style="height: 350px; background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?php echo e($pelatihan['image']); ?>'); background-size: cover; background-position: center;">
        <div class="container h-100">
            <div class="d-flex flex-column justify-content-center h-100 text-white">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('pelatihan.index')); ?>" class="text-white opacity-75 text-decoration-none">Pelatihan</a></li>
                        <li class="breadcrumb-item active text-white fw-bold" aria-current="page"><?php echo e($pelatihan['title']); ?></li>
                    </ol>
                </nav>
                <h1 class="display-5 fw-bold text-uppercase"><?php echo e($pelatihan['title']); ?></h1>
                <p class="lead opacity-75">Sertifikasi Kompetensi BNSP - Standar Nasional Indonesia</p>
            </div>
        </div>
    </div>
</div>

<div class="container pb-5">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                <div class="d-flex align-items-center mb-4 text-dark">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3">
                        <i class="bi bi-info-circle-fill text-primary fs-3"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0">Deskripsi Program</h4>
                        <small class="text-muted">Mengenai skema sertifikasi ini</small>
                    </div>
                </div>
                <p class="text-muted mb-4" style="line-height: 1.8;">
                    Program sertifikasi <strong><?php echo e($pelatihan['title']); ?></strong> dirancang untuk membekali peserta dengan kompetensi teknis dan manajerial sesuai standar SKKNI. Sertifikat yang diterbitkan oleh <strong>BNSP</strong> berlaku secara nasional.
                </p>
                
                <hr class="my-4 opacity-25">

                <h5 class="fw-bold mb-4 text-dark"><i class="bi bi-journal-text text-primary me-2"></i>Kurikulum & Materi Pelatihan</h5>
                <div class="row">
                    <?php $__currentLoopData = $pelatihan['materi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start p-3 rounded-3 bg-light h-100">
                            <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                            <span class="fw-medium text-dark"><?php echo e($materi); ?></span>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="sticky-top" style="top: 2rem; z-index: 10;">
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                    <h5 class="fw-bold mb-4 text-dark">Ringkasan Kursus</h5>
                    <div class="list-group list-group-flush mb-4 text-dark">
                        <div class="list-group-item border-0 px-0 d-flex justify-content-between">
                            <span class="text-muted">Durasi</span>
                            <span class="fw-bold"><?php echo e($pelatihan['durasi']); ?></span>
                        </div>
                    </div>
                    <div class="d-grid gap-3">
                        <a href="<?php echo e(route('register.form', ['skema' => $pelatihan['title']])); ?>" class="btn btn-primary btn-lg rounded-pill fw-bold text-white py-3">DAFTAR SEKARANG</a>
                        <a href="https://wa.me/6289514692974?text=<?php echo e(urlencode('Selamat siang Admin SKI, saya tertarik daftar pelatihan ' . $pelatihan['title'] . '. Apakah masih ada kuota?')); ?>" 
                           target="_blank" class="btn btn-outline-success btn-lg rounded-pill fw-bold py-3">
                            <i class="bi bi-whatsapp me-2"></i>CEK KUOTA
                        </a>
                    </div>
                </div>
                <div class="card border-0 shadow rounded-4 overflow-hidden">
                    <div class="bg-dark text-white p-2 text-center small fw-bold text-uppercase">Poster Resmi</div>
                    <img src="<?php echo e($pelatihan['poster']); ?>" onerror="this.src='<?php echo e($pelatihan['image']); ?>'" class="img-fluid w-100">
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Downloads\app\resources\views/pelatihan/show.blade.php ENDPATH**/ ?>