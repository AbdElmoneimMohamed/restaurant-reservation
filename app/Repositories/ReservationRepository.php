<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Reservation;
use App\Models\Table;
use App\Repositories\Contracts\ReservationRepositoryInterface;

class ReservationRepository implements ReservationRepositoryInterface
{
    public function checkAvailability(array $data)
    {
        return Table::where('capacity', '>=', $data['guests'])
            ->whereDoesntHave('reservations', function ($query) use ($data) {
                $query->whereBetween('from_time', [$data['from_time'], $data['to_time']])
                    ->orWhereBetween('to_time', [$data['from_time'], $data['to_time']]);
            })->get();
    }

    public function createReservation(array $data): Reservation
    {
        return Reservation::create($data);
    }
}
