<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class OrderFactory extends Factory
{
    public function definition()
    {
        $users = User::pluck('id')->toArray();
        $status = ['pending','paid','canceled'];
        return [
            'user_id' => fake()->randomElement($users),
            'status' =>  $status[array_rand($status)]
        ];
    }
}
