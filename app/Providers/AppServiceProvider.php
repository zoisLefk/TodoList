<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\TodoPolicy;
use App\Policies\ProjectPolicy;

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
        Gate::define('update-todo', [TodoPolicy::class, 'update']);
        Gate::define('delete-todo', [TodoPolicy::class, 'delete']);
        Gate::define('create-todo', [TodoPolicy::class, 'create']);

        Gate::define('update-project', [ProjectPolicy::class, 'update']);
        Gate::define('delete-project', [ProjectPolicy::class, 'delete']);
        Gate::define('view-project', [ProjectPolicy::class, 'view']);
    }
}
