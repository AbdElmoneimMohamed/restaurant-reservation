<?php

declare(strict_types=1);

// tests/Unit/OrderTest.php

namespace Tests\Unit;

use App\Models\Customer;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function testListMenuItems()
    {
        Meal::factory()->count(3)->create();

        $response = $this->getJson('/api/menu');

        $response->assertStatus(200)
            ->assertJsonStructure([['id', 'description', 'price', 'available_quantity', 'discount']]);
    }

    public function testPlaceOrder()
    {
        $table = Table::factory()->create();
        $customer = Customer::factory()->create();
        $reservation = Reservation::factory()->create([
            'table_id' => $table->id,
            'customer_id' => $customer->id,
        ]);

        $meal = Meal::factory()->create();

        $response = $this->postJson('/api/order', [
            'table_id' => $table->id,
            'reservation_id' => $reservation->id,
            'customer_id' => $customer->id,
            'user_id' => $this->user->id,
            'meals' => [
                [
                    'meal_id' => $meal->id,
                    'quantity' => 2,
                ],
            ],
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure(['id', 'table_id', 'reservation_id', 'customer_id', 'user_id', 'total', 'paid', 'date']);
    }

    public function testCheckoutOrder()
    {
        $order = Order::factory()->create([
            'paid' => false,
        ]);

        $response = $this->postJson('/api/checkout', [
            'order_id' => $order->id,
            'checkout_type' => 'tax_and_service',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'invoice' => ['orderId', 'total', 'tax', 'service', 'finalTotal'],
            ]);
    }
}
