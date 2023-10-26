<?php

namespace App\Providers;

use App\Services\Todos\TodoServiceInterface;
use App\Services\Todos\TodoService;
use App\Repositories\Todos\TodoRepositoryInterface;
use App\Repositories\Todos\TodoRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TodoServiceInterface::class, TodoService::class);
        $this->app->bind(TodoRepositoryInterface::class, TodoRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
