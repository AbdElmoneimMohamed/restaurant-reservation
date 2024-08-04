<?php

namespace Database\Factories;

use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    protected $model = OrderDetail::class;

    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'meal_id' => Meal::factory(),
            'amount_to_pay' => $this->faker->randomFloat(2, 5, 50),
        ];
    }
}
