@extends('layouts.app')

@section('title', 'Detail Peserta')

@section('content')
<div class="container-fluid py-4">
    <div class="mb-4">
        <a href="{{ route('admin.participants.index') }}" class="btn btn-outline-secondary btn-sm shadow-sm">
            <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Peserta
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-person-lines-fill me-2"></i>Data Lengkap Peserta</h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="text-muted" width="30%">Nama Lengkap</td>
                                    <td class="fw-bold fs-5">{{ $participant->full_name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">ID Pendaftaran</td>
                                    <td class="font-monospace text-primary">#{{ $participant->id }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Tanggal Daftar</td>
                                    <td>{{ $participant->created_at->format('d F Y, H:i') }} WIB</td>
                                </tr>
                                <tr><td colspan="2"><hr></td></tr>
                                <tr>
                                    <td class="text-muted">Email</td>
                                    <td>
                                        <a href="mailto:{{ $participant->email }}" class="text-decoration-none">
                                            {{ $participant->email }} <i class="bi bi-box-arrow-up-right small ms-1"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Nomor WhatsApp</td>
                                    <td>
                                        <a href="https://wa.me/{{ preg_replace('/^0/', '62', $participant->phone) }}" target="_blank" class="text-success text-decoration-none fw-bold">
                                            <i class="bi bi-whatsapp me-1"></i> {{ $participant->phone }}
                                        </a>
                                    </td>
                                </tr>
                                <tr><td colspan="2"><hr></td></tr>
                                <tr>
                                    <td class="text-muted">Perusahaan</td>
                                    <td class="fw-bold">{{ $participant->company }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Jabatan</td>
                                    <td>{{ $participant->position }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Skema Sertifikasi</td>
                                    <td>
                                        <span class="badge bg-primary fs-6">{{ $participant->certification_type }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="mb-0 fw-bold text-dark"><i class="bi bi-shield-check me-2"></i>Status Validasi</h5>
                </div>
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <p class="text-muted mb-2 small">Status Saat Ini:</p>
                        @if($participant->status == 'pending')
                            <div class="badge bg-warning text-dark fs-5 px-4 py-2 rounded-pill shadow-sm">
                                <i class="bi bi-hourglass-split me-2"></i>Menunggu Verifikasi
                            </div>
                        @elseif($participant->status == 'approved')
                            <div class="badge bg-success fs-5 px-4 py-2 rounded-pill shadow-sm">
                                <i class="bi bi-check-circle-fill me-2"></i>LULUS (APPROVED)
                            </div>
                            <div class="mt-3 p-3 bg-light border border-success rounded text-start">
                                <small class="text-muted d-block mb-1">Nomor Sertifikat:</small>
                                <div class="fw-bold text-success font-monospace fs-5">
                                    <i class="bi bi-award me-1"></i> {{ $participant->certificate_number }}
                                </div>
                                <small class="text-muted d-block mt-2">Terbit: {{ \Carbon\Carbon::parse($participant->certificate_date)->format('d M Y') }}</small>
                            </div>
                        @else
                            <div class="badge bg-danger fs-5 px-4 py-2 rounded-pill shadow-sm">
                                <i class="bi bi-x-circle-fill me-2"></i>DITOLAK
                            </div>
                        @endif
                    </div>

                    <hr>

                    <form action="{{ route('admin.participants.update-status', $participant->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Update Status:</label>
                            <select name="status" class="form-select form-select-lg mb-3" required>
                                <option value="pending" {{ $participant->status == 'pending' ? 'selected' : '' }}>Pending (Tahan)</option>
                                <option value="approved" {{ $participant->status == 'approved' ? 'selected' : '' }}>✅ SETUJUI (LULUS)</option>
                                <option value="rejected" {{ $participant->status == 'rejected' ? 'selected' : '' }}>❌ TOLAK</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Catatan Admin (Opsional):</label>
                            <textarea name="notes" class="form-control" rows="3" placeholder="Contoh: Dokumen lengkap, pembayaran lunas.">{{ $participant->notes }}</textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark btn-lg shadow fw-bold">
                                <i class="bi bi-save me-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection