<?php
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewBrandTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_brand_screen_can_be_rendered()
    {
        $response = $this->get('/brand/create');

        $response->assertStatus(200);
    }

    public function test_new_brand()
    {
        $response = $this->post('/brand/store', [
            'name' => 'Test Brand',
        ]);

        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
