<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherServiceInterface;

/**
 * Controller for handling weather-related actions.
 */
class WeatherController extends Controller
{
    /**
     * @var WeatherServiceInterface
     */
    private $weatherService;

    /**
     * WeatherController constructor.
     *
     * @param  WeatherServiceInterface  $weatherService
     */
    public function __construct(WeatherServiceInterface $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * Show the form to search for a city's weather.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('weather.index');
    }

    /**
     * Get the current weather for a city.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getWeather(Request $request)
    {
        $cityName = $request->input('city');

        $weather = $this->weatherService->getCurrentWeather($cityName);

        if ($weather) {
            return view('weather.show', compact('weather'));
        }

        return back()->with('error', 'City not found.');
    }

    /**
     * Display the humidity for the specified cities.
     *
     * @param Request $request The HTTP request
     * @return \Illuminate\Http\Response
     */
    public function humidity(Request $request)
    {
        // Get the cities
        $cities = $this->weatherService->getCities();

        $humidityData = [];
        foreach ($cities as $city) {
            // Get the humidity for the city
            $weather = $this->weatherService->getCurrentWeather($city->name);

            // Store the latitude and longitude in the data array
            $humidityData[] = $weather;
        }

        return response()->json($humidityData);
    }

    /**
     * Show the history to search for a city's weather.
     *
     * @return \Illuminate\View\View
     */
    public function history()
    {
        $histories = $this->weatherService->getWeatherHistory();

        return view('weather.history', compact('histories'));
    }

    /**
     * Display the map with humidity markers.
     *
     * @param Request $request The HTTP request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function map(Request $request)
    {
        // Get the humidity data
        $humidityData = $this->humidity($request)->getData();

        return view('weather.map', compact('humidityData'));
    }
}
