<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\Meal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MealTest extends TestCase
{
    use RefreshDatabase;

    public function testListMenuItems()
    {
        Meal::factory()->count(3)->create();

        $response = $this->getJson('/api/menu');

        $response->assertStatus(200)
            ->assertJsonStructure([['id', 'description', 'price', 'available_quantity', 'discount']]);
    }
}
