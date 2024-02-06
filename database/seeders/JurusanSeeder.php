<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jurusan::factory()->create([
            'id_jurusan' => '110',
            'nama_jurusan' => 'Rekayasa Perangkat Lunak',
            'kepala_jurusan' => 'Zainal Abidin'
        ]);

        Jurusan::factory()->create([
            'id_jurusan' => '111',
            'nama_jurusan' => 'Teknik Komputer dan Jaringan',
            'kepala_jurusan' => 'Jakub Sembiring'
        ]);

    }
}
