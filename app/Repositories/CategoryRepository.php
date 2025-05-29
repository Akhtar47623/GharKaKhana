<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::orderBy('id', 'desc')->get();
    }

    public function store(Request $request): Category
    {
        return Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    }

    public function findById(int $id): Category
    {
        return Category::findOrFail($id);
    }

    public function update(Request $request, int $id): void
    {
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    }

    public function delete(int $id): bool
    {
        $category = Category::findOrFail($id);
        return $category->delete();
    }
}
