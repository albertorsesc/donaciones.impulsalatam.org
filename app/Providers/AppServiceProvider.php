<?php

namespace App\Providers;

use App\Services\GeolocationService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(GeolocationService::class, function ($app) {
            return new GeolocationService;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share location data with all views
        View::composer('landing.header', function ($view) {
            $geolocation = app(GeolocationService::class);
            $locationStr = $geolocation->getFormattedLocation();

            $view->with('userLocation', $locationStr ?: 'Ciudad de México, México');
        });
    }
}
