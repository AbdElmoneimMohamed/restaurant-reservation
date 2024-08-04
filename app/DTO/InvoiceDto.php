<?php

declare(strict_types=1);

namespace App\DTO;

class InvoiceDto
{
    public function __construct(
        public int $orderId,
        public float $total,
        public float $tax,
        public float $service,
        public float $finalTotal,
    ) {
    }
}
