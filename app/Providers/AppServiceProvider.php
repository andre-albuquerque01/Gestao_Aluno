<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

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
        // Compartilhe dados globais com todas as visualizações Inertia
        Inertia::share('appName', config('app.name'));

        // Compartilhe dados específicos com visualizações Inertia individuais
        Inertia::share('auth.user', function () {
            return auth()->user();
        });
    }
}
