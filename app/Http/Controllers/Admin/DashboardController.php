<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\WishListView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
public function index()
    {
        $stats = [
            [
                'label'   => 'Total Barang',
                'value'   => Product::count(),
                'icon'    => 'fa-solid fa-box',
                'color'   => 'bg-blue-50',
                'icolor'  => 'text-blue-500',
            ],
            [
                'label'   => 'Total Kategori',
                'value'   => Category::count(),
                'icon'    => 'fa-solid fa-tags',
                'color'   => 'bg-green-50',
                'icolor'  => 'text-green-500',
            ],
            [
                'label'   => 'Total Pengguna',
                'value'   => User::where('role', 'user')->count(),
                'icon'    => 'fa-solid fa-users',
                'color'   => 'bg-amber-50',
                'icolor'  => 'text-amber-500',
            ],
            [
                'label'   => 'Barang difavoritkan',
                'value'   => Wishlist::count(),
                'icon'    => 'fa-solid fa-heart',
                'color'   => 'bg-rose-50',
                'icolor'  => 'text-rose-500',
            ],
        ];

        $wishlistData = Wishlist::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->where('created_at', '>=', now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $chartLabels = [];
        $chartValues = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $chartLabels[] = now()->subDays($i)->format('D');
            $stat = $wishlistData->firstWhere('date', $date);
            $chartValues[] = $stat ? $stat->total : 0;
        }
        $topCategories = Category::withCount('products')
            ->orderBy('products_count', 'desc')
            ->take(3)
            ->get();

        $popularProducts = Product::withCount('wishlists')
            ->orderBy('wishlists_count', 'desc')
            ->take(5)
            ->get();

        return view('dashboard.index', [
            'stats' => $stats,
            'chartLabels' => $chartLabels,
            'chartValues' => $chartValues,
            'topCategories' => $topCategories,
            'popularProducts' => $popularProducts,
        ]);
    }

    public function wishlistAdmin()
    {
        $wishlists = WishListView::all();
        return view('dashboard.wishlist', [
            'wishlists' => $wishlists,
        ]);
    }
}
