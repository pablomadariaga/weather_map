<?php

namespace App\Services;

/**
 * Interface for the Weather service.
 */
interface WeatherServiceInterface
{
    /**
     * Get the current weather for a city.
     *
     * @param  string  $cityName
     * @return array|null
     */
    public function getCurrentWeather(string $cityName): ?array;

    /**
     * Get the weather history for all cities.
     *
     * @return array
     */
    public function getWeatherHistory(): array;

    /**
     * Get all cities.
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, \App\Models\City>
     */
    public function getCities();
}
