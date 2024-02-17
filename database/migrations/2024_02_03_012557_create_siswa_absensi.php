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
        Schema::create('siswa_absensi', function (Blueprint $table) {
            $table->string('nis', 20)->index();
            $table->enum('status', ['Hadir', 'Alpha', 'Sakit', 'Izin']);
            $table->time('jam_masuk')->unique();
            $table->time('jam_pulang')->nullable();
            $table->json('lokasi_masuk');
            $table->timestamps();

            $table->foreign('nis')
            ->references('nis')
            ->on('siswa_data')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_absensi');
    }
};
