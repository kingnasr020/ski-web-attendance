@extends('layouts.app')

@section('title', 'Validasi Sertifikat')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0"><i class="bi bi-search"></i> Validasi Keaslian Sertifikat</h4>
            </div>
            <div class="card-body">
                <p class="text-muted mb-4">Masukkan nomor sertifikat untuk memverifikasi keaslian dan status sertifikat K3.</p>
                
                <form action="{{ route('certificate.validate') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="certificate_number" class="form-label">Nomor Sertifikat *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                            <input type="text" class="form-control @error('certificate_number') is-invalid @enderror" 
                                   id="certificate_number" name="certificate_number" 
                                   placeholder="Contoh: CERT-202401-0001" required>
                            @error('certificate_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-text">Masukkan nomor sertifikat lengkap yang tertera pada sertifikat Anda.</div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-info btn-lg">
                            <i class="bi bi-check-circle"></i> Validasi Sertifikat
                        </button>
                    </div>
                </form>
                
                <hr class="my-4">
                
                <div class="alert alert-warning">
                    <h5><i class="bi bi-exclamation-triangle"></i> Tips Validasi</h5>
                    <ul class="mb-0">
                        <li>Pastikan nomor sertifikat dimasukkan dengan benar</li>
                        <li>Nomor sertifikat bersifat case-sensitive</li>
                        <li>Sertifikat yang sudah kadaluarsa akan ditampilkan statusnya</li>
                        <li>Jika menemukan ketidaksesuaian, hubungi admin</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection