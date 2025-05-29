<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function all();
    public function store(Request $request): Category;
    public function findById(int $id): Category;
    public function update(Request $request, int $id): void;
    public function delete(int $id): bool;
}
