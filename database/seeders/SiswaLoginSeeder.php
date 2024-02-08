<?php

namespace Database\Seeders;

use App\Models\SiswaLogin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiswaLogin::create([
            'nis' => '46710',
            'password' => bcrypt('mraouart'),
            'email' => 'andikaalakate@gmail.com',
            'no_telp' => '+6289505722187'
        ]);

        // SiswaLogin::factory()->noId()->count(10)->create();
    }
}
