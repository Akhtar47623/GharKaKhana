<?php

namespace App\Repositories;

use App\Helpers\ImageHelper;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodRepository implements FoodRepositoryInterface
{
    public function all()
    {
        return Food::all();
    }

    public function store(Request $request)
    {
        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = ImageHelper::uploadImage($image, 'Food');
            }
        }

        return Food::create([
            'name' => $request->name,
            'short_desc' => $request->short_desc,
            'image' => $imagePaths[0] ?? null,
        ]);
    }

    public function findByUuid($uuid)
    {
        return Food::findOrFail($uuid);
    }

    public function update(Request $request, $uuid)
    {
        $food = Food::findOrFail($uuid);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'short_desc' => 'nullable|string',
            'path' => 'nullable|string',
        ]);

        $food->update($validated);

        return $food;
    }

    public function delete($uuid)
    {
        $food = Food::findOrFail($uuid);
        $food->delete();

        return true;
    }
}
