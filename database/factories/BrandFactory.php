<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class BrandFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->sentence(3),
        ];
    }
}
