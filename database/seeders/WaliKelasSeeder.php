<?php

namespace Database\Seeders;

use App\Models\WaliKelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WaliKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WaliKelas::create([
            'nama' => 'Yosefina Simamora',
            'username' => 'yosefina',
            'password' => bcrypt('12345678'),
            'email' => 'yosefina@walikelas.com',
            'no_telp' => '+6287899638249',
            'id_kelas' => '111'
        ]);
    }
}
