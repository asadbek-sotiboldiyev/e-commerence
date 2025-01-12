<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Shop;
use App\Policies\ProductPolicy;
use App\Policies\ShopPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Product::class => ProductPolicy::class,
        Shop::class => ShopPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
