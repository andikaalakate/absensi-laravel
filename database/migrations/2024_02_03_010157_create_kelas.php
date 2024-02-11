<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->string('id_kelas', 5)->primary();
            $table->string('nama_kelas', 50)->index();
            $table->string('alias_jurusan', 50)->index();
            $table->string('variabel_kelas', 2)->index();
            $table->timestamps();

            $table->foreign('alias_jurusan')->references('alias_jurusan')->on('jurusan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
