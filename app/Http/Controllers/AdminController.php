<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * DASHBOARD UTAMA ADMIN
     * Menampilkan statistik ringkas dan 10 pendaftaran terbaru.
     */
    public function dashboard()
    {
        $stats = [
            'total' => Participant::count(),
            'pending' => Participant::where('status', 'pending')->count(),
            'approved' => Participant::where('status', 'approved')->count(),
            'rejected' => Participant::where('status', 'rejected')->count(),
        ];
        
        $recentRegistrations = Participant::latest()->take(10)->get();
        
        return view('admin.dashboard', compact('stats', 'recentRegistrations'));
    }

    /**
     * DAFTAR PESERTA LENGKAP
     * Dilengkapi fitur pencarian dan filter status.
     */
    public function index(Request $request)
    {
        $status = $request->get('status');
        $search = $request->get('search');

        $participants = Participant::query()
            ->when($status, fn($q) => $q->where('status', $status))
            ->when($search, fn($q) => $q->where(function ($sq) use ($search) {
                $sq->where('full_name', 'like', "%{$search}%")
                   ->orWhere('email', 'like', "%{$search}%")
                   ->orWhere('company', 'like', "%{$search}%")
                   ->orWhere('certificate_number', 'like', "%{$search}%");
            }))
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.participants.index', compact('participants'));
    }

    /**
     * FITUR LIHAT BERKAS (VERSI SMART PATH - ANTI 404)
     */
    public function viewFile($id, $type)
    {
        $participant = Participant::findOrFail($id);
        
        $path = match($type) {
            'ktp' => $participant->file_ktp,
            'ijazah' => $participant->file_ijazah,
            'foto' => $participant->file_foto,
            'surat_kerja' => $participant->file_surat_kerja,
            default => null
        };

        if (!$path) {
            abort(404, 'Path berkas tidak tercatat di database.');
        }

        $possibilities = [
            storage_path('app/' . $path),
            storage_path('app/private/' . $path),
            storage_path('app/' . str_replace('private/', '', $path)),
        ];

        $finalPath = null;

        foreach ($possibilities as $attempt) {
            $attempt = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $attempt);
            if (file_exists($attempt)) {
                $finalPath = $attempt;
                break;
            }
        }

        if (!$finalPath) {
            abort(404, 'File tidak ditemukan di server.');
        }

        $mimeType = mime_content_type($finalPath);

        return response()->file($finalPath, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline'
        ]);
    }

    /**
     * DETAIL PESERTA
     */
    public function show($id)
    {
        $participant = Participant::findOrFail($id);
        return view('admin.participants.show', compact('participant'));
    }

    /**
     * UPDATE STATUS & GENERATE SERTIFIKAT
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'notes' => 'nullable|string|max:65000',
        ]);

        $participant = Participant::findOrFail($id);
        
        $participant->update([
            'status' => $request->status,
            'notes' => $request->notes,
        ]);

        if ($request->status == 'approved' && empty($participant->certificate_number)) {
            $participant->update([
                'certificate_number' => $participant->generateCertificateNumber(),
                'certificate_date' => now(),
            ]);
        }

        return redirect()->back()->with('success', 'Status peserta berhasil diperbarui.');
    }

    /**
     * LAPORAN EXCEL (CSV STREAM)
     * KEMBALI KE DATA PESERTA SERTIFIKASI (PARTICIPANT) SESUAI ASLINYA
     */
    public function generateReport(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Cari data pendaftaran sertifikasi pada rentang tanggal
        $exists = Participant::whereBetween('created_at', [
            $request->start_date . ' 00:00:00',
            $request->end_date . ' 23:59:59'
        ])->exists();

        if (!$exists) {
            return redirect()->back()->with('error', 'Tidak ada data pendaftaran pada rentang tanggal tersebut.');
        }

        $fileName = 'Laporan_Peserta_K3_' . date('d-m-Y') . '.csv';

        return response()->streamDownload(function () use ($request) {
            $handle = fopen('php://output', 'w');
            
            // Tambahkan BOM agar Excel bisa baca karakter spesial/lokal
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));

            // Header kolom sesuai format pendaftaran sertifikasi awal lu
            fputcsv($handle, [
                'No', 'ID Registrasi', 'Nama Lengkap', 'Email', 'WhatsApp', 
                'Perusahaan', 'Jabatan', 'Skema Sertifikasi', 
                'Tanggal Daftar', 'Status', 'Nomor Sertifikat'
            ], ';');

            $query = Participant::whereBetween('created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ])->orderBy('created_at', 'asc')->cursor();

            $no = 1;
            foreach ($query as $p) {
                // Generate ID Registrasi secara dinamis
                $regId = 'REG-' . $p->created_at->format('Ym') . str_pad($p->id, 5, '0', STR_PAD_LEFT);
                
                fputcsv($handle, [
                    $no++,
                    $regId,
                    $p->full_name,
                    $p->email,
                    "'" . $p->phone, // Kutip (') agar nol di depan nomor HP tidak hilang di Excel
                    $p->company,
                    $p->position,
                    $p->certification_type,
                    $p->created_at->format('d/m/Y H:i'),
                    ucfirst($p->status),
                    $p->certificate_number ?? '-'
                ], ';');
            }
            fclose($handle);
        }, $fileName);
    }
}