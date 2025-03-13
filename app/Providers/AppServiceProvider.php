<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
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
        Http::macro('nbaApi', function () {
            return Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => config('nbaapi.key'),
            ])->baseUrl(config('nbaapi.url'));
        });
    }
}
