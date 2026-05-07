<?php

namespace App\Providers;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Menggunakan View Composer untuk mengirim data ke partials.navbar
        View::composer('partials.navbar', function ($view) {
            if (Auth::check()) {
                $count = Wishlist::where('user_id', Auth::id())->count();
                $view->with('wishlistCount', $count);
            } else {
                $view->with('wishlistCount', 0);
            }
        });
    }
}
