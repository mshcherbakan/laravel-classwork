<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function testProductEmpty()
    {
        $this->get('/products')
            ->assertSee('No Products');
    }

    public function testUserCanSeeProducts()
    {
        $product = Product::factory()->create();

        $this->get('/products')
            ->assertSee($product->title);
    }

    public function testCreateProduct()
    {
        $product = Product::factory()->raw();

        $this->post('/products', $product);

        $this->assertDatabaseHas('products', $product);

        $this->get('/products')
            ->assertSee($product['title']);
    }

    public function testCreateProductRequiredFields()
    {
        $this->post('/products')
            ->assertSessionHasErrors(['title', 'description', 'price']);
    }
}
