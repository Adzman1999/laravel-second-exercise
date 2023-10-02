<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryManagerController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    // Store Category Data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|unique:categories',
            'description' => 'required',
        ]);

        Category::create($formFields);

        return redirect('/categories')->with('message', 'Category created successfully!');
    }

    // Show Edit Form
    public function edit(Category $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    // Update Category Data
    public function update(Request $request, Category $category)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category->update($formFields);

        return redirect('/categories')->with('message', 'Category updated successfully!');;
    }

    // Delete Category
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/categories')->with('message', 'Category deleted successfully');
    }
}
