@extends('layouts.app')

@section('title', 'Detail Peserta - ' . $participant->full_name)

@section('content')
<div class="container-fluid py-4" style="background-color: #f8f9fa; min-height: 100vh;">
    <div class="container mb-4">
        <a href="{{ route('admin.participants.index') }}" class="btn btn-white btn-sm shadow-sm rounded-pill px-3 border bg-white text-decoration-none text-dark">
            <i class="bi bi-arrow-left me-2 text-primary"></i>Kembali ke Daftar Peserta
        </a>
    </div>

    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                    <div class="card-header py-3 px-4 border-0 text-white" style="background-color: #0078D4;">
                        <h5 class="mb-0 fw-bold"><i class="bi bi-person-lines-fill me-2"></i>Data Lengkap Peserta</h5>
                    </div>
                    <div class="card-body p-4 p-lg-5">
                        <div class="table-responsive">
                            <table class="table table-borderless align-middle">
                                <tbody>
                                    <tr>
                                        <td class="text-muted" width="35%">Nama Lengkap</td>
                                        <td class="fw-bold fs-5 text-dark">{{ $participant->full_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">ID Pendaftaran</td>
                                        <td class="font-monospace fw-bold" style="color: #0078D4;">
                                            {{ 'REG-' . $participant->created_at->format('Ym') . str_pad($participant->id, 5, '0', STR_PAD_LEFT) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Tanggal Daftar</td>
                                        <td class="text-dark">{{ $participant->created_at->format('d F Y, H:i') }} WIB</td>
                                    </tr>
                                    <tr><td colspan="2"><hr class="opacity-50"></td></tr>
                                    <tr>
                                        <td class="text-muted">Email</td>
                                        <td>
                                            <a href="mailto:{{ $participant->email }}" class="text-decoration-none fw-bold" style="color: #0078D4;">
                                                {{ $participant->email }} <i class="bi bi-box-arrow-up-right small ms-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Nomor WhatsApp</td>
                                        <td>
                                            <a href="https://wa.me/{{ preg_replace('/^0/', '62', $participant->phone) }}" target="_blank" class="btn btn-sm btn-success rounded-pill px-3 fw-bold">
                                                <i class="bi bi-whatsapp me-1"></i> {{ $participant->phone }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr><td colspan="2"><hr class="opacity-50"></td></tr>
                                    <tr>
                                        <td class="text-muted">Perusahaan</td>
                                        <td class="fw-bold text-dark">{{ $participant->company }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Jabatan</td>
                                        <td class="text-dark">{{ $participant->position }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Skema Sertifikasi</td>
                                        <td>
                                            <span class="badge rounded-pill px-3 py-2 fw-normal" style="background-color: #e7f3ff; color: #0078D4; border: 1px solid #d0e8ff;">
                                                {{ $participant->certification_type }}
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                    <div class="card-header py-3 px-4 border-0 bg-white d-flex align-items-center border-bottom">
                        <div class="bg-primary bg-opacity-10 p-2 rounded-3 me-3">
                            <i class="bi bi-folder2-open text-primary fs-5"></i>
                        </div>
                        <h5 class="mb-0 fw-bold text-dark">Berkas Persyaratan</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-3 col-6">
                                <div class="p-3 border rounded-4 text-center h-100 transition-hover bg-light bg-opacity-50">
                                    <i class="bi bi-file-earmark-pdf text-danger fs-1 mb-2 d-block"></i>
                                    <span class="d-block small fw-bold text-muted text-uppercase mb-3">Ijazah</span>
                                    <a href="{{ route('admin.participants.file', [$participant->id, 'ijazah']) }}" target="_blank" class="btn btn-sm btn-white border rounded-pill px-2 shadow-sm w-100 fw-bold text-primary">
                                        <i class="bi bi-eye me-1"></i> Lihat
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-6">
                                <div class="p-3 border rounded-4 text-center h-100 transition-hover bg-light bg-opacity-50">
                                    <i class="bi bi-card-heading text-primary fs-1 mb-2 d-block"></i>
                                    <span class="d-block small fw-bold text-muted text-uppercase mb-3">KTP</span>
                                    <a href="{{ route('admin.participants.file', [$participant->id, 'ktp']) }}" target="_blank" class="btn btn-sm btn-white border rounded-pill px-2 shadow-sm w-100 fw-bold text-primary">
                                        <i class="bi bi-eye me-1"></i> Lihat
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-3 col-6">
                                <div class="p-3 border rounded-4 text-center h-100 transition-hover bg-light bg-opacity-50">
                                    <i class="bi bi-briefcase text-warning fs-1 mb-2 d-block"></i>
                                    <span class="d-block small fw-bold text-muted text-uppercase mb-3">Ket. Kerja</span>
                                    <a href="{{ route('admin.participants.file', [$participant->id, 'surat_kerja']) }}" target="_blank" class="btn btn-sm btn-white border rounded-pill px-2 shadow-sm w-100 fw-bold text-primary">
                                        <i class="bi bi-eye me-1"></i> Lihat
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-3 col-6">
                                <div class="p-3 border rounded-4 text-center h-100 transition-hover bg-light bg-opacity-50">
                                    <i class="bi bi-image text-success fs-1 mb-2 d-block"></i>
                                    <span class="d-block small fw-bold text-muted text-uppercase mb-3">Pas Foto</span>
                                    <a href="{{ route('admin.participants.file', [$participant->id, 'foto']) }}" target="_blank" class="btn btn-sm btn-white border rounded-pill px-2 shadow-sm w-100 fw-bold text-primary">
                                        <i class="bi bi-eye me-1"></i> Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                    <div class="card-header bg-white py-3 px-4 border-bottom">
                        <h5 class="mb-0 fw-bold text-dark"><i class="bi bi-shield-check me-2 text-primary"></i>Status Validasi</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <p class="text-muted mb-2 small text-uppercase fw-bold">Status Saat Ini</p>
                            @if($participant->status == 'pending')
                                <div class="badge bg-warning bg-opacity-10 text-warning fs-6 px-4 py-2 rounded-pill border border-warning border-opacity-25 w-100">
                                    <i class="bi bi-hourglass-split me-2"></i>Menunggu Verifikasi
                                </div>
                            @elseif($participant->status == 'approved')
                                <div class="badge bg-success bg-opacity-10 text-success fs-6 px-4 py-2 rounded-pill border border-success border-opacity-25 w-100 mb-3">
                                    <i class="bi bi-check-circle-fill me-2"></i>LULUS (APPROVED)
                                </div>
                                <div class="p-3 rounded-3 text-start border" style="background-color: #f0f7ff; border-color: #d0e8ff !important;">
                                    <small class="text-muted d-block mb-1">Nomor Sertifikat:</small>
                                    <div class="fw-bold font-monospace fs-5" style="color: #0078D4;">
                                        <i class="bi bi-award me-1"></i> {{ $participant->certificate_number ?? 'BELUM GENERATE' }}
                                    </div>
                                    @if($participant->certificate_date)
                                    <small class="text-muted d-block mt-2 small">Terbit: {{ \Carbon\Carbon::parse($participant->certificate_date)->format('d M Y') }}</small>
                                    @endif
                                </div>
                            @else
                                <div class="badge bg-danger bg-opacity-10 text-danger fs-6 px-4 py-2 rounded-pill border border-danger border-opacity-25 w-100">
                                    <i class="bi bi-x-circle-fill me-2"></i>DITOLAK
                                </div>
                            @endif
                        </div>

                        <hr class="opacity-50">

                        <form action="{{ route('admin.participants.updateStatus', $participant->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Ganti Status</label>
                                <select name="status" class="form-select border-0 bg-light rounded-3 py-2" required>
                                    <option value="pending" {{ $participant->status == 'pending' ? 'selected' : '' }}>Pending (Tahan)</option>
                                    <option value="approved" {{ $participant->status == 'approved' ? 'selected' : '' }}>✅ SETUJUI (LULUS)</option>
                                    <option value="rejected" {{ $participant->status == 'rejected' ? 'selected' : '' }}>❌ TOLAK</option>
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label fw-bold small text-muted text-uppercase">Catatan Admin</label>
                                <textarea name="notes" class="form-control border-0 bg-light rounded-3" rows="4" placeholder="Alasan tolak atau catatan tambahan...">{{ $participant->notes }}</textarea>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg shadow rounded-pill fw-bold py-3" style="background-color: #0078D4; border: none;">
                                    <i class="bi bi-save me-2"></i>Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Efek Hover untuk Berkas */
    .transition-hover {
        transition: all 0.3s ease;
        border: 1px solid #eee !important;
    }
    .transition-hover:hover {
        background-color: #ffffff !important;
        border-color: #0078D4 !important;
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
    }
    /* Tombol Putih Elegan */
    .btn-white {
        background-color: #fff;
        color: #0078D4;
        transition: all 0.2s ease;
    }
    .btn-white:hover {
        background-color: #0078D4;
        color: #fff !important;
    }
    /* Responsive Table Fix */
    .table td {
        padding: 12px 8px;
    }
</style>
@endsection