<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanySetting;

class CompanySettingSeeder extends Seeder
{
    public function run(): void
    {
        CompanySetting::create([
            'name' => 'MyTaskFlow',
            'address' => 'Rua Exemplo 123',
            'postal_code' => '1000-000',
            'city' => 'Lisboa',
            'tax_number' => '123456789',
        ]);
    }
}
