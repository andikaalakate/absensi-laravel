<?php

namespace Database\Factories;

use App\Models\SiswaAbsensi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiswaAbsensi>
 */
class SiswaAbsensiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = SiswaAbsensi::class;
    public function definition(): array
    {
        return [
            'nis' => $this->faker->unique()->randomNumber(5),
            'jam_masuk' => $this->faker->time(),
            'jam_pulang' => $this->faker->time(),
            'lokasi_masuk' => $this->faker->address,
            'qr_code' => '/api/siswa/absensi/' . 'nis',
            'status' => $this->faker->randomElement(['Hadir', 'Alpha', 'Sakit', 'Izin'])
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function ($siswaAbsensi) {

        });
    }

    public function noId()
    {
        return $this->state([]);
    }
}
