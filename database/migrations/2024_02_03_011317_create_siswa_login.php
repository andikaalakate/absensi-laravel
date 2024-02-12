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
        Schema::create('siswa_login', function (Blueprint $table) {
            $table->string('nis', 20)->index();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('no_telp', 16);
            $table->string('last_seen')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('siswa_login');
    }
};
