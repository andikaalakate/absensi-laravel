<?php

namespace Database\Factories;

use App\Models\SiswaData;
use App\Models\SiswaLogin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiswaLogin>
 */
class SiswaLoginFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = SiswaLogin::class;

    public function definition(): array
    {
        return [
            'nis' => $this->faker->unique()->randomNumber(5),
            'password' => bcrypt('123456'),
            'email' => $this->faker->unique()->safeEmail,
            'no_telp' => '+628' . substr($this->faker->unique()->numerify('##########'), 0, 9)
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function ($siswaLogin) {

        });
    }

    public function noId()
    {
        return $this->state([]);
    }

}
