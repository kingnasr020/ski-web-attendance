<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ParticipantController extends Controller
{
    public function create()
    {
        return view('participant.register');
    }

    public function store(Request $request)
    {
        // 1. Validasi Data & File
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:participants,email',
            'phone' => 'required|string|max:20',
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'certification_type' => 'required|string|max:255',
            'terms' => 'accepted',
            
            // Validasi file (Max 2MB)
            'ijazah' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'ktp' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'foto' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'surat_kerja' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // 2. Buat Nama Folder Unik berdasarkan Nama Peserta & Waktu
        // Contoh: Budi_Santoso_1704873622
        $folderName = Str::slug($request->full_name, '_') . '_' . time();
        $basePath = "private/documents/{$folderName}";

        // 3. Simpan Berkas ke dalam Folder Khusus Peserta Tersebut
        $pathIjazah = $request->file('ijazah')->store($basePath . '/ijazah');
        $pathKtp = $request->file('ktp')->store($basePath . '/ktp');
        $pathFoto = $request->file('foto')->store($basePath . '/foto');
        
        $pathSuratKerja = $request->hasFile('surat_kerja') 
            ? $request->file('surat_kerja')->store($basePath . '/surat_kerja') 
            : null;

        // 4. Simpan ke Database
        $participant = Participant::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'position' => $request->position,
            'certification_type' => $request->certification_type,
            'registration_date' => now(),
            'status' => 'pending',
            'file_ijazah' => $pathIjazah,
            'file_ktp' => $pathKtp,
            'file_foto' => $pathFoto,
            'file_surat_kerja' => $pathSuratKerja,
        ]);

        return redirect()->route('registration.success')
            ->with('success', 'Pendaftaran berhasil! Dokumen Anda tersimpan rapi dalam folder pribadi.')
            ->with('participant_id', $participant->id);
    }

    public function success() { return view('participant.success'); }

    public function showValidationForm() { return view('certificate.validate'); }

    public function validateCertificate(Request $request)
    {
        $certificateNumber = $request->input('certificate_number');
        $participant = Participant::where('certificate_number', $certificateNumber)
            ->where('status', 'approved')
            ->first();

        if ($participant) {
            return view('certificate.validation-result', compact('participant'));
        }

        return view('certificate.validation-result')->with('error', 'Sertifikat tidak ditemukan.');
    }
}