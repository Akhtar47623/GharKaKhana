<?php

namespace App\Repositories;

use App\Models\Food;
use Illuminate\Database\Eloquent\Collection;

class FoodRepository implements FoodRepositoryInterface
{
    public function all(): Collection
    {
        return Food::all();
    }

    public function findById(int $id): ?Food
    {
        return Food::find($id);
    }

    public function findByUuid(string $uuid): ?Food
    {
        return Food::where('uuid', $uuid)->first();
    }

    public function create(array $data): Food
    {
        return Food::create($data);
    }

    public function update(Food $food, array $data): bool
    {
        return $food->update($data);
    }

    public function delete(Food $food): bool
    {
        return $food->delete();
    }
}
