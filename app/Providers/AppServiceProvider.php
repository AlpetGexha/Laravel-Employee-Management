<?php

namespace App\Providers;

use Gate;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
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
        $this->configureRateLimiting();

        Gate::before(function ($user, $ability) {
            return $user->isAdmin() ? true : null;
        });
    }

    protected function configureRateLimiting(): void
    {
        RateLimiter::for('contact', function (Request $request) {
            return Limit::perHour(2); // Limit to 10 requests per minute
        });
    }
}
