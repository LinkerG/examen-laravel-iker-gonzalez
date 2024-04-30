<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            'name' => 'Badalona',
            'n_habitant' => 1000
        ]);
        City::create([
            'name' => 'Mataro',
            'n_habitant' => 3000
        ]);
        City::create([
            'name' => 'Santadria',
            'n_habitant' => 1000
        ]);
    }
}
