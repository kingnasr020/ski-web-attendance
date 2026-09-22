<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebinarAttendanceController extends Controller
{
    /**
     * Menampilkan data absensi di halaman Admin
     */
    public function index()
    {
        $data = DB::table('webinar_attendances')->orderBy('created_at', 'desc')->get();
        return view('admin.webinar_data', compact('data'));
    }

    /**
     * Menyimpan data absensi dari peserta
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'wa' => 'required',
            'kesan' => 'required',
            'rekomendasi' => 'required',
        ]);

        // 2. Simpan ke Database
        DB::table('webinar_attendances')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'wa' => $request->wa,
            'kesan' => $request->kesan,
            'rekomendasi' => $request->rekomendasi,
            // Tambahkan keterangan nama webinar agar data tidak tertukar dengan yang lama
            'webinar_name' => 'Safety Leadership - Haris Suhud', 
            'created_at' => now(),
        ]);

        // 3. Balik ke halaman absensi dengan pesan sukses yang sesuai tema baru
        return redirect()->back()->with('success', 'Terima kasih! Absensi Webinar Safety Leadership Anda telah berhasil dicatat.');
    }
}