<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $categoryFilter = $request->input('category', 'Show All');
        $sort = $request->input('sort', 'asc');

        $products = Product::with('category')
            ->when($categoryFilter != 'Show All', function ($query) use ($categoryFilter) {
                return $query->whereHas('category', function ($query) use ($categoryFilter) {
                    $query->where('name', $categoryFilter);
                });
            })
            ->orderBy('name', $sort)
            ->paginate(10);

        $categories = Category::pluck('name', 'name')->prepend('Show All', 'Show All');

        return view('dashboard.index', compact('products', 'categories', 'categoryFilter', 'sort'));
    }

    public function show(Product $product)
    {
        return view('dashboard.show', [
            'product' => $product
        ]);
    }
}
