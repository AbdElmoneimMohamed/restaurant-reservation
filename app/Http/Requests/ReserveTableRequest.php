<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveTableRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'table_id' => 'required|exists:tables,id',
            'customer_id' => 'required|exists:customers,id',
            'from_time' => 'required|date',
            'to_time' => 'required|date',
        ];
    }
}
