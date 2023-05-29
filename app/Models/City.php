<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Represents a city in the application.
 *
 * @property int $id The unique identifier of the city.
 * @property string $name The name of the city.
 * @property Carbon $created_at The timestamp when the city was created.
 * @property Carbon $updated_at The timestamp when the city was last updated.
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|History[] $history
 */
class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the history entries associated with the city.
     */
    public function history()
    {
        return $this->hasMany(History::class);
    }
}
