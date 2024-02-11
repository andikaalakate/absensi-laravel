<?php

namespace Database\Seeders;

use App\Models\SiswaAbsensi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaAbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiswaAbsensi::create([
            'nis' => '46710',
            'jam_masuk' => '07:15:00',
            'jam_pulang' => '14:00:00',
            'lokasi_masuk' => 'SMKS Jambi Medan',
            'status' => 'Hadir'
        ]);
        // SiswaAbsensi::factory()->noId()->count(50)->create();
    }
}
