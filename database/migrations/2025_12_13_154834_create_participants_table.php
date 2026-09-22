<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('company');
            $table->string('position');
            $table->string('certification_type');
            $table->date('registration_date');
            
            // --- INI YANG DITAMBAHKAN (Lokasi penyimpanan nama file) ---
            $table->string('file_ijazah')->nullable();
            $table->string('file_ktp')->nullable();
            $table->string('file_foto')->nullable();
            $table->string('file_surat_kerja')->nullable();
            // -----------------------------------------------------------

            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('certificate_number')->nullable();
            $table->date('certificate_date')->nullable();
            $table->string('certificate_file')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('participants');
    }
};