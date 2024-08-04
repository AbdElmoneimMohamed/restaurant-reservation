<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Meal;

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::factory()->count(10)->create();
    }
}
