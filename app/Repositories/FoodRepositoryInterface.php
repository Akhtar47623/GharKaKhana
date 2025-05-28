<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Food;

interface FoodRepositoryInterface
{
    public function all();
    // public function findById(int $id): ?Food;
    // public function findByUuid(string $uuid): ?Food;
    // public function create(array $data): Food;
    // public function update(Food $food, array $data): bool;
    // public function delete(Food $food): bool;
}
