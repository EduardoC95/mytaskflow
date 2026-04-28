<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VatRate;

class VatRateSeeder extends Seeder
{
    public function run(): void
    {
        VatRate::insert([
            ['name' => 'Normal', 'rate' => 23.00],
            ['name' => 'Intermédia', 'rate' => 13.00],
            ['name' => 'Reduzida', 'rate' => 6.00],
        ]);
    }
}
