<?php

namespace Database\Factories;

use App\Models\schoolsModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class schoolsModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = schoolsModel::class;

    public function definition(): array
    {
        return [
            'nama' => $this->faker->sentence(),
            'deskripsi' => $this->faker->text(),
            'alamat' => $this->faker->text(),
            'kontak' => $this->faker->text(),
            'logo' => 'default.jpg',
        ];
    }
}
