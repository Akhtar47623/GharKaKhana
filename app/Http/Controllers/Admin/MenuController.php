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
        $foods = Food::all(); 
        $categories = Category::all(); // Add this line
        return view('admin.Menus.add', compact('foods', 'categories'));
    }

    public function store(Request $request)
    {
        dd($request->all());
        $this->menuRepo->createMenu($request);
        return redirect()->route('menus.index')->with('success', 'Menu created successfully!');
    }
}
