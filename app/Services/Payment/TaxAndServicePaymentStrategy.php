<?php

declare(strict_types=1);

namespace App\Services\Payment;

class TaxAndServicePaymentStrategy implements PaymentStrategyInterface
{
    public function calculateTotal(float $amount): array
    {
        $tax = $amount * 0.14;
        $service = $amount * 0.20;

        return [$amount, $service, $tax, $amount + $tax + $service];
    }
}
