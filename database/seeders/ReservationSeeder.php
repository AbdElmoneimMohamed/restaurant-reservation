<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        Reservation::factory()->count(10)->create();
    }
}
