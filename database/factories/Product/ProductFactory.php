<?php

namespace Database\Factories\Product;

use App\Models\Product\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement([
                'Картофель',
                'Ананас',
                'Малина',
                'Арахис',
                'Курица',
                'Ирис'
            ]),
            'weight' => fake()->randomNumber(3),
        'amount' => fake()->randomNumber(2),
        'cost' => fake()->randomNumber(3),
        'category_id' => fake()->randomElement(Category::all()) ,
        'date_of_delivery' => fake()->dateTime()
        ];
    }
}
