<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'meal_id', 'amount_to_pay'];

    /**
     * An order detail belongs to an order.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * An order detail belongs to a meal.
     */
    public function meal(): BelongsTo
    {
        return $this->belongsTo(Meal::class);
    }
}
