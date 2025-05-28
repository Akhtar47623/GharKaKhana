<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.Foods.add');
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
        return response()->json($food);
    }

    public function update(Request $request, $uuid)
    {
        $food = $this->foodRepository->update($request, $uuid);
        return response()->json($food);
    }

    public function destroy($uuid)
    {
        $this->foodRepository->delete($uuid);
        return response()->json(null, 204);
    }
}
