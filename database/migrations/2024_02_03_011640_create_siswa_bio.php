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
        Schema::create('siswa_bio', function (Blueprint $table) {
            $table->string('nis', 20)->primary();
            $table->string('image')->nullable();
            $table->text('biografi')->nullable();
            $table->text('hobi')->nullable();
            $table->string('alamat')->nullable();
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
        Schema::dropIfExists('siswa_bio');
    }
};
