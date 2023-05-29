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
            'name' => 'Miami',
            'latitude' => 25.761681,
            'longitude' => -80.191788,
        ]);
        City::create([
            'name' => 'Orlando',
            'latitude' => 28.538336,
            'longitude' => -81.379234,
        ]);
        City::create([
            'name' => 'New York',
            'latitude' => 40.730610,
            'longitude' => -73.935242,
        ]);
    }
}
