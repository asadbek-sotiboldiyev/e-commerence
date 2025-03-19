<?php

namespace App\Providers;

use App\Models\Shop;
use App\Policies\ShopPolicy;
use App\View\Components\ProductGridDisplay;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Paginator::useBootstrapFive();

        Gate::policy(Shop::class, ShopPolicy::class);

        Blade::component('product-grid-dsplay', ProductGridDisplay::class);
    }
}
