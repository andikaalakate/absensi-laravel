<?php

namespace Database\Factories;

use App\Models\SiswaBio;
use App\Models\SiswaLogin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiswaBio>
 */
class SiswaBioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = SiswaBio::class;

    public function definition(): array
    {
        return [
            'nis' => $this->faker->unique()->randomNumber(5),
            'alamat' => $this->faker->address,
            'biografi' => $this->faker->sentence,
            'hobi' => $this->faker->word,
            'image' => '/images/siswa/avatar1.webp'
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function ($siswaBio) {
            
        });
    }

    public function noId()
    {
        return $this->state([]);
    }
}
