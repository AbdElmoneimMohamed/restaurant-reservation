<?php

declare(strict_types=1);

namespace App\Services\Payment;

interface PaymentStrategyInterface
{
    public function calculateTotal(float $amount): array;
}
