<?php

namespace App\Repositories\Menu;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuRepository implements MenuRepositoryInterface
{
    public function all()
    {
        return Menu::with('foods.categories')->get();
    }

    public function createMenu(Request $request)
    {
        $request->validate([
            'meals' => 'required|array',
            'meals.*.day' => 'required|string',
            'meals.*.meal_time' => 'required|string',
            'meals.*.food_ids' => 'required|array',
            'meals.*.food_ids.*' => 'exists:foods,id',
        ]);

        $day = $request->meals[0]['day'];
        $menu = Menu::firstOrCreate(['day' => $day]);

        // Clear existing entries for this menu (optional: keep only unique meal_time?)
        $menu->menuItems()->delete();

        // Insert each meal + food combo into menu_items
        foreach ($request->meals as $mealData) {
            foreach ($mealData['food_ids'] as $foodId) {
                $menu->menuItems()->create([
                    'food_id' => $foodId,
                    'meal_type' => $mealData['meal_time'],
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'menu' => $menu->load('menuItems.food'),
        ]);
    }
    public function show($id)
    {
        return Menu::with('foods.categories')->findOrFail($id);
    }


     public function delete($uuid):bool
    {
        $menu = Menu::findOrFail($uuid);
        $menu->delete();

        return true;
    }


}
