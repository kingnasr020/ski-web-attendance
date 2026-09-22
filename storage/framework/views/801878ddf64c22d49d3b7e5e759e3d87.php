<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - PT Sertifikasi Kompetensi Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        /* STICKY FOOTER */
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
            background-color: #f0f2f5; /* Abu-abu yang sedikit lebih empuk di mata */
        }
        main {
            flex: 1 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        footer {
            flex-shrink: 0;
            background-color: #1a1a1a;
            color: white;
            padding: 1.5rem 0;
            border-top: 3px solid #0078D4; /* Garis pembatas biru di atas footer */
        }
        
        /* CARD DESIGN */
        .card-login {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
        }
        .login-header {
            background-color: #0078D4; /* BIRU SKI SOLID */
            padding: 2.5rem 1.5rem;
            text-align: center;
            color: white;
        }
        .btn-login {
            background-color: #0078D4;
            border: none;
            padding: 14px;
            font-weight: 700;
            letter-spacing: 1px;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background-color: #005a9e;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,120,212,0.3);
        }
        /* Update teks identitas agar tidak hijau lagi */
        .text-ski {
            color: #0078D4 !important;
        }
        .input-group-text {
            background-color: #f8f9fa;
            color: #0078D4;
        }
    </style>
</head>
<body>

    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    
                    <div class="text-center mb-4">
                        <a href="<?php echo e(url('/')); ?>" class="text-decoration-none">
                            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" style="height: 60px;" class="mb-3">
                            <h5 class="fw-bold text-ski mb-0">PT Sertifikasi Kompetensi Indonesia</h5>
                            <small class="text-muted text-uppercase letter-spacing-1">Official Management System</small>
                        </a>
                    </div>

                    <div class="card card-login">
                        <div class="login-header">
                            <div class="mb-3">
                                <i class="bi bi-shield-lock fs-1"></i>
                            </div>
                            <h4 class="fw-bold mb-1">Login Admin</h4>
                            <p class="small text-white-50 mb-0">Kelola data sertifikasi dengan aman</p>
                        </div>

                        <div class="card-body p-4 p-lg-5 bg-white">
                            <form method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>

                                <div class="mb-3">
                                    <label for="email" class="form-label small fw-bold text-secondary text-uppercase">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-end-0"><i class="bi bi-person-fill"></i></span>
                                        <input id="email" type="email" class="form-control border-start-0 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="admin@ski.com">
                                    </div>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback d-block small mt-1" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="form-label small fw-bold text-secondary text-uppercase">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-end-0"><i class="bi bi-key-fill"></i></span>
                                        <input id="password" type="password" class="form-control border-start-0 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" placeholder="********">
                                    </div>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback d-block small mt-1" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="mb-4 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                        <label class="form-check-label small text-muted" for="remember">Ingat Saya</label>
                                    </div>
                                    <a href="#" class="small text-decoration-none text-ski">Lupa Password?</a>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-login rounded-pill text-white shadow">
                                        MASUK DASHBOARD <i class="bi bi-arrow-right-short fs-5 align-middle"></i>
                                    </button>
                                </div>

                            </form>
                        </div>
                        <div class="card-footer bg-light text-center p-3 border-0">
                            <a href="<?php echo e(url('/')); ?>" class="text-decoration-none small text-muted hover-ski">
                                <i class="bi bi-house-door me-1"></i> Kembali ke Website Utama
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container text-center">
            <p class="mb-1 small fw-bold">&copy; <?php echo e(date('Y')); ?> PT Sertifikasi Kompetensi Indonesia</p>
            <p class="mb-0 small text-white-50">Authorized Training & Certification Center</p>
        </div>
    </footer>

</body>
</html><?php /**PATH D:\Downloads\app\resources\views/auth/login.blade.php ENDPATH**/ ?>