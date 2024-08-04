<?php

declare(strict_types=1);

// tests/Unit/ReservationTest.php

namespace Tests\Unit;

use App\Models\Customer;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    public function testAvailableTable()
    {
        $table = Table::factory()->create([
            'capacity' => 4,
        ]);

        $customer = Customer::factory()->create();

        // Check availability
        $response = $this->getJson('/api/check-availability?customer_id=' . $customer->id . '&table_id=' . $table->id . '&guests=' . 4 . '&from_time=' . now()->addHour()->toDateTimeString() . '&to_time=' . now()->addHours(2)->toDateTimeString());

        $response->assertStatus(200);
    }

    public function testNonAvailableTable()
    {
        $table = Table::factory()->create([
            'capacity' => 4,
        ]);
        $customer = Customer::factory()->create();

        // Create a reservation
        Reservation::factory()->create([
            'table_id' => $table->id,
            'customer_id' => $customer->id,
            'from_time' => now()->addHour(),
            'to_time' => now()->addHours(2),
        ]);

        // Check availability
        $response = $this->getJson('/api/check-availability?customer_id=' . $customer->id . '&table_id=' . $table->id . '&guests=' . 4 . '&from_time=' . now()->addHour()->toDateTimeString() . '&to_time=' . now()->addHours(2)->toDateTimeString());

        $response->assertStatus(400)
            ->assertJson([
                'message' => 'Sorry, There is no available table with in this time, and we added you to waiting list',
            ]);
    }

    public function testCreateReservation()
    {
        $table = Table::factory()->create([
            'capacity' => 4,
        ]);
        $customer = Customer::factory()->create();

        $response = $this->postJson('/api/reserve-table', [
            'table_id' => $table->id,
            'customer_id' => $customer->id,
            'from_time' => now()->addHours(24)->toDateTimeString(),
            'to_time' => now()->addHours(26)->toDateTimeString(),
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure(['id', 'table_id', 'customer_id', 'from_time', 'to_time']);
    }
}
