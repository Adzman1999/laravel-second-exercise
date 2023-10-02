<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductManagerController extends Controller
{
    // Show all Product
    public function index()
    {
        $products = Product::orderBy('updated_at', 'desc')->get();
        return view('products.index', compact('products'));
    }

    // Show Create Form
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Store Product Data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'sku' => 'required|unique:products',
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }


        Product::create($formFields);

        return redirect('/products')->with('message', 'Product created successfully!');
    }

    // Show Edit Form
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }


    // Update Data
    public function update(Request $request, Product $product)
    {
        $formFields = $request->validate([
            'sku' => 'required',
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $product->update($formFields);

        return redirect('/products')->with('message', 'Product updated successfully!');
    }

    // Delete Product
    public function destroy(Product $product)
    {
        if (
            $product->logo && Storage::disk('public')->exists($product->image)
        ) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect('/products')->with('message', 'Product deleted successfully');
    }
}
