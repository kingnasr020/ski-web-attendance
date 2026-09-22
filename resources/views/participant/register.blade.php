@extends('layouts.app')

@section('title', 'Formulir Pendaftaran')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-success text-white p-4 position-relative">
                    <div class="d-flex align-items-center position-relative z-1">
                        <div class="bg-white text-success rounded-circle p-3 me-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="bi bi-person-plus-fill fs-3"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 fw-bold">Formulir Pendaftaran Sertifikasi</h4>
                            <p class="mb-0 text-white-50 small">LSP K3 Nasional - Silakan lengkapi data diri Anda.</p>
                        </div>
                    </div>
                    <i class="bi bi-file-earmark-text position-absolute" style="right: 20px; bottom: -20px; font-size: 10rem; opacity: 0.1;"></i>
                </div>

                <div class="card-body p-4 p-md-5 bg-light">
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <h6 class="text-success fw-bold text-uppercase mb-3"><i class="bi bi-person-lines-fill me-2"></i>Data Pribadi</h6>
                            <div class="card border-0 shadow-sm p-3 bg-white rounded-3">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold small text-secondary">Nama Lengkap (Beserta Gelar)</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary border-end-0"><i class="bi bi-person"></i></span>
                                            <input type="text" name="full_name" class="form-control border-start-0 ps-0" placeholder="Contoh: Budi Santoso, S.T." required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small text-secondary">Alamat Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary border-end-0"><i class="bi bi-envelope"></i></span>
                                            <input type="email" name="email" class="form-control border-start-0 ps-0" placeholder="email@contoh.com" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small text-secondary">Nomor WhatsApp</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary border-end-0"><i class="bi bi-whatsapp"></i></span>
                                            <input type="number" name="phone" class="form-control border-start-0 ps-0" placeholder="0812xxxx" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="text-success fw-bold text-uppercase mb-3"><i class="bi bi-building me-2"></i>Data Pekerjaan</h6>
                            <div class="card border-0 shadow-sm p-3 bg-white rounded-3">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small text-secondary">Asal Perusahaan / Instansi</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary border-end-0"><i class="bi bi-buildings"></i></span>
                                            <input type="text" name="company" class="form-control border-start-0 ps-0" placeholder="PT. Maju Jaya" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small text-secondary">Jabatan Saat Ini</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary border-end-0"><i class="bi bi-briefcase"></i></span>
                                            <input type="text" name="position" class="form-control border-start-0 ps-0" placeholder="Safety Officer / Staff" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="text-success fw-bold text-uppercase mb-3"><i class="bi bi-award me-2"></i>Program Sertifikasi (LSP K3 Nasional)</h6>
                            <div class="card border-0 shadow-sm p-3 bg-white rounded-3">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold small text-secondary">Pilih Skema Sertifikasi</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary border-end-0"><i class="bi bi-check2-square"></i></span>
                                            <select name="certification_type" class="form-select border-start-0 ps-0" required>
                                                <option value="" disabled selected>-- Silakan Pilih Skema Kompetensi --</option>
                                                
                                                <optgroup label="Umum, Manajemen & Migas">
                                                    <option value="Ahli K3 Umum">1. Ahli K3 Umum</option>
                                                    <option value="Auditor SMK3">2. Auditor SMK3</option>
                                                    <option value="Pengawas K3 Industri Migas">3. Pengawas K3 Industri Migas</option>
                                                    <option value="AGT">4. AGT (Authorized Gas Tester)</option>
                                                    <option value="Penanganan Bahaya Gas H2S">5. Penanganan Bahaya Gas H2S</option>
                                                    <option value="Operator K3">6. Operator K3</option>
                                                    <option value="Petugas K3">7. Petugas K3</option>
                                                </optgroup>

                                                <optgroup label="Kesehatan, Lab & Higiene">
                                                    <option value="Pengawasan K3 RS & Fasyankes">8. Pengawasan K3 RS & Fasyankes</option>
                                                    <option value="Pengawasan K3 Lab">9. Pengawasan K3 Lab</option>
                                                    <option value="HAZOPS">10. HAZOPS</option>
                                                    <option value="Petugas P3K">11. Petugas P3K (First Aid)</option>
                                                    <option value="Investigasi Kecelakaan">12. Investigasi Kecelakaan</option>
                                                    <option value="Paramedis K3 Muda">13. Paramedis K3 Muda</option>
                                                    <option value="Paramedis K3 Madya">14. Paramedis K3 Madya</option>
                                                    <option value="Paramedis K3 Utama">15. Paramedis K3 Utama</option>
                                                </optgroup>

                                                <optgroup label="Higiene Industri & Teknis">
                                                    <option value="Pengkaji Teknis Proteksi Kebakaran">16. Pengkaji Teknis Proteksi Kebakaran</option>
                                                    <option value="Ahli Higiene Industri Muda">17. Ahli Higiene Industri Muda</option>
                                                    <option value="Ahli Higiene Industri Madya">18. Ahli Higiene Industri Madya</option>
                                                    <option value="Ahli Higiene Industri Utama">19. Ahli Higiene Industri Utama</option>
                                                    <option value="Teknisi Ruang Terbatas">20. Teknisi Ruang Terbatas</option>
                                                    <option value="Ahli Muda Ruang Terbatas">21. Ahli Muda Ruang Terbatas</option>
                                                    <option value="Ahli Madya Ruang Terbatas">22. Ahli Madya Ruang Terbatas</option>
                                                    <option value="Ahli Utama Ruang Terbatas">23. Ahli Utama Ruang Terbatas</option>
                                                    <option value="Teknisi K3 Listrik">24. Teknisi K3 Listrik</option>
                                                    <option value="Ahli K3 Listrik">25. Ahli K3 Listrik</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="form-text text-muted small mt-2">
                                            *Pilih skema sesuai dengan bidang kompetensi yang akan diujikan.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="text-success fw-bold text-uppercase mb-3"><i class="bi bi-file-earmark-arrow-up me-2"></i>Persyaratan Dokumen (Upload)</h6>
                            <div class="card border-0 shadow-sm p-3 bg-white rounded-3">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small text-secondary">Scan Ijazah Terakhir (Min. SMA/Sederajat) <span class="text-danger">*</span></label>
                                        <input type="file" name="ijazah" class="form-control bg-light" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small text-secondary">Scan KTP Asli / Masih Berlaku <span class="text-danger">*</span></label>
                                        <input type="file" name="ktp" class="form-control bg-light" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small text-secondary">Pas Foto (Background Merah) <span class="text-danger">*</span></label>
                                        <input type="file" name="foto" class="form-control bg-light" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small text-secondary">Surat Keterangan Kerja (Opsional)</label>
                                        <input type="file" name="surat_kerja" class="form-control bg-light">
                                    </div>
                                    <div class="col-12 mt-2">
                                        <small class="text-muted"><i class="bi bi-info-circle me-1"></i>Format file: JPG, PNG, atau PDF (Maks. 2MB per file)</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                                <label class="form-check-label small text-secondary" for="terms">
                                    Saya menyatakan data ini benar dan siap mengikuti proses asesmen sesuai skema yang dipilih.
                                </label>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg shadow-sm py-3 fw-bold rounded-pill">
                                <i class="bi bi-paperplane-fill me-2"></i> KIRIM PENDAFTARAN
                            </button>
                            <a href="{{ url('/') }}" class="btn btn-link text-decoration-none text-muted small">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection