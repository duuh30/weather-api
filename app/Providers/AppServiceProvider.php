<?php

namespace App\Providers;

use App\Strategies\PostalCode\Contracts\PostalCodeStrategyContract;
use App\Strategies\PostalCode\Services\ViaCepStrategy;
use App\Strategies\Weather\Contracts\WeatherStrategyContract;
use App\Strategies\Weather\Services\WeatherStackStrategy;
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
        $this->app->bind(PostalCodeStrategyContract::class, ViaCepStrategy::class);
        $this->app->bind(WeatherStrategyContract::class, WeatherStackStrategy::class);
    }
}
