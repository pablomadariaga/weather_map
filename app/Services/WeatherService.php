<?php

namespace App\Services;

use App\Repositories\CityRepositoryInterface;
use App\Repositories\HistoryRepositoryInterface;
use Illuminate\Support\Facades\Http;

class WeatherService implements WeatherServiceInterface
{
    /**
     * @var CityRepositoryInterface
     */
    private $cityRepository;

    /**
     * @var HistoryRepositoryInterface
     */
    private $historyRepository;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * WeatherService constructor.
     *
     * @param  CityRepositoryInterface  $cityRepository
     * @param  HistoryRepositoryInterface  $historyRepository
     */
    public function __construct(CityRepositoryInterface $cityRepository, HistoryRepositoryInterface $historyRepository)
    {
        $this->cityRepository = $cityRepository;
        $this->historyRepository = $historyRepository;
        $this->apiKey = config('services.openweathermap.api_key');
    }

    /**
     * Get the current weather for a city.
     *
     * @param  string  $cityName
     * @return array|null
     */
    public function getCurrentWeather(string $cityName): ?array
    {
        $city = $this->cityRepository->getByName($cityName);

        if ($city) {
            $url = $this->buildApiUrl($city->name);
            $response = Http::get($url);
            $data = $response->json();

            if ($response->ok()) {
                $weather = [
                    'city' => $city->name,
                    'temperature' => $data['main']['temp'],
                    'humidity' => $data['main']['humidity'],
                    'pressure' => $data['main']['pressure'],
                    'latitude' => $city->latitude,
                    'longitude' => $city->longitude,
                ];

                $this->historyRepository->create([
                    'city_id' => $city->id,
                    'humidity' => $weather['humidity'],
                ]);

                return $weather;
            }
        }

        return null;
    }

    /**
     * Build the API URL for a city.
     *
     * @param  string  $cityName
     * @return string
     */
    private function buildApiUrl(string $cityName): string
    {
        return sprintf(
            'https://api.openweathermap.org/data/2.5/weather?q=%s&appid=%s',
            urlencode($cityName),
            $this->apiKey
        );
    }

    /**
     * Get the weather history for all cities.
     *
     * @return array
     */
    public function getWeatherHistory(): array
    {
        return $this->historyRepository->getAll();
    }

    /**
     * Get all cities.
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, \App\Models\City>
     */
    public function getCities()
    {
        return $this->cityRepository->getAll();
    }
}
