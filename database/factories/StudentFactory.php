<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\siswa>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_lengkap' => fake()->name(),
            'jenis_kelamin' => $this->faker->randomElement(['L','P']),
            'agama'=> $this->faker->randomElement(['Islam','Kristen','Katolik']), 
            'kelas' => $this->faker->numberBetween(1,3)
        ];
    }
}
