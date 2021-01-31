<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use WithFaker;

    public function testUserCreateProduct()
    {
        $this->withExceptionHandling();

        $user = User::factory()->raw();

        $product = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(0, 100)
        ];

        $this->post('/products', $product);

        $this->assertDatabaseHas('products', $product);

        $this->get('/products')
            ->assertSee($product['title']);
    }

    public function testUserShowProduct()
    {
        $product = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(0, 100)
        ];
    }
}
