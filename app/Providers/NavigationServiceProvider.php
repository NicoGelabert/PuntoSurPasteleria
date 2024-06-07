<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Categories;

class NavigationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('layouts.navigation', function ($view) {
            $categories = Categories::all(); 
            $view->with('categories', $categories);
        });
    }
}
