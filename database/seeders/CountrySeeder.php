<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        Country::insert([
            ['code' => 'PT', 'name' => 'Portugal'],
            ['code' => 'ES', 'name' => 'Espanha'],
            ['code' => 'FR', 'name' => 'França'],
        ]);
    }
}
