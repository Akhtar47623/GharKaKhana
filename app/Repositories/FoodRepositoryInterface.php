<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Food;

interface FoodRepositoryInterface
{

    public function all(): Collection;


    public function store(Request $request): Food;


    public function update(Request $request, $id): void;

    public function findByUuid(string $uuid): Food;

    public function delete(string $uuid): bool;
}
