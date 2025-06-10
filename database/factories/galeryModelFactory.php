<?php

namespace Database\Factories;

use App\Models\galeryModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class galeryModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = galeryModel::class;

    public function definition(): array
    {
        return [
            'gambar' => 'default.jpg',
            'deskripsi' => $this->faker->text()
        ];
    }
}
