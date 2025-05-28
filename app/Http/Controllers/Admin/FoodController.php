<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        return response()->json(Food::all());
    }

    // Store a new food
   public function store(Request $request)
    {
        // Validate only name and short_desc (no image validation)
        $request->validate([
            'name' => 'required',
            'short_desc' => 'nullable|string',
        ]);

        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = ImageHelper::uploadImage($image, 'foods');
            }
        }
        // dd($request->all());

        // Store only the first image path (optional)
        Food::create([
            'name' => $request->name,
            'short_desc' => $request->short_desc,
            'image' => $imagePaths[0] ?? null,
        ]);

        return back()->with('success', 'Food created!');
    }

    // Show a single food by UUID
    public function show($uuid)
    {
        $food = Food::findOrFail($uuid);
        return response()->json($food);
    }

    // Update a food by UUID
    public function update(Request $request, $uuid)
    {
        $food = Food::findOrFail($uuid);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'short_desc' => 'nullable|string',
            'path' => 'nullable|string',
        ]);

        $food->update($validated);

        return response()->json($food);
    }

    // Delete a food by UUID
    public function destroy($uuid)
    {
        $food = Food::findOrFail($uuid);
        $food->delete();

        return response()->json(null, 204);
    }
}
