<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;

interface CustomerRepositoryInterface
{
    /**
     * @return Collection<Customer>
     */
    public function all(): Collection;

    public function find(int $id): ?Customer;
}
