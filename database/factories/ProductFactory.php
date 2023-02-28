<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sku' => $this->faker->numberBetween(5000, 90000),
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 0, 10000),
            'weight' => $this->faker->numberBetween(2, 50),
            'descriptions' => $this->faker->text,
            'thumbnail' => $this->faker->imageUrl($width = 40, $height = 60),
            'image' => $this->faker->imageUrl($width = 200, $height = 300),
            'category' => Category::factory(),
            'stock' => $this->faker->numberBetween(50, 250),
        ];
    }
}
