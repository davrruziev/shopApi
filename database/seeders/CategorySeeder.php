<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run(): void
    {
        Category::create([
            'name' => 'stul',
        ]);

        Category::create([
            'name' => 'stol',
        ]);

        Category::create([
            'name' => 'kreslo',
        ]);
        Category::create([
            'name' => 'divan',
        ]);
    }
}
