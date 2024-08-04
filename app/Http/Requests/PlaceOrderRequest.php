<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'table_id' => 'required|exists:tables,id',
            'reservation_id' => 'required|exists:reservations,id',
            'customer_id' => 'required|exists:customers,id',
            'user_id' => 'required|exists:users,id',
            'meals' => 'required|array',
            'meals.*.meal_id' => 'required|exists:meals,id',
            'meals.*.quantity' => 'required|integer|min:1',
        ];
    }
}
