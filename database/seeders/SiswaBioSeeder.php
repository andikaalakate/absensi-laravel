<?php

namespace Database\Seeders;

use App\Models\SiswaBio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaBioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiswaBio::create([
            'nis' => '46710',
            'alamat' => 'Jl. Utama 1, Desa Kolam',
            'biografi' => 'Apa yaa?',
            'hobi' => 'Ngoding',
            'image' => 'andika-alakate.jpeg'
        ]);
        SiswaBio::factory()->noId()->count(10)->create();
    }
}
