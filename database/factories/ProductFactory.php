<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = Category::factory()->create();

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'category_id' => $category,
            'img' => UploadedFile::fake()->create('product.jpg'),
            'price' => $this->faker->randomFloat(0, 100)
        ];
    }
}
