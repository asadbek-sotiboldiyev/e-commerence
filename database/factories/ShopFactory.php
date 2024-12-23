<?php

namespace Database\Factories;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $seller = Seller::inRandomOrder()->first();
        return [
            "name" => fake()->company(),
            "seller_id" => $seller->id,
            "address" => fake()->address(),
            "phone" => fake()->numerify('#########'),
            "description" => fake()->paragraph(5),
        ];
    }
}
