<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\Contracts\MenuRepositoryInterface;
use Illuminate\Http\JsonResponse;

class MenuController extends Controller
{
    public function __construct(
        private readonly MenuRepositoryInterface $menuRepository
    ) {
    }

    public function list(): JsonResponse
    {
        $meals = $this->menuRepository->getAllMeals();

        return response()->json($meals);
    }
}
