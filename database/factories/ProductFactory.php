<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    public function definition(): array
    {
        return [
            'category_id' => rand(1, 4),
            'name' => fake()->sentence(3),
            'price' => rand(50000, 10000000),
            'description' => fake()->paragraph(5),
        ];
    }
}
