<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\checkoutRequest;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
    public function __construct(
        private readonly OrderRepositoryInterface $orderRepository
    ) {
    }

    public function checkout(checkoutRequest $request): JsonResponse
    {
        $invoice = $this->orderRepository->checkoutOrder($request->validated());

        return response()->json([
            'invoice' => $invoice,
        ]);
    }
}
