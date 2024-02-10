<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Check if the app is running in a local environment
        if ($this->app->environment('local')) {
            // If running locally, register the Debugbar service provider
            $this->app->register(ServiceProvider::class);
        } else {
            // If not running locally, force HTTPS by setting the 'HTTPS' server variable to 'on'
            $this->app['request']->server->set('HTTPS', 'on');
        }
        URL::forceScheme('https');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
