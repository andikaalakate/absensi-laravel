<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa_data', function (Blueprint $table) {
            $table->string('nis', 20)->primary();
            $table->string('nama_lengkap', 50)->index();
            $table->string('qr_code')->unique();
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->date('tanggal_lahir');
            $table->string('kelas', 50)->index();
            $table->string('jurusan', 50)->index();
            $table->timestamps();

            $table->foreign('kelas')->references('nama_kelas')->on('kelas');
            $table->foreign('jurusan')->references('nama_jurusan')->on('jurusan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_data');
    }
};
