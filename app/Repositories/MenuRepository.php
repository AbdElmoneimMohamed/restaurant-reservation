<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Meal;
use App\Repositories\Contracts\MenuRepositoryInterface;
use Illuminate\Support\Collection;

class MenuRepository implements MenuRepositoryInterface
{
    /**
     * @return Collection<Meal>
     */
    public function getAllMeals(): Collection
    {
        return Meal::where('available_quantity', '>', 0)->get();
    }
}
