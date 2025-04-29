<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str; // Import the Str facade

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
    public function boot()
    {
        // Binding this composer to '*' means it runs for ALL views.
        // For better performance, consider binding it only to the sidebar view:
        // View::composer('layouts.sidebar', function ($view) { ... });
        View::composer('*', function ($view) {
            // Get the current route name
            $currentRoute = request()->route() ? request()->route()->getName() : null; // Added null check

            $activeMenu = '';

            // Define your menu items and their corresponding route patterns
            $menuItems = [
                'dashboard' => ['dashboard', 'welcome'], // Assuming route names like 'dashboard' or 'welcome'
                'profile' => ['profile.*'], // Matches any route starting with 'profile.' (e.g., 'profile.show', 'profile.edit')
                'level' => ['level.*'],     // Matches 'level.index', 'level.create', etc.
                'user' => ['user.*'],       // Matches 'user.index', 'user.create', etc.
                'kategori' => ['kategori.*'], // Matches 'kategori.index', etc.
                'barang' => ['barang.*'],   // Matches 'barang.index', etc.
                'stok' => ['stok.*'],       // Matches 'stok.index', etc.
                'penjualan' => ['penjualan.*'], // Matches 'penjualan.index', etc.
            ];

            // Loop through menu items and check if the current route matches any of their patterns
            if ($currentRoute) { // Only check if a route name exists
                 foreach ($menuItems as $menu => $routes) {
                    foreach ($routes as $route) {
                        // Use Str::is() from the Str facade instead of the removed global helper
                        if (Str::is($route, $currentRoute)) {
                            $activeMenu = $menu;
                            break 2; // Exit both loops once a match is found
                        }
                    }
                }
            }


            // Pass the determined activeMenu variable to the view
            $view->with('activeMenu', $activeMenu);
        });

        // You can add other application services here
    }
}