<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    private function getDataPelatihan()
    {
        return [
            'ahli-k3-umum' => [
                'title' => 'Ahli K3 Umum',
                'image' => asset('images/foto skema/k3umum.png'),
                'poster' => asset('images/Poster/1.png'),
                'materi' => ['Kebijakan K3 Nasional', 'UU No. 1 Tahun 1970', 'K3 Listrik & Kebakaran', 'Konstruksi & Bangunan', 'SMK3 & Audit'],
                'syarat' => ['Pendidikan Min. SMA/SMK', 'FC Ijazah & KTP', 'Surat Keterangan Kerja', 'Pas Foto (BG Merah)'],
                'durasi' => '12 Hari'
            ],
            'auditor-smk3' => [
                'title' => 'Auditor SMK3',
                'image' => asset('images/foto skema/auditorsmk3.png'),
                'poster' => asset('images/Poster/2.png'),
                'materi' => ['PP No. 50 Tahun 2012', 'Kriteria Audit SMK3', 'Teknik Audit & Pelaporan', 'Simulasi Audit Lapangan'],
                'syarat' => ['Sertifikat Ahli K3 Umum', 'Pendidikan Min. SMA/SMK', 'Surat Tugas Perusahaan'],
                'durasi' => '4 Hari'
            ],
            'pengawas-k3-migas' => [
                'title' => 'Pengawas K3 Industri Migas',
                'image' => asset('images/foto skema/k3migas.png'),
                'poster' => asset('images/Poster/3.png'),
                'materi' => ['Regulasi Migas', 'Izin Kerja (Sertifikasi)', 'Safety Manometer', 'Penanggulangan Keadaan Darurat'],
                'syarat' => ['Pendidikan Min. SMA/SMK', 'Pengalaman Kerja di Migas', 'Sehat Jasmani'],
                'durasi' => '4 Hari'
            ],
            'agt' => [
                'title' => 'AGT (Authorized Gas Tester)',
                'image' => asset('images/foto skema/agtgas.png'),
                'poster' => asset('images/Poster/4.png'),
                'materi' => ['Sifat Gas Berbahaya', 'Pengoperasian Gas Detector', 'Interpretasi Hasil Ukur', 'Kalibrasi Alat'],
                'syarat' => ['Pendidikan Min. SMA/SMK', 'Sehat Jasmani'],
                'durasi' => '3 Hari'
            ],
            'gas-h2s' => [
                'title' => 'Penanganan Bahaya Gas H2S',
                'image' => asset('images/foto skema/gash2s.png'),
                'poster' => asset('images/Poster/5.png'),
                'materi' => ['Karakteristik H2S', 'Alat Pelindung Pernapasan (SCBA)', 'Sistem Deteksi H2S', 'Prosedur Evakuasi'],
                'syarat' => ['Pendidikan Min. SMA/SMK', 'Sehat Jasmani & Paru-paru'],
                'durasi' => '2 Hari'
            ],
            'operator-k3' => [
                'title' => 'Operator K3',
                'image' => asset('images/foto skema/operatork3.png'),
                'poster' => asset('images/Poster/7.png'),
                'materi' => ['Dasar K3', 'Penggunaan APD', 'Rambu & Marka K3', 'Dasar Pemadaman Api', 'P3K Dasar'],
                'syarat' => ['Pendidikan Min. SMA/SMK', 'FC KTP'],
                'durasi' => '3 Hari'
            ],
            'petugas-k3' => [
                'title' => 'Petugas K3',
                'image' => asset('images/foto skema/petugask3.png'), 
                'poster' => asset('images/Poster/8.png'),
                'materi' => ['Identifikasi Bahaya', 'Laporan Kecelakaan Kerja', 'Pemeriksaan Lingkungan Kerja', 'Audit Internal Dasar'],
                'syarat' => ['Pendidikan Min. SMA/SMK', 'Pengalaman Kerja 1 Tahun'],
                'durasi' => '3 Hari'
            ],
            'k3-rs' => [
                'title' => 'Pengawasan K3 RS & Fasyankes',
                'image' => asset('images/foto skema/k3rs.png'),
                'poster' => asset('images/Poster/6.png'),
                'materi' => ['K3 Konstruksi RS', 'Manajemen B3 Medis', 'Proteksi Kebakaran RS', 'Kewaspadaan Bencana'],
                'syarat' => ['Min. SMA/SMK (Staf RS/Puskesmas)', 'Surat Keterangan Kerja'],
                'durasi' => '3 Hari'
            ],
            'k3-lab' => [
                'title' => 'Pengawasan K3 Lab',
                'image' => asset('images/foto skema/k3lab.png'),
                'poster' => asset('images/Poster/9.png'),
                'materi' => ['Standar Laboratorium Aman', 'Penanganan Bahan Kimia', 'Biosafety & Biosecurity', 'Limbah Laboratorium'],
                'syarat' => ['Min. SMA/SMK IPA atau Kimia', 'Staf Lab'],
                'durasi' => '3 Hari'
            ],
            'hazops' => [
                'title' => 'HAZOPS',
                'image' => asset('images/foto skema/hazops.png'),
                'poster' => asset('images/Poster/10.png'),
                'materi' => ['Metodologi HAZOPS', 'Node & Parameter Deviasi', 'Analisis Risiko LOPA', 'Simulasi Studi'],
                'syarat' => ['Min. SMA/SMK (Teknik)', 'Pengalaman di Industri Proses'],
                'durasi' => '3 Hari'
            ],
            'p3k' => [
                'title' => 'P3K (First Aid)',
                'image' => asset('images/foto skema/p3k.png'),
                'poster' => asset('images/Poster/11.png'),
                'materi' => ['RJP', 'Luka Bakar', 'Evakuasi'],
                'syarat' => ['Min. SMA/SMK'],
                'durasi' => '2 Hari'
            ],
            'investigasi' => [
                'title' => 'Investigasi Kecelakaan',
                'image' => asset('images/foto skema/investigasi.png'),
                'poster' => asset('images/Poster/12.png'),
                'materi' => ['Root Cause Analysis', 'Olah TKP'],
                'syarat' => ['Min. SMA/SMK'],
                'durasi' => '2 Hari'
            ],
            'proteksi-kebakaran' => [
                'title' => 'Proteksi Kebakaran',
                'image' => asset('images/foto skema/damkar.png'),
                'poster' => asset('images/Poster/13.png'),
                'materi' => ['Hydrant', 'Sprinkler'],
                'syarat' => ['Min. SMA/SMK'],
                'durasi' => '3 Hari'
            ],
            'higiene-muda' => [
                'title' => 'Ahli Higiene Industri Muda',
                'image' => asset('images/foto skema/himu.png'),
                'poster' => asset('images/Poster/14.png'),
                'materi' => ['Sampling Udara', 'Kebisingan'],
                'syarat' => ['Min. SMA/SMK'],
                'durasi' => '3 Hari'
            ],
            'higiene-madya' => [
                'title' => 'Ahli Higiene Industri Madya',
                'image' => asset('images/foto skema/hima.png'),
                'poster' => asset('images/Poster/15.png'),
                'materi' => ['Pengendalian Engineering'],
                'syarat' => ['Min. SMA/SMK'],
                'durasi' => '4 Hari'
            ],
            'listrik-teknisi' => [
                'title' => 'Teknisi K3 Listrik',
                'image' => asset('images/foto skema/listrikteknisi.png'),
                'poster' => asset('images/Poster/16.png'),
                'materi' => ['Instalasi Aman', 'Panel'],
                'syarat' => ['Min. SMK Teknik'],
                'durasi' => '3 Hari'
            ],
            'listrik-ahli' => [
                'title' => 'Ahli K3 Listrik',
                'image' => asset('images/foto skema/listrikahli.png'),
                'poster' => asset('images/Poster/17.png'),
                'materi' => ['PUIL 2011', 'Proteksi'],
                'syarat' => ['Min. SMK Teknik'],
                'durasi' => '4 Hari'
            ],
            'paramedis-utama' => [
                'title' => 'Paramedis K3 Utama',
                'image' => asset('images/foto skema/medisutama.png'),
                'poster' => asset('images/Poster/18.png'),
                'materi' => ['Manajemen Klinik'],
                'syarat' => ['Min. SMK'],
                'durasi' => '4 Hari'
            ],
            'k3-konstruksi' => [
                'title' => 'K3 Konstruksi',
                'image' => asset('images/foto skema/K3 Konstruksi.png'),
                'poster' => asset('images/Poster/19.png'),
                'materi' => ['Safety Building'],
                'syarat' => ['Min. SMA/SMK'],
                'durasi' => '3 Hari'
            ],
            'k3-lingkungan' => [
                'title' => 'K3 Lingkungan',
                'image' => asset('images/foto skema/K3 Lingkungan.png'),
                'poster' => asset('images/Poster/20.png'),
                'materi' => ['Limbah B3'],
                'syarat' => ['Min. SMA/SMK'],
                'durasi' => '3 Hari'
            ],
            'manajer-k3' => [
                'title' => 'Manajer K3',
                'image' => asset('images/foto skema/Manajer K3.png'),
                'poster' => asset('images/Poster/21.png'),
                'materi' => ['Strategic Safety'],
                'syarat' => ['Min. S1/Pengalaman'],
                'durasi' => '4 Hari'
            ],
            'manajemen-risiko' => [
                'title' => 'Manajemen Risiko',
                'image' => asset('images/foto skema/Manajemen Risiko.png'),
                'poster' => asset('images/Poster/22.png'),
                'materi' => ['HIRADC'],
                'syarat' => ['Min. SMA/SMK'],
                'durasi' => '3 Hari'
            ],
            'operator-crane' => [
                'title' => 'Operator Crane',
                'image' => asset('images/foto skema/OperatorCrane.png'),
                'poster' => asset('images/Poster/23.png'),
                'materi' => ['Lifting Gear'],
                'syarat' => ['Min. SMA/SMK'],
                'durasi' => '4 Hari'
            ],
            'rigging-lifting' => [
                'title' => 'Rigging & Lifting',
                'image' => asset('images/foto skema/Rigging & Lifting.png'),
                'poster' => asset('images/Poster/24.png'),
                'materi' => ['Sling Check'],
                'syarat' => ['Min. SMA/SMK'],
                'durasi' => '3 Hari'
            ],
            'scaffolding-inspector' => [
                'title' => 'Scaffolding Inspector',
                'image' => asset('images/foto skema/Scaffolding Inspector.png'),
                'poster' => asset('images/Poster/25.png'),
                'materi' => ['Tagging'],
                'syarat' => ['Min. SMA/SMK'],
                'durasi' => '3 Hari'
            ],
        ];
    }

    public function home() {
        $allPelatihan = $this->getDataPelatihan();
        $pelatihanUnggulan = array_slice($allPelatihan, 0, 8); 
        return view('home', compact('pelatihanUnggulan'));
    }

    public function index() {
        $allPelatihan = $this->getDataPelatihan();
        return view('pelatihan.index', compact('allPelatihan'));
    }

    public function show($slug) {
        $allPelatihan = $this->getDataPelatihan();
        if (!isset($allPelatihan[$slug])) abort(404);
        $pelatihan = $allPelatihan[$slug];
        return view('pelatihan.show', compact('pelatihan'));
    }
}