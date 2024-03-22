<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class CategoryController extends Controller
{
    public function index()
    {
        $allCategories = Category::all();
        return view('admin.category.index', compact('allCategories'));
    }

    public function create()
    {
        $allCategories = Category::all();
        return view('admin.category.create', compact('allCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoryName' => 'required|string|max:255|unique:categories,name',
            'categoryStatus' => 'required',
            'categoryParent' => 'nullable|exists:categories,id'
        ]);

        $category = new Category();
        $category->name = $request['categoryName'];
        $category->status = $request['categoryStatus'];
        $category->category_parent_id = $request['categoryParent'];

        $category->save();

        $success = true;

        return redirect('/category');
    }

    public function removeCategory($id)
    {
        $removeCat = Category::find($id);
        $removeCat->delete();
        return redirect()->back();
    }

    public function editCategory($id)
    {
        $editCat = Category::where('id', $id)->first();
        $allCategories = Category::all();
        // dd($editCat);
        return view('admin.category.edit', compact('editCat', 'allCategories'));
    }

    public function showSingleCategory($id)
    {
        $singleCat = Category::where('id', $id)->first();
        // dd($singleCat);
        return view('admin.category.view', compact('singleCat'));
    }

    public function updateCategory($id, Request $request)
    {

        $request->validate([
            'categoryName' => 'required|string|max:255|unique:categories,name',
            'categoryStatus' => 'required',
            'categoryParent' => 'nullable|exists:categories,id'
        ]);

        // dd('ef');
        $updateCategory = Category::find($id);
        $updateCategory->name = $request['categoryName'];
        $updateCategory->status = $request['categoryStatus'];
        $updateCategory->category_parent_id = $request['categoryParent'];

        $updateCategory->save();
        return redirect('/category');
    }
}
