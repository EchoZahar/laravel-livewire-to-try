<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = $this->faker->unique()->jobTitle();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'type' => $this->faker->randomElement(['product', 'service']),
            'price' => $this->faker->numberBetween(100.00, 10000.00),
            'description' => $this->faker->realText(450),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
