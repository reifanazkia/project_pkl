<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class schoolsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->sentence(), 
            'deskripsi' => $this->faker->text(),
            'alamat' => $this->faker->text(),
            'kontak' => $this->faker->string(), 
            'logo' => 'default.jpg', 
        ];
    }
}
