<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CheckAvailabilityRequest;
use App\Http\Requests\ReserveTableRequest;
use App\Models\WaitingList;
use App\Repositories\Contracts\ReservationRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ReserveTableController extends Controller
{
    public function __construct(
        private readonly ReservationRepositoryInterface $reservationRepository
    ) {
    }

    public function check(CheckAvailabilityRequest $request): JsonResponse
    {
        $availableTables = $this->reservationRepository->checkAvailability($request->validated());

        if (count($availableTables) === 0) {
            WaitingList::create([
                'customer_id' => $request->get('customer_id'),
            ]);

            return response()->json([
                'message' => 'Sorry, There is no available table with in this time, and we added you to waiting list',
            ], 400);
        }

        return response()->json($availableTables);
    }

    public function reserve(ReserveTableRequest $request): JsonResponse
    {
        $reservation = $this->reservationRepository->createReservation($request->validated());

        return response()->json($reservation, 201);
    }
}
