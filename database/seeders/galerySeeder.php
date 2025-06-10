<?php

namespace Database\Seeders;

use App\Models\galeryModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class galerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        galeryModel::factory()->count(5)->create();
    }
}
