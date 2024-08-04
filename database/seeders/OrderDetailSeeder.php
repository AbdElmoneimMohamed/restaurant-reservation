<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Meal;

class OrderDetailSeeder extends Seeder
{
    public function run()
    {
        OrderDetail::factory()->count(20)->create();
    }
}
