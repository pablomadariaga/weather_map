<?php

namespace App\Repositories;

use App\Models\City;

/**
 * Repository for city-related operations.
 * @package App\Repositories
 */
class CityRepository implements CityRepositoryInterface
{
    /**
     * Get a city by its name.
     *
     * @param string $name
     * @return City|null
     */
    public function getByName(string $name): ?City
    {
        return City::where('name', $name)->first();
    }


    /**
     * Get all cities
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, \App\Models\City>
     */
    public function getAll()
    {
        return City::all();
    }

    /**
     * Create a new city.
     *
     * @param array $data
     * @return City
     */
    public function create(array $data): City
    {
        return City::create($data);
    }
}
