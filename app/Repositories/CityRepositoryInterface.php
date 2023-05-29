<?php

namespace App\Repositories;

use App\Models\City;

/**
 * Interface CityRepositoryInterface
 * @package App\Repositories
 */
interface CityRepositoryInterface
{
    /**
     * Get a city by its name.
     *
     * @param string $name
     * @return City|null
     */
    public function getByName(string $name): ?City;

    /**
     * Get all cities.
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, \App\Models\City>
     */
    public function getAll();

    /**
     * Create a new city.
     *
     * @param array $data
     * @return City
     */
    public function create(array $data): City;
}
