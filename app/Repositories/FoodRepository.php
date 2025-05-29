<?php

namespace App\Repositories;

use App\Helpers\ImageHelper;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;

class FoodRepository implements FoodRepositoryInterface
{
   public function all(): Collection
    {
        return Food::orderBy('id', 'desc')->get();
    }
     public function store(Request $request):Food
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

  public function update(Request $request, $id):void
    {
        $food = Food::findOrFail($id);

        // Upload new images
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = ImageHelper::uploadImage($image, 'Food');
            }

            // Optionally delete the old image
            if ($food->image && file_exists(public_path($food->image))) {
                unlink(public_path($food->image)); // or use ImageHelper::deleteImage($food->image);
            }

            $food->image = $imagePaths[0] ?? $food->image;
        }

        // Update basic fields
        $food->update([
            'name' => $request->name,
            'short_desc' => $request->short_desc,
            'image' => $food->image, // already updated above if new file uploaded
        ]);
    }



    public function findByUuid($uuid):Food
    {
        return Food::findOrFail($uuid);
    }

    public function delete($uuid):bool
    {
        $food = Food::findOrFail($uuid);
        if ($food->image) {
            $imagePath = str_replace('storage/', '', $food->image);
            Storage::disk('public')->delete($imagePath);
        }
        $food->delete();

        return true;
    }
}
