<?php

use App\Models\Brand;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_product_screen_can_be_rendered()
    {
        $response = $this->get('/product/create');

        $response->assertStatus(200);
    }

    public function test_new_product()
    {
        $brands = Brand::pluck('id')->toArray();
        $response = $this->post('/product/store', [
            'title' => 'Test Product',
            'sku' => uniqid(),
            'details' => 'Test Details',
            'price' => 10,
            'brand_id' => fake()->randomElement($brands),
        ]);

        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
