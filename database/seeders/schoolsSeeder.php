<?php

namespace Database\Seeders;

use App\Models\schoolsModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class schoolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         schoolsModel::factory()->count(5)->create();
    }
}
