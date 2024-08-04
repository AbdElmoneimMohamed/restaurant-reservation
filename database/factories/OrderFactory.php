<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Table;
use App\Models\Reservation;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'table_id' => Table::factory(),
            'reservation_id' => Reservation::factory(),
            'customer_id' => Customer::factory(),
            'user_id' => User::factory(),
            'total' => $this->faker->randomFloat(2, 20, 200),
            'paid' => $this->faker->boolean,
            'date' => now(),
        ];
    }
}
