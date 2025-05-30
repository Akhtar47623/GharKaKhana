<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use App\Repositories\Menu\MenuRepositoryInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuRepo;

    public function __construct(MenuRepositoryInterface $menuRepo)
    {
        $this->menuRepo = $menuRepo;
    }

    public function index()
    {
        $menus = $this->menuRepo->all();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $foods = Food::with('categories')->get();
        return view('admin.Menus.add', compact('foods'));
    }

    public function show($id)
    {
        $menu = $this->menuRepo->show($id);
        // dd($menu->foods);
        return view('admin.menus.show', compact('menu'));
    }


    public function store(Request $request)
    {
        $this->menuRepo->createMenu($request);
        Toastr::success('Menu created successfully!');
        return redirect()->route('menus.index');
    }

      public function edit($id)
    {
        $menuData = $this->menuRepo->edit($id); 

        return view('admin.menus.edit', [
            'menu' => $menuData['menu'],
            'foods' => $menuData['foods'],
            'meals' => $menuData['meals'],
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'meals' => 'required|array',
            'meals.*.day' => 'required|string',
            'meals.*.meal_time' => 'required|string',
            'meals.*.food_ids' => 'required|array',
            'meals.*.food_ids.*' => 'exists:foods,id',
        ]);

        $this->menuRepo->update($id, $request->all());
        Toastr::success('Menu updated successfully!');
        return redirect()->route('menus.index');
    }

    public function destroy($id)
    {
        $this->menuRepo->delete($id);
        Toastr::error('Menu deleted successfully!');
        return redirect()->route('menus.index');
    }
}
