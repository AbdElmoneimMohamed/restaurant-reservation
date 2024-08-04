<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\PlaceOrderRequest;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct(
        private readonly OrderRepositoryInterface $orderRepository
    ) {
    }

    public function placeOrder(PlaceOrderRequest $request): JsonResponse
    {
        $order = $this->orderRepository->createOrder($request->validated());

        return response()->json($order, 201);
    }
}
