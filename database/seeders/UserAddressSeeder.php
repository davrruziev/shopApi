<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{

    public function run(): void
    {
        User::find(2)->addresses()->create([
            "latitude" => "41.310014",
            "longitude" => "69.120034",
            "region" => "Tashkent",
            "district" => "Olmazor",
            "street" => "Zabzor",
            "home" => "287"
        ]);

        User::find(2)->addresses()->create([
            "latitude" => "41.310014",
            "longitude" => "69.120034",
            "region" => "Tashkent",
            "district" => "Chilonzor",
            "street" => "Bekbaraka",
            "home" => "136"
        ]);
    }
}
