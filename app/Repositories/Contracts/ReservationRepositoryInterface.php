<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\Reservation;

interface ReservationRepositoryInterface
{
    public function checkAvailability(array $data);

    public function createReservation(array $data): Reservation;
}
