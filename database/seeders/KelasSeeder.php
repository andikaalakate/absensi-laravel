<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::factory()->create([
            'id_kelas' => '110',
            'nama_kelas' => 'XI RPL',
        ]);

        Kelas::factory()->create([
            'id_kelas' => '111',
            'nama_kelas' => 'XI TKJ',
        ]);
    }
}
