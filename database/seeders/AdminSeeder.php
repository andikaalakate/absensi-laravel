<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@admin.com',
            'no_telp' => '+6289505722187',
            'role' => 'admin'
        ]);
    }
}
