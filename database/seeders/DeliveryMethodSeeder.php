<?php

namespace Database\Seeders;

use App\Models\DeliveryMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryMethodSeeder extends Seeder
{
    public function run(): void
    {
        DeliveryMethod::create([
            'name' => 'Tekin',
            'estimated_time' => '2 kun',
            'sum' => '0',
        ]);

        DeliveryMethod::create([
            'name' => 'Standart',
            'estimated_time' => '3 kun',
            'sum' => 40000,
        ]);

        DeliveryMethod::create([
            'name' => 'Tez',
            'estimated_time' => '1 kun',
            'sum' => 80000,
        ]);
    }
}
