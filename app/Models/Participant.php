<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'company',
        'position',
        'certification_type',
        'registration_date',
        'status',
        'certificate_number', // Kolom Nomor Sertifikat
        'certificate_date',
        'certificate_file',
        'notes',
        // --- TAMBAHAN KOLOM FILE (Agar bisa di-upload) ---
        'file_ijazah',
        'file_ktp',
        'file_foto',
        'file_surat_kerja',
    ];

    /**
     * FUNGSI OTOMATIS: GENERATE NOMOR SERTIFIKAT
     * Format: K3-NASIONAL/[TAHUN]/[BULAN]/[ID-UNIK]
     * Contoh: K3-NASIONAL/2025/12/0005
     */
    public function generateCertificateNumber()
    {
        // Ambil Tahun dan Bulan sekarang
        $year = date('Y');
        $month = date('m');
        
        // Ambil ID peserta, tambahkan 0 di depan biar jadi 4 digit (misal: 1 jadi 0001)
        $sequence = str_pad($this->id, 4, '0', STR_PAD_LEFT);

        // Gabungkan jadi Nomor Cantik
        return "K3-NASIONAL/{$year}/{$month}/{$sequence}";
    }
}