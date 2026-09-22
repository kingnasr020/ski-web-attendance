@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('styles')
<style>
    /* Style Kartu Statistik - Menggunakan Biru SKI sebagai base */
    .stat-card {
        border: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        position: relative;
        border-radius: 15px;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.12) !important;
    }
    .stat-card .icon-bg {
        position: absolute;
        right: 15px;
        bottom: -15px;
        font-size: 5rem;
        opacity: 0.15;
        transform: rotate(-15deg);
        color: white;
    }
    /* Style Tabel */
    .table-hover tbody tr:hover {
        background-color: #f0f7ff; /* Biru sangat muda saat hover */
    }
    .badge-ski {
        background-color: #e7f3ff;
        color: #0078D4;
        border: 1px solid #d0e8ff;
    }
</style>
@endsection

@section('content')
<div class="container-fluid py-4" style="background-color: #f8f9fa; min-height: 100vh;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h3 mb-0 fw-bold" style="color: #0078D4;"><i class="bi bi-speedometer2 me-2"></i>Dashboard Admin</h2>
            <p class="text-muted mb-0 small text-uppercase letter-spacing-1">PT Sertifikasi Kompetensi Indonesia</p>
        </div>
        <div>
            <button class="btn btn-primary shadow-sm rounded-pill px-4" style="background-color: #0078D4; border: none;" data-bs-toggle="modal" data-bs-target="#reportModal">
                <i class="bi bi-file-earmark-bar-graph me-2"></i> Cetak Laporan
            </button>
        </div>
    </div>

    <div class="row mb-4 g-3">
        <div class="col-md-3">
            <a href="{{ route('admin.webinar.index') }}" class="text-decoration-none">
                <div class="card stat-card text-white h-100 shadow-sm" style="background: linear-gradient(45deg, #6f42c1, #563d7c);">
                    <div class="card-body p-4">
                        <div class="position-relative z-1">
                            <h6 class="text-uppercase mb-1 opacity-75 small fw-bold">Absensi Webinar</h6>
                            <h2 class="display-6 fw-bold mb-0">LIHAT DATA</h2>
                        </div>
                        <i class="bi bi-file-earmark-excel icon-bg"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <div class="card stat-card text-white h-100 shadow-sm" style="background: linear-gradient(45deg, #0078D4, #005a9e);">
                <div class="card-body p-4">
                    <div class="position-relative z-1">
                        <h6 class="text-uppercase mb-1 opacity-75 small fw-bold">Total Peserta</h6>
                        <h2 class="display-6 fw-bold mb-0">{{ $stats['total'] }}</h2>
                    </div>
                    <i class="bi bi-people icon-bg"></i>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card stat-card text-dark h-100 shadow-sm" style="background: linear-gradient(45deg, #ffc107, #ff9800);">
                <div class="card-body p-4">
                    <div class="position-relative z-1">
                        <h6 class="text-uppercase mb-1 opacity-75 small fw-bold text-dark">Pending Verifikasi</h6>
                        <h2 class="display-6 fw-bold mb-0">{{ $stats['pending'] }}</h2>
                    </div>
                    <i class="bi bi-clock-history icon-bg text-white"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card text-white h-100 shadow-sm" style="background: linear-gradient(45deg, #28a745, #1e7e34);">
                <div class="card-body p-4">
                    <div class="position-relative z-1">
                        <h6 class="text-uppercase mb-1 opacity-75 small fw-bold">Approved</h6>
                        <h2 class="display-6 fw-bold mb-0">{{ $stats['approved'] }}</h2>
                    </div>
                    <i class="bi bi-check-circle icon-bg"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-header bg-white py-4 d-flex justify-content-between align-items-center border-0">
            <h5 class="mb-0 fw-bold" style="color: #0078D4;"><i class="bi bi-journal-text me-2"></i> Pendaftaran Terbaru</h5>
            <a href="{{ route('admin.participants.index') }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">Lihat Semua</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr class="text-muted small text-uppercase fw-bold">
                            <th class="ps-4 py-3 border-0">Nama Peserta</th>
                            <th class="border-0">Perusahaan</th>
                            <th class="border-0">Skema Sertifikasi</th>
                            <th class="border-0">Tanggal Daftar</th>
                            <th class="border-0">Status</th>
                            <th class="text-end pe-4 border-0">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentRegistrations as $participant)
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold text-dark">{{ $participant->full_name }}</div>
                            </td>
                            <td><span class="text-muted small"><i class="bi bi-building me-1"></i> {{ $participant->company }}</span></td>
                            <td><span class="badge badge-ski text-dark px-3 py-2 rounded-pill fw-normal">{{ $participant->certification_type }}</span></td>
                            <td class="text-muted">{{ $participant->created_at->format('d/m/Y') }}</td>
                            <td>
                                @if($participant->status == 'pending')
                                    <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill"><i class="bi bi-hourglass-split me-1"></i>Pending</span>
                                @elseif($participant->status == 'approved')
                                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill"><i class="bi bi-check-circle me-1"></i>Approved</span>
                                @else
                                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill"><i class="bi bi-x-circle me-1"></i>Rejected</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.participants.show', $participant->id) }}" class="btn btn-sm btn-primary rounded-circle shadow-sm" style="background-color: #0078D4; border: none;">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="bi bi-inbox fs-1 d-block mb-2 text-muted"></i>
                                <span class="text-muted">Belum ada pendaftar baru hari ini.</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header text-white border-0 p-4" style="background-color: #0078D4;">
                <h5 class="modal-title fw-bold"><i class="bi bi-file-earmark-excel me-2"></i> Generate Laporan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form action="{{ route('admin.report.generate') }}" method="POST">
                @csrf
                <div class="modal-body p-4 bg-white">
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted text-uppercase">Dari Tanggal</label>
                        <input type="date" class="form-control rounded-3" name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted text-uppercase">Sampai Tanggal</label>
                        <input type="date" class="form-control rounded-3" name="end_date" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted text-uppercase">Format File</label>
                        <select class="form-select rounded-3" name="format" required>
                            <option value="excel">Excel (.xlsx)</option>
                            <option value="pdf">PDF (.pdf)</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0 p-4">
                    <button type="button" class="btn btn-link text-muted text-decoration-none" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold shadow" style="background-color: #0078D4; border: none;">
                        <i class="bi bi-download me-2"></i>Download Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection