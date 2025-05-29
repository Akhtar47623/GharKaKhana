<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        $categories = $this->categoryRepo->all();
        return view('admin.Categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.Categories.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->categoryRepo->store($request);
        return redirect()->route('categories.index')->with('success', 'Category created!');
    }

    public function show($id)
    {
        $category = $this->categoryRepo->findByid($id);
         return view('admin.Categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = $this->categoryRepo->findById($id);
        return view('admin.Categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->categoryRepo->update($request, $id);
        return redirect()->route('categories.index')->with('success', 'Category updated!');
    }

    public function destroy($id)
    {
        $this->categoryRepo->delete($id);
        return redirect()->route('categories.index')->with('success', 'Category deleted!');
    }
}
