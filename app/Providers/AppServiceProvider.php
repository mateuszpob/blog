<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User\UserService;
use App\User\EloquentUserRepository;
use App\Services\PermissionService;
use App\Services\SimplePermissionService;
use App\Post\PostService;
use App\Post\EloquentPostRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserService::class, function ($app) {
            return new UserService(new EloquentUserRepository());
        });

        $this->app->singleton(PermissionService::class, function ($app) {
            return new SimplePermissionService(config('auth.permissions'));
        });

        $this->app->singleton(PostService::class, function ($app) {
            return new PostService(new EloquentPostRepository());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
