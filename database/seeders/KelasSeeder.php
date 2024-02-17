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
        Kelas::create([
            'id_kelas' => '110',
            'nama_kelas' => 'X',
            'alias_jurusan' => 'RPL',
            'variabel_kelas' => '1'
        ]);
        Kelas::create([
            'id_kelas' => '111',
            'nama_kelas' => 'XI',
            'alias_jurusan' => 'RPL',
            'variabel_kelas' => '1'
        ]);

        Kelas::create([
            'id_kelas' => '112',
            'nama_kelas' => 'XII',
            'alias_jurusan' => 'RPL',
            'variabel_kelas' => '1'
        ]);
    }
}
