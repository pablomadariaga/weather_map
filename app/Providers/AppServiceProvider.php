<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\CityRepositoryInterface;
use App\Repositories\CityRepository;
use App\Repositories\HistoryRepositoryInterface;
use App\Repositories\HistoryRepository;
use App\Services\WeatherService;
use App\Services\WeatherServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(HistoryRepositoryInterface::class, HistoryRepository::class);
        $this->app->bind(WeatherServiceInterface::class, WeatherService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
