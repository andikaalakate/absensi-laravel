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
        Jurusan::create([
            'id_jurusan' => '110',
            'nama_jurusan' => 'Rekayasa Perangkat Lunak',
            'alias_jurusan' => 'RPL',
            'kepala_jurusan' => 'Zainal Abidin'
        ]);

        Jurusan::create([
            'id_jurusan' => '111',
            'nama_jurusan' => 'Teknik Jaringan Komputer dan Telekomunikasi',
            'alias_jurusan' => 'TJKT',
            'kepala_jurusan' => 'Jakub Sembiring'
        ]);

        Jurusan::create([
            'id_jurusan' => '112',
            'nama_jurusan' => 'Pemasaran',
            'alias_jurusan' => 'PM',
            'kepala_jurusan' => 'Andriani Siregar'
        ]);

        Jurusan::create([
            'id_jurusan' => '113',
            'nama_jurusan' => 'Akuntansi dan Keuangan Lembaga',
            'alias_jurusan' => 'AKL',
            'kepala_jurusan' => ''
        ]);

        Jurusan::create([
            'id_jurusan' => '114',
            'nama_jurusan' => 'Manajemen Perkantoran dan Layanan Bisnis',
            'alias_jurusan' => 'MPLB',
            'kepala_jurusan' => ''
        ]);
    }
}
