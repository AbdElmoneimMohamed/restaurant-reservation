<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DTO\InvoiceDto;
use App\Models\Meal;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Services\Payment\PaymentContext;
use App\Services\Payment\ServiceOnlyPaymentStrategy;
use App\Services\Payment\TaxAndServicePaymentStrategy;

class OrderRepository implements OrderRepositoryInterface
{
    public function __construct(
        private PaymentContext $paymentContext
    ) {
    }

    public function createOrder(array $data): Order
    {
        $order = Order::create([
            'table_id' => $data['table_id'],
            'reservation_id' => $data['reservation_id'],
            'customer_id' => $data['customer_id'],
            'user_id' => $data['user_id'],
            'total' => 0,
            'paid' => false,
            'date' => now(),
        ]);

        $total = 0;

        foreach ($data['meals'] as $mealData) {
            $meal = Meal::find($mealData['meal_id']);

            $amount = ($meal->price - $meal->discount) * $mealData['quantity'];

            OrderDetail::create([
                'order_id' => $order->id,
                'meal_id' => $mealData['meal_id'],
                'amount_to_pay' => $amount,
            ]);

            $total += $amount;

            $meal->decrement('available_quantity', $mealData['quantity']);
        }

        $order->update([
            'total' => $total,
        ]);

        return $order;
    }

    public function checkoutOrder(array $data): InvoiceDto
    {
        $order = Order::find($data['order_id']);

        $total = floatval($order->total);

        match ($data['checkout_type']) {
            'tax_and_service' => $this->paymentContext->setStrategy(new TaxAndServicePaymentStrategy()),
            'service_only' => $this->paymentContext->setStrategy(new ServiceOnlyPaymentStrategy())
        };

        [$mount, $service, $tax, $finalTotal] = $this->paymentContext->executeStrategy($total);

        $order->update([
            'total' => $finalTotal,
            'paid' => true,
        ]);

        return new InvoiceDto(
            orderId: $data['order_id'],
            total: $mount,
            tax: $tax,
            service: $service,
            finalTotal: $finalTotal
        );
    }
}
