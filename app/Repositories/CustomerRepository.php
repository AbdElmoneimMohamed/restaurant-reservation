<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\Contracts\CustomerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function __construct(
        private Customer $customer
    ) {
    }

    /**
     * @return Collection<Customer>
     */
    public function all(): Collection
    {
        return $this->customer->all();
    }

    public function find(int $id): ?Customer
    {
        return $this->customer->find($id);
    }
}
