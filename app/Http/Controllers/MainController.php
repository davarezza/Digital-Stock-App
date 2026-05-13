<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            $user = Auth::user();
        }
        $categories = Category::all();
        $products = Product::with('category')->latest()->take(8)->get();
        $products_best = Product::with('category')->where('is_best_seller', 1)->get();

        return view('home', [
            'categories' => $categories,
            'products_best' => $products_best,
            'products' => $products,
        ]);
    }

    public function productList(Request $request)
    {
        $categories = Category::all();
        $query = Product::with('category');

        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->whereRaw("LOWER(REPLACE(name, ' ', '-')) = ?", [$request->category]);
            });
        }
        if ($request->has('best_seller')) {
            $query->where('is_best_seller', 1);
        }
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $products = $query->latest()->paginate(10);
        $productCount = $products->total();

        return view('products-all', [
            'categories' => $categories,
            'products' => $products,
            'productCount' => $productCount
        ]);
    }
}
