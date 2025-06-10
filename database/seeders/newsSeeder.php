<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\newsModel;

class newsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        newsModel::factory()->count(5)->create();
    }
}
