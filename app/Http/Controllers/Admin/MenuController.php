<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use App\Repositories\Menu\MenuRepositoryInterface;
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
        return view('admin.menus.show', compact('menu'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $this->menuRepo->createMenu($request);
        return redirect()->route('menus.index')->with('success', 'Menu created successfully!');
    }

    public function destroy($id)
    {
        $this->menuRepo->delete($id);

        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
    }
}
