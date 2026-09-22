<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // 1. AHLI K3 UMUM
    public function k3Umum()
    {
        return view('pages.program', [
            'title' => 'Ahli K3 Umum',
            'image' => 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?q=80&w=1000&auto=format&fit=crop',
            'desc'  => 'Program pelatihan sertifikasi untuk mencetak tenaga ahli K3 Umum sesuai UU No. 1 Tahun 1970.',
            'content' => 'Pelatihan Ahli K3 Umum adalah program wajib bagi perusahaan yang mempekerjakan lebih dari 100 orang atau memiliki risiko tinggi. Peserta akan dilatih untuk menjadi Sekretaris P2K3 dan mampu mengawasi pelaksanaan peraturan perundangan K3 di tempat kerja.',
            'curriculum' => [
                'Kebijakan K3 Nasional',
                'Undang-Undang No. 1 Tahun 1970',
                'Pengawasan K3 Listrik & Penanggulangan Kebakaran',
                'Pengawasan K3 Konstruksi Bangunan',
                'Pengawasan K3 Mekanik (Pesawat Tenaga & Produksi)',
                'Sistem Manajemen K3 (SMK3)',
                'Analisa Kecelakaan Kerja & Statistik',
                'Praktik Kerja Lapangan (PKL)'
            ]
        ]);
    }

    // 2. AHLI K3 LISTRIK
    public function k3Listrik()
    {
        return view('pages.program', [
            'title' => 'Ahli K3 Listrik',
            'image' => 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?q=80&w=1000&auto=format&fit=crop',
            'desc'  => 'Sertifikasi kompetensi khusus untuk pengawasan instalasi listrik di tempat kerja.',
            'content' => 'Bahaya listrik merupakan salah satu risiko terbesar di industri. Program ini mencetak tenaga ahli yang mampu merencanakan, memasang, memeriksa, dan menguji instalasi listrik sesuai standar PUIL (Persyaratan Umum Instalasi Listrik) dan standar internasional lainnya.',
            'curriculum' => [
                'Peraturan Perundangan K3 Listrik',
                'Dasar-dasar Teknik Kelistrikan',
                'Identifikasi Bahaya Listrik',
                'Sistem Proteksi Bahaya Petir',
                'Pembangkitan, Transmisi, & Distribusi Listrik',
                'Instalasi Listrik Ruang Khusus',
                'Pertolongan Pertama Kecelakaan Listrik',
                'Inspeksi & Pengujian Instalasi'
            ]
        ]);
    }

    // 3. BNSP
    public function bnsp()
    {
        return view('pages.program', [
            'title' => 'Sertifikasi BNSP',
            'image' => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?q=80&w=1000&auto=format&fit=crop',
            'desc'  => 'Uji kompetensi berbasis SKKNI yang diakui secara nasional oleh Badan Nasional Sertifikasi Profesi.',
            'content' => 'Sertifikasi BNSP berfokus pada pembuktian kompetensi (skill) seseorang di bidang tertentu. Berbeda dengan Kemnaker yang bersifat penunjukan/kewenangan, lisensi BNSP membuktikan bahwa Anda "Kompeten" melakukan tugas spesifik seperti Operator Forklift, Scaffolder, atau Supervisor K3.',
            'curriculum' => [
                'Pemahaman Standar Kompetensi (SKKNI)',
                'Pra-Asesmen (Pemberkasan Portofolio)',
                'Uji Tulis',
                'Uji Praktik / Demonstrasi',
                'Wawancara dengan Asesor',
                'Rekomendasi Kompetensi'
            ]
        ]);
    }

    // 4. KEMNAKER
    public function kemnaker()
    {
        return view('pages.program', [
            'title' => 'Sertifikasi Kemnaker',
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=1000&auto=format&fit=crop',
            'desc'  => 'Pelatihan pemenuhan regulasi negara untuk jabatan Ahli K3 di perusahaan.',
            'content' => 'Sertifikasi Kemnaker RI adalah syarat mutlak bagi perusahaan untuk menunjuk personel sebagai Ahli K3 (AK3). Sertifikat ini melekat pada individu dan perusahaan, memberikan kewenangan hukum untuk menandatangani laporan K3 wajib kepada Dinas Tenaga Kerja.',
            'curriculum' => [
                'Regulasi K3 Indonesia',
                'Kelembagaan & Keahlian K3',
                'Tugas & Wewenang Ahli K3',
                'Pelaporan Kecelakaan Kerja (P2K3)',
                'Penerapan SMK3 PP 50 Tahun 2012',
                'Audit Internal K3'
            ]
        ]);
    }

    // 5. LAYANAN SKP
    public function skp()
    {
        return view('pages.program', [
            'title' => 'Perpanjangan SKP',
            'image' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?q=80&w=1000&auto=format&fit=crop',
            'desc'  => 'Layanan cepat perpanjangan Surat Keterangan Penunjukan (SKP) & Lisensi Ahli K3.',
            'content' => 'Lisensi Ahli K3 berlaku selama 3 tahun. Kami membantu proses perpanjangan SKP (Surat Keterangan Penunjukan) dan Kartu Lisensi Anda agar tetap valid. Tim kami akan mengurus pemberkasan ke PTSP Kemnaker Pusat sehingga Anda tidak perlu repot.',
            'curriculum' => [
                'Verifikasi Dokumen Lama',
                'Penyusunan Laporan Kegiatan Ahli K3',
                'Pengajuan ke PTSP Kemnaker',
                'Monitoring Status Berkas',
                'Penerbitan SKP Baru',
                'Penerbitan Kartu Lisensi Baru'
            ]
        ]);
    }

    // 6. KONTAK
    public function contact()
    {
        return view('pages.contact');
    }

    // 7. PANDUAN
    public function guide()
    {
        return view('pages.guide');
    }

    // 8. TENTANG KAMI (Penambahan Baru)
    public function about()
    {
        return view('about');
    }
}