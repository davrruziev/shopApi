<?php

namespace Database\Seeders;

use App\Models\Value;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{
    public function run(): void
    {
        Value::create([
            "attribute_id" => 1,
            "name" => "Qizil",
        ]);
        Value::create([
            "attribute_id" => 1,
            "name" => "Qora",
        ]);
        Value::create([
            "attribute_id" => 1,
            "name" => "Jigarrang",
        ]);

        Value::create([
            "attribute_id" => 2,
            "name" => "MDF",
        ]);
        Value::create([
            "attribute_id" => 2,
            "name" => "LDSP",
        ]);
    }
}
