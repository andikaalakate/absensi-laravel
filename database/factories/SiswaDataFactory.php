<?php

namespace Database\Factories;

use App\Models\SiswaAbsensi;
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
        $nis = $this->faker->unique()->randomNumber(5);

        return [
            'nis' => $nis,
            'nama_lengkap' => $this->faker->name,
            'qr_code' => '/api/siswa/absensi/' . $nis,
            'jenis_kelamin' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'jurusan' => $this->faker->randomElement(['Rekayasa Perangkat Lunak', 'Teknik Jaringan Komputer dan Telekomunikasi', 'Pemasaran', 'Akuntansi dan Keuangan Lembaga', 'Manajemen Perkantoran dan Layanan Bisnis']),
            'kelas' => $this->faker->randomElement(['X', 'XI', 'XII']),
            'tanggal_lahir' => $this->faker->date('Y-m-d', '2006-01-01')
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function ($siswaData) {
            $nis = $siswaData->nis;

            SiswaBio::factory()->create(['nis' => $nis]);
            SiswaLogin::factory()->create(['nis' => $nis]);
            SiswaAbsensi::factory()->create(['nis' => $nis]);

            $siswaData->save(); // Simpan perubahan yang dilakukan pada record SiswaData
        });
    }


    public function noId()
    {
        return $this->state([]);
    }
}
