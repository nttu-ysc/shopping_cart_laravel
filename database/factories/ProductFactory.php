<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'user_id' => '1',
            'category_id' => $this->faker->randomDigitNot(0),
            'name' => $this->faker->firstName(),
            'price' => $this->faker->numberBetween(0, $max = 9999),
            'quantity' => $this->faker->numberBetween($min = 1, $max = 999),
            'discount' => $this->faker->randomFloat(1, 10, 100),
            'description' => $this->faker->text(200),
            'thumbnail' => $this->faker->imageUrl()
        ];
    }
}
