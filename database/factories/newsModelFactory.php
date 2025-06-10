<?php

namespace Database\Factories;

use App\Models\newsModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\newsModel>
 */
class newsModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = newsModel::class;

    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(), // contoh: "Tips Belajar Laravel"
            'isi' => $this->faker->paragraph(5), // isi artikel 5 paragraf
            'gambar' => 'default.jpg', // atau bisa pakai faker image URL
            'tanggal' => $this->faker->date(), // format: YYYY-MM-DD
        ];
    }
}
