<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\FoodRepository;
use App\Repositories\FoodRepositoryInterface;
use App\Repositories\Menu\MenuRepository;
use App\Repositories\Menu\MenuRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       $this->app->bind(FoodRepositoryInterface::class, FoodRepository::class);
       $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
       $this->app->bind(MenuRepositoryInterface::class, MenuRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
