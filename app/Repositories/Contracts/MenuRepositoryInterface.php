<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\Meal;
use Illuminate\Support\Collection;

interface MenuRepositoryInterface
{
    /**
     * @return Collection<Meal>
     */
    public function getAllMeals(): Collection;
}
