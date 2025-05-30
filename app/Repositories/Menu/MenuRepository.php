<?php

namespace App\Repositories\Menu;

use App\Models\Food;
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
public function edit($id)
{
    $menu = Menu::with('menuItems.food')->findOrFail($id);
    $foods = Food::all();

    // Group meals by meal_type
    $groupedMeals = [];
    foreach ($menu->menuItems as $item) {
        $key = $item->meal_type;
        if (!isset($groupedMeals[$key])) {
            $groupedMeals[$key] = [
                'day' => $menu->day,
                'meal_time' => $item->meal_type,
                'food_ids' => [],
            ];
        }
        $groupedMeals[$key]['food_ids'][] = $item->food_id;
    }

    return [
        'menu' => $menu,
        'foods' => $foods,
        'meals' => array_values($groupedMeals),
    ];
}


public function update($id, array $data)
{
    $menu = Menu::findOrFail($id);

    // Update the day (assumes all meals are for the same day)
    $menu->day = $data['meals'][0]['day'];
    $menu->save();

    // Remove existing menu items
    $menu->menuItems()->delete();

    // Reinsert updated items
    foreach ($data['meals'] as $meal) {
        foreach ($meal['food_ids'] as $foodId) {
            $menu->menuItems()->create([
                'food_id' => $foodId,
                'meal_type' => $meal['meal_time'],
            ]);
        }
    }
}





     public function delete($uuid):bool
    {
        $menu = Menu::findOrFail($uuid);
        $menu->delete();

        return true;
    }


}
