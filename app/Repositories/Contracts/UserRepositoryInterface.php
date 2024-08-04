<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function create(array $data);

    public function findByEmail(string $email);
}
