<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TaskSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
        CountrySeeder::class,
        VatRateSeeder::class,
        CompanySettingSeeder::class,
        ]);
    }
}
