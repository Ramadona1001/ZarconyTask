<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    public function definition()
    {
        $products = Product::pluck('id')->toArray();
        $orders = Order::pluck('id')->toArray();

        return [
            'order_id' => fake()->randomElement($orders),
            'product_id' => fake()->randomElement($products),
            'qty' => 1,
            'total' => 10,
        ];
    }
}
