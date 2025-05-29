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
        $menu = Menu::create([
            'day' => $request->day,
            'meal_type' => $request->meal_type,
        ]);

        foreach ($request->foods as $food) {
            $menu->foods()->attach($food['food_id'], [
                'ingredients' => $food['ingredients'] ?? null,
                'toppings' => $food['toppings'] ?? null,
                'drinks' => $food['drinks'] ?? null,
            ]);
        }

        return $menu;
    }
}
