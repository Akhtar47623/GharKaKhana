<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use App\Repositories\FoodRepositoryInterface;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    protected $foodRepository;

    public function __construct(FoodRepositoryInterface $foodRepository)
    {
        $this->foodRepository = $foodRepository;
    }

    public function index()
    {
        $foods = $this->foodRepository->all();
        return view('admin.Foods.index', compact('foods'));
    }
      public function create()
    {
         $categories = Category::all();
        return view('admin.Foods.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'short_desc' => 'nullable|string',
        ]);

        $this->foodRepository->store($request);

        return redirect('foods')->with('success', 'Food created!');
    }

    public function show($uuid)
    {
        $food = $this->foodRepository->findByUuid($uuid);
         return view('admin.Foods.show', compact('food'));
    }
    public function edit($id)
    {
        $food = Food::findOrFail($id);
        return view('admin.foods.edit', compact('food'));
    }


   public function update(Request $request, $id)
    {
        $this->foodRepository->update($request, $id);

        return redirect()->route('foods.index')->with('success', 'Food updated successfully.');
    }

    public function destroy($uuid)
    {
        $this->foodRepository->delete($uuid);

        return redirect('foods')->with('success', 'Food created!');
    }
}
