<?php

declare(strict_types=1);

namespace App\Services\Payment;

class PaymentContext
{
    protected $strategy;

    public function setStrategy(PaymentStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function executeStrategy(float $amount): array
    {
        return $this->strategy->calculateTotal($amount);
    }
}
