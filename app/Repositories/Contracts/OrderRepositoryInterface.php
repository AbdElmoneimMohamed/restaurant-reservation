<?php

declare(strict_types=1);

// app/Repositories/Contracts/OrderRepositoryInterface.php

namespace App\Repositories\Contracts;

use App\DTO\InvoiceDto;
use App\Models\Order;

interface OrderRepositoryInterface
{
    public function createOrder(array $data): Order;

    public function checkoutOrder(array $data): InvoiceDto;
}
