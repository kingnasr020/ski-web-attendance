<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PelatihanController;
// Import Controller baru lu
use App\Http\Controllers\WebinarAttendanceController;

// --- 1. HALAMAN UTAMA ---
Route::get('/', [PelatihanController::class, 'home'])->name('home');
Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');

Route::prefix('program')->group(function () {
    Route::get('/k3-umum', [PageController::class, 'k3Umum'])->name('program.k3umum');
    Route::get('/k3-listrik', [PageController::class, 'k3Listrik'])->name('program.k3listrik');
    Route::get('/bnsp', [PageController::class, 'bnsp'])->name('program.bnsp');
    Route::get('/kemnaker', [PageController::class, 'kemnaker'])->name('program.kemnaker');
});

// --- JALUR PELATIHAN (25 SKEMA) ---
Route::get('/pelatihan', [PelatihanController::class, 'index'])->name('pelatihan.index');
Route::get('/pelatihan/{slug}', [PelatihanController::class, 'show'])->name('pelatihan.show');

// --- JALUR WEBINAR & ABSENSI (PUBLIK) ---
Route::get('/absensi-webinar', function () {
    return view('absensi'); 
})->name('webinar.absensi');

// SESUAIKAN: Sekarang mengarah ke Controller untuk simpan data asli
Route::post('/absensi-webinar', [WebinarAttendanceController::class, 'store'])->name('webinar.absensi.store');

Route::get('/layanan/skp', [PageController::class, 'skp'])->name('services.skp');
Route::get('/informasi/panduan', [PageController::class, 'guide'])->name('info.guide');
Route::get('/kontak', [PageController::class, 'contact'])->name('info.contact');

// --- 2. JALUR PENDAFTARAN ---
Route::get('/pendaftaran', [ParticipantController::class, 'create'])->name('register.form');
Route::post('/pendaftaran', [ParticipantController::class, 'store'])->name('register.store');
Route::get('/pendaftaran/sukses', [ParticipantController::class, 'success'])->name('registration.success');

// --- 3. JALUR AUTH ---
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- 4. JALUR ADMIN (PROTECTED) ---
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/participants', [AdminController::class, 'index'])->name('admin.participants.index');
    Route::get('/participants/{id}', [AdminController::class, 'show'])->name('admin.participants.show');
    Route::post('/participants/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.participants.updateStatus');
    Route::get('/participants/{id}/file/{type}', [AdminController::class, 'viewFile'])->name('admin.participants.file');
    Route::match(['get', 'post'], '/report/generate', [AdminController::class, 'generateReport'])->name('admin.report.generate');

    // SESUAIKAN: Sekarang mengarah ke Controller untuk ambil data dari Database
    Route::get('/webinar-data', [WebinarAttendanceController::class, 'index'])->name('admin.webinar.index');
});