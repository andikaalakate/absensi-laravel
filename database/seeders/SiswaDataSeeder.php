<?php

namespace Database\Seeders;

use App\Models\SiswaData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiswaData::create([
            'nis' => '46710',
            'nama_lengkap' => 'Andika Pratama',
            'qr_code' => '/api/absensi/siswa/46710',
            'jenis_kelamin' => 'Laki-Laki',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'kelas' => 'XI',
            'tanggal_lahir' => '2006-12-26'
        ]);
        SiswaData::factory()->noId()->count(10)->create();
    }
}
