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
}
