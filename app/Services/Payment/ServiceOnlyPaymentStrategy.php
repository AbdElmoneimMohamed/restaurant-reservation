<?php

declare(strict_types=1);

namespace App\Services\Payment;

class ServiceOnlyPaymentStrategy implements PaymentStrategyInterface
{
    public function calculateTotal(float $amount): array
    {
        $tax = 0;
        $service = $amount * 0.15;

        return [$amount, $service, $tax, $amount + $service];
    }
}
