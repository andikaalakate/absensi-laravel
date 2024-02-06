<?php

namespace Database\Factories;

use App\Models\SiswaBio;
use App\Models\SiswaData;
use App\Models\SiswaLogin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiswaData>
 */
class SiswaDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = SiswaData::class;
    public function definition(): array
    {
        return [
            'nis' => $this->faker->unique()->randomNumber(5),
            'nama_lengkap' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'jurusan' => $this->faker->randomElement(['Rekayasa Perangkat Lunak', 'Teknik Komputer dan Jaringan']),
            'kelas' => $this->faker->randomElement(['XI RPL', 'XI TKJ']),
            'tanggal_lahir' => $this->faker->date('Y-m-d', '2006-01-01')
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function ($siswaData) {
            $nis = $siswaData->nis;
            SiswaBio::factory()->create(['nis' => $nis]);
            SiswaLogin::factory()->create(['nis' => $nis]);

            $kelasJurusanMapping = [
                'XI RPL' => 'Rekayasa Perangkat Lunak',
                'XI TKJ' => 'Teknik Komputer dan Jaringan',
                // ... tambahkan kelas dan jurusan lainnya sesuai kebutuhan
            ];

            $kelas = $siswaData->kelas;
            $siswaData->jurusan = $kelasJurusanMapping[$kelas];
            $siswaData->save(); // Simpan perubahan yang dilakukan pada record SiswaData
        });
    }


    public function noId()
    {
        return $this->state([]);
    }
}
