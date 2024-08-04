<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Table;
use Illuminate\Database\Eloquent\Collection;

class TableRepository
{
    public function __construct(
        private Table $table
    ) {
    }

    public function all(): Collection
    {
        return $this->table->all();
    }

    public function find(int $id): ?Table
    {
        return $this->table->find($id);
    }
}
