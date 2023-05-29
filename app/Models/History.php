<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Represents a history entry for a city's humidity.
 *
 * @property int $id The unique identifier of the history entry.
 * @property int $city_id The ID of the city associated with the history entry.
 * @property float $humidity The humidity value for the history entry.
 * @property Carbon $created_at The timestamp when the history entry was created.
 * @property Carbon $updated_at The timestamp when the history entry was last updated.
 *
 * @property-read City $city The city associated with the history entry.
 */
class History extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['city_id', 'humidity'];

    /**
     * Get the city associated with the history entry.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
