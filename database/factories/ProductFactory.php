<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition()
    {
        $brands = Brand::pluck('id')->toArray();
        return [
            'title' => fake()->sentence(3),
            'sku' => uniqid(),
            'details' => fake()->paragraph(2),
            'price' => 10,
            'brand_id' => fake()->randomElement($brands),
        ];
    }
}
