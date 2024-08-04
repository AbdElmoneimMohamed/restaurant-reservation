<?php
namespace Database\Factories;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
{
    protected $model = Meal::class;

    public function definition()
    {
        return [
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 5, 100),
            'available_quantity' => $this->faker->numberBetween(10, 50),
            'discount' => $this->faker->numberBetween(0, 20),
        ];
    }
}
