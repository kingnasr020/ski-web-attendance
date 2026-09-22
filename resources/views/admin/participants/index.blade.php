@extends('layouts.app')

@section('title', 'Kelola Peserta')

@section('content')
<div class="container-fluid py-4" style="background-color: #f8f9fa; min-height: 100vh;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h3 mb-0 fw-bold" style="color: #0078D4;"><i class="bi bi-people-fill me-2"></i>Kelola Data Peserta</h2>
            <p class="text-muted small mb-0 text-uppercase letter-spacing-1">Administrasi Sertifikasi PT. SKI</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-white btn-sm shadow-sm rounded-pill px-3 border">
            <i class="bi bi-arrow-left me-1 text-primary"></i> Kembali ke Dashboard
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
        <div class="card-body bg-white p-4">
            <form action="{{ route('admin.participants.index') }}" method="GET" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label fw-bold small text-muted text-uppercase">Cari Peserta</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" name="search" class="form-control bg-light border-start-0 ps-0" 
                               placeholder="Nama, Perusahaan, atau Email..." value="{{ request('search') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-bold small text-muted text-uppercase">Filter Status</label>
                    <select name="status" class="form-select bg-light border-0">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Lulus (Approved)</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100 fw-bold rounded-3 shadow-sm" style="background-color: #0078D4; border: none;">
                        <i class="bi bi-filter me-1"></i> Filter Data
                    </button>
                </div>

                <div class="col-md-auto ms-auto">
                    <a href="{{ route('admin.participants.index') }}" class="btn btn-link text-decoration-none text-muted small">
                        <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filter
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="text-white" style="background-color: #0078D4;">
                        <tr>
                            <th class="ps-4 py-3 border-0 fw-bold">NAMA LENGKAP</th>
                            <th class="py-3 border-0 fw-bold">KONTAK & PERUSAHAAN</th>
                            <th class="py-3 border-0 fw-bold">SKEMA SERTIFIKASI</th>
                            <th class="py-3 border-0 fw-bold text-center">STATUS</th>
                            <th class="py-3 border-0 text-end pe-4 fw-bold">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($participants as $participant)
                        <tr>
                            <td class="ps-4 py-4">
                                <div class="fw-bold text-dark fs-6">{{ $participant->full_name }}</div>
                                <small class="text-muted"><i class="bi bi-calendar-event me-1"></i>{{ $participant->created_at->format('d M Y') }}</small>
                            </td>

                            <td>
                                <div class="d-flex flex-column">
                                    <span class="small fw-bold text-dark mb-1"><i class="bi bi-building me-1 text-primary"></i> {{ $participant->company }}</span>
                                    <span class="small text-muted"><i class="bi bi-envelope me-1"></i> {{ $participant->email }}</span>
                                </div>
                            </td>

                            <td>
                                <span class="badge rounded-pill px-3 py-2 fw-normal mb-1" style="background-color: #e7f3ff; color: #0078D4; border: 1px solid #d0e8ff;">
                                    {{ $participant->certification_type }}
                                </span>
                                @if($participant->certificate_number)
                                    <div class="small fw-bold font-monospace" style="color: #0078D4;">
                                        <i class="bi bi-award-fill me-1"></i>{{ $participant->certificate_number }}
                                    </div>
                                @endif
                            </td>

                            <td class="text-center">
                                @if($participant->status == 'pending')
                                    <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill border border-warning border-opacity-25">
                                        <i class="bi bi-hourglass-split me-1"></i> Menunggu
                                    </span>
                                @elseif($participant->status == 'approved')
                                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill border border-success border-opacity-25">
                                        <i class="bi bi-check-circle-fill me-1"></i> Approved
                                    </span>
                                @else
                                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill border border-danger border-opacity-25">
                                        <i class="bi bi-x-circle-fill me-1"></i> Ditolak
                                    </span>
                                @endif
                            </td>

                            <td class="text-end pe-4">
                                <a href="{{ route('admin.participants.show', $participant->id) }}" class="btn btn-sm btn-primary rounded-pill px-3 shadow-sm fw-bold" style="background-color: #0078D4; border: none;">
                                    Detail / Validasi <i class="bi bi-chevron-right ms-1"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="py-4">
                                    <i class="bi bi-database-exclamation fs-1 text-muted mb-3 d-block"></i>
                                    <h5 class="text-muted fw-bold">Data Tidak Ditemukan</h5>
                                    <p class="text-muted small">Coba sesuaikan kata kunci atau filter status Anda.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white py-4 px-4 border-0">
            <div class="d-flex justify-content-between align-items-center">
                <span class="small text-muted fw-bold">Total: {{ $participants->total() }} Peserta</span>
                <div>
                    {{ $participants->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Styling untuk Pagination agar Biru SKI */
    .pagination .page-link { color: #0078D4; border-radius: 8px; margin: 0 2px; border: none; background: #f8f9fa; }
    .pagination .page-item.active .page-link { background-color: #0078D4; color: white; }
    .table-hover tbody tr:hover { background-color: #f0f7ff; transition: 0.2s; }
</style>
@endsection