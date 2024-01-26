<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    public function run(): void
    {
        PaymentType::create([
            'name' => 'Naxt',
        ]);
        PaymentType::create([
            'name' => 'Terminal',
        ]);
        PaymentType::create([
            'name' => 'Click',
        ]);
        PaymentType::create([
            'name' => 'Payme',
        ]);
        PaymentType::create([
            'name' => 'Uzum',
        ]);
    }
}
